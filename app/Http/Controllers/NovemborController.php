<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Location;
use App\Order;
use App\Orderdetail;
use App\Product;
use App\ProductDetail;
use DB;

class NovemborController extends Controller{

    public function home() {
        $products = DB::table('tbl_product')->inRandomOrder()->limit(7)->get();
        $detail = DB::table('tbl_product_detail')
                                ->select('productID')
                                ->groupBy('productID')
                                ->get();
        $array = array();
        foreach ($detail as $key => $value) {
            array_push($array, $value->productID);
        }
        $filter = $products->map(function ($item, $key) use ($products, $array) {
            $detail = DB::table('tbl_product_detail')
                        ->select('detail')
                        ->where('productID','=',$array[$key])
                        ->get();
            $i = array();
            foreach ($detail as $value) {
                array_push($i, $value->detail);
            }
            $item->detail = $i;
        });
        return view('home',['products'=>$products]);
    }
    
    public function listproduct($cate) {
        $productType = 0;
        switch ($cate) {
            case 'alone':
                $productType = 1;
                break;
            case 'duo':
                $productType = 2;
                break;
            case 'group':
                $productType = 3;
                break;
            default:
                break;
        }
        $products = DB::table('tbl_product')
                        ->select(DB::raw('*'))
                        ->where('productTypeID','=', $productType)
                        ->get();

        $detail = DB::table('tbl_product_detail')
                                ->select('productID')
                                ->groupBy('productID')
                                ->get();

        $array = array();
        foreach ($detail as $key => $value) {
            array_push($array, $value->productID);
        }
        $filter = $products->map(function ($item, $key) use ($products, $array) {
            $detail = DB::table('tbl_product_detail')
                        ->select('detail')
                        ->where('productID','=',$array[$key])
                        ->get();
            $i = array();
            foreach ($detail as $value) {
                array_push($i, $value->detail);
            }
            $item->detail = $i;
        });
        return view('listproduct',['products'=>$products]);
    }

    public function dataproduct(Request $request) {
        $products = DB::table('tbl_product')
                        ->select(DB::raw('*'))
                        ->where('productID','=', $request->get('id'))
                        ->get();
        $detail = DB::table('tbl_product_detail')
                        ->select('detail')
                        ->where('productID','=',$request->get('id'))
                        ->get();

        $filter = $products->map(function ($item, $key) use ($products, $detail){
            // $detail = DB::table('tbl_product_detail')
            //             ->select('detail')
            //             ->where('productID','=',$request->get('id'))
            //             ->get();
            $i = array();
            foreach ($detail as $value) {
                array_push($i, $value->detail);
            }
            $item->detail = $detail;
        });


        return $products;
    }

    function vieworder(Request $request) {
        $id = explode(",", $request->get('id'));

        $data = array();
        foreach ($id as $key => $value) {
            $products = DB::table('tbl_product')
                            ->select('productID','name','price')
                            ->where('productID','=',$value)
                            ->orWhere('productID','=',$value)
                            ->get();

            array_push($data, $products);
        }

        return $data;    
    }

    function requirelocation() {
        return view('requirelocation');
    }

    function listorder(Request $request) {
        $id = explode(",", $request->get('id'));
        $data = array();
        foreach ($id as $key => $value) {
            $products = DB::table('tbl_product')
                            ->select('productID','name','price','image')
                            ->where('productID','=',$value)
                            ->orWhere('productID','=',$value)
                            ->get();

            array_push($data, $products);
        }
        return $data;
    }

    function insertorder(Request $data) {
        $username = $data->usernameVal;
        $phone = $data->phoneVal;
        $locatiobName = $data->locationVal;
        $lat = $data->latVal;
        $lng = $data->lngVal;
        $apartment = $data->homeVal;
        $productIDStr = $data->productIDVal;
        $countStr = $data->countVal;
        $firebaseID = $data->firebaseID;
        $productIDArr = explode(",",$productIDStr);
        $countArr = explode(",",$countStr);
        $users = User::where('cookie','=',$username)->first();



        if (!$users) {
            $user = new User;
            $user->genderID = 3;
            $user->email = null;
            $user->password = null;
            $user->birthdate = null;
            $user->status = "anonymous";
            $user->phone = null;
            $user->remember_token = null;
            $user->cookie = $username;
            $user->save();
        } 
        $users = User::where('cookie','=',$username)->first();
        $location = Location::where('userID','=',$users->userID)
                                ->where('latitude','=',$lat)
                                ->where('longtitude','=',$lng)
                                ->first();
        if (!$location) {
            $newLocation = new Location();
            $newLocation->userID = $users->userID;
            $newLocation->name = $locatiobName;
            $newLocation->home_apartment = $apartment;
            $newLocation->latitude = $lat;
            $newLocation->longtitude = $lng;
            $newLocation->save();
        }else{
            if ($location->home_apartment != $apartment) {

                Location::where("tbl_location.locationID", '=', $location->locationID)
                        ->update(['tbl_location.home_apartment'=>$apartment]);

            }
        }
        $users = User::where('cookie','=',$username)->first();
        $location = Location::where('userID','=',$users->userID)
                                ->where('latitude','=',$lat)
                                ->where('longtitude','=',$lng)
                                ->orderBy('created_at', 'desc')
                                ->first();
        $totalPrice = 0;
        foreach($productIDArr as $key => $value){
            $product = Product::where('productID','=',intval($value))->first();
            $totalPrice = $totalPrice + ($product->price * intval($countArr[$key]));
        }
        $newOrder = new Order();
        $newOrder->userID = $users->userID;
        $newOrder->locationID = $location->locationID;
        $newOrder->phone = $phone;
        $newOrder->totalPrice = $totalPrice;
        $newOrder->firebaseID = $firebaseID;
        $newOrder->save();
        $order = Order::where('userID','=',$users->userID)
                            ->orderBy('created_at', 'desc')
                            ->first();
        foreach($productIDArr as $key => $value){
            $product = Product::where('productID','=',intval($value))->first();
            $newOrderdetail = new Orderdetail();
            $newOrderdetail->orderID = $order->orderID;
            $newOrderdetail->productID = $product->productID;
            $newOrderdetail->total = $countArr[$key];
            $newOrderdetail->save();
        }
        // return Redirect::to('successorder');
        return view('successorder');
    }

    function successorder() {
        return view('successorder');
    }

    function marklocation() {
        return view('marklocation');
    }

    function mylocation(Request $data) {
        $username = $data->username;

        $user = User::where('cookie','=',$username)
                            ->first();

        $locations = Location::where('userID','=',$user->userID)
                                ->get();

        return $locations;
    }

    function getlocation(Request $data) {

        $location = Location::where('locationID','=',$data->id)
                            ->first();

        return $location;
    }
    

}








































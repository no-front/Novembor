<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Product;
use App\ProductDetail;
use App\Order;
use App\Orderdetail;
use App\Location;
use DB;

class BackofficeController extends Controller{
    
    public function admin() {
        return view('backoffice.main.admin');
    }

    public function adminLogin() {
        $input = Input::all();
        $rules = array(
            'email' => 'required|email',
            'pass' => 'required|required|min:6'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return view('backoffice.main.admin')->withError("Please check your data");
        }else {
            $users = User::where('email','=',$input['email'])->where('status','=','admin')->first();
            if ($users) {
                $users = User::where('email','=',$input['email'])->where('password','=',md5($input['pass']))->where('status','=','admin')->first();
                if ($users) {
                    Auth::login($users, true);
                    return Redirect::to('/admin/home');
                }else{
                    return view('backoffice.main.admin')->withError("รหัสผ่านไม่ถูกต้อง");
                }
            }else{
                return view('backoffice.main.admin')->withError("ไม่มี email นี้ในระบบ");
            }
        }
    }

    public function manageproducts() {
        $product = DB::table('tbl_product')
                        ->select('tbl_product.productID','tbl_product_type.nameTH','tbl_product.name','tbl_product.image','tbl_product.price')
                        ->join('tbl_product_type','tbl_product_type.productTypeID','=','tbl_product.productTypeID')
                        ->get();
        $detail = DB::table('tbl_product_detail')
                                ->select('productID')
                                ->groupBy('productID')
                                ->get();
        $array = array();
        foreach ($detail as $key => $value) {
            array_push($array, $value->productID);
        }
        $filter = $product->map(function ($item, $key) use ($product, $array) {

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
        return view('backoffice.manageproducts', ['product'=>$product]);
    }

    public function addproductdata(Request $data) {
        $input = Input::all();
        $rules = array(
            'name' => 'required',
            'detail1' => 'required',
            'price' => 'required'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return  view('backoffice.addproduct')->withError("มีบางอย่างผิดพลาด ไม่ผ่านการตรวจสอบ");
        }else{
            if ($data->hasFile('file')) {
                $fileName = $data->file->getClientOriginalName();
                $fileSize = $data->file->getClientSize();
                $data->file->move(public_path('/images/product'.$data->cate.''), $fileName);
                $pathImage = 'http://192.168.64.2/novembor/public/images/product'.$data->cate.'/';
    
                $file = new Product;
                $file->productTypeID = $data->cate;
                $file->name = $data->name;
                $file->price = $data->price;
                $file->image = $pathImage.$fileName;
                $file->save();
    
                $product = Product::where('name','=',$input['name'])->first();
    
                for ($i=1; $i <= 5; $i++) { 
                    if ($input['detail'.$i.'']!=null || $input['detail'.$i.'']!='') {
                        $newProduct = new ProductDetail;
                            $newProduct->productID = $product->productID;
                            $newProduct->detail = $input['detail'.$i.''];
                            $newProduct->save();
                    }
                }
                return Redirect::to('/admin/manageproducts');
            }else{
                return view('backoffice.addproduct')->withError("มีบางอย่างผิดพลาด");
            }
        }
    }

    public function productdetail($id) {
        $product = DB::table('tbl_product')
                        ->select('tbl_product.productID','tbl_product_type.nameTH','tbl_product.name','tbl_product.image','tbl_product.price')
                        ->join('tbl_product_type','tbl_product_type.productTypeID','=','tbl_product.productTypeID')
                        ->where('tbl_product.productID','=',$id)
                        ->get();
        $detail = DB::table('tbl_product_detail')
                                ->select('detail')
                                ->where('productID','=',$id)
                                ->get();
        $array = array();
        foreach ($detail as $key => $value) {
            array_push($array, $value->detail);
        }
        $filter = $product->map(function ($item, $key) use ($product, $array) {
            if ($array!=[] && $array!=null && $array!=[]) {
                $item->detail = $array;
            }else{
                $item->detail = null;
            }
        });
        // return $product;
        return view('backoffice.productdetail', ['product'=>$product]);
    }

    public function editproduct($id) {
        $product = DB::table('tbl_product')
                        ->select('productID','productTypeID','name','image','price')
                        // ->join('tbl_product_type','tbl_product_type.productTypeID','=','tbl_product.productTypeID')
                        ->where('productID','=',$id)
                        ->get();
        $detail = DB::table('tbl_product_detail')
                                ->select('detail')
                                ->where('productID','=',$id)
                                ->get();
        $array = array();

        for ($i=0; $i < 5; $i++) { 
            if (!empty($detail[$i]->detail)) {
                array_push($array, $detail[$i]->detail);
            }else{
                array_push($array, "");
            }
        }

        $filter = $product->map(function ($item, $key) use ($product, $array) {
            if ($array!=[] && $array!=null && $array!=[]) {
                $item->detail = $array;
            }else{
                $item->detail = null;
            }
        });
        // return $product;
        return view('backoffice.editproduct', ['product'=>$product]);
    }

    public function editproductsuccess(Request $data) {
    	$input = Input::all();
        $rules = array(
            'name' => 'required',
            'detail1' => 'required',
            'price' => 'required'
        );
        $product = DB::table('tbl_product')
        				->select('productID','productTypeID','name','image','price')
                        ->where('productID','=',$data->productID)
                        ->get();
        // return $data;

        foreach ($product as $key => $product) {
        	if ($product->name!=$data->name) {
        		DB::table('tbl_product')
                	->where('productID', $data->productID)
                	->update(['name' => $data->name]);
        	}
        	if ($product->productTypeID!=$data->cate) {
        		DB::table('tbl_product')
                	->where('productID', $data->productID)
                	->update(['productTypeID' => $data->cate]);
        	}
        	if ($product->price!=$data->price) {
        		DB::table('tbl_product')
                	->where('productID', $data->productID)
                	->update(['price' => $data->price]);
        	}
        	if ($data->hasFile('file')) {
        		$fileName = $data->file->getClientOriginalName();
                $fileSize = $data->file->getClientSize();
                $data->file->move(public_path('/images/product'.$data->cate.''), $fileName);
                $pathImage = 'http://192.168.64.2/novembor/public/images/product'.$data->cate.'/';
                DB::table('tbl_product')
                	->where('productID', $data->productID)
                	->update(['image' => $pathImage.$fileName]);
        	}
        }
        $productDetail = DB::table('tbl_product_detail')
        				->select('productDetailID','productID','detail')
                        ->where('productID','=',$data->productID)
                        ->get();
        foreach ($productDetail as $key => $productDetail) {
        	switch ($key) {
        		case 0:
        			if ($productDetail->detail != $data->detail1) {
        				DB::table('tbl_product_detail')
                			->where('productDetailID', $productDetail->productDetailID)
                			->update(['detail' => $data->detail1]);
        			}
        			break;
        		case 1:
        			if ($productDetail->detail != $data->detail2) {
        				if ($data->detail2 != null && $data->detail2 != '') {
        					DB::table('tbl_product_detail')
                				->where('productDetailID', $productDetail->productDetailID)
                				->update(['detail' => $data->detail2]);
        				}else{
                			DB::table('tbl_product_detail')
                				->where('productDetailID', '=', $productDetail->productDetailID)
                				->delete();
        				}
        			}
        			break;
        		case 2:
        			if ($productDetail->detail != $data->detail3) {
        				if ($data->detail3 != null && $data->detail3 != '') {
        					DB::table('tbl_product_detail')
                				->where('productDetailID', $productDetail->productDetailID)
                				->update(['detail' => $data->detail3]);
        				}else{
                			DB::table('tbl_product_detail')
                				->where('productDetailID', '=', $productDetail->productDetailID)
                				->delete();
        				}
        			}
        			break;
        		case 3:
        			if ($productDetail->detail != $data->detail4) {
        				if ($data->detail4 != null && $data->detail4 != '') {
        					DB::table('tbl_product_detail')
                				->where('productDetailID', $productDetail->productDetailID)
                				->update(['detail' => $data->detail4]);
        				}else{
                			DB::table('tbl_product_detail')
                				->where('productDetailID', '=', $productDetail->productDetailID)
                				->delete();
        				}
        			}
        			break;
        		case 4:
        			if ($productDetail->detail != $data->detail5) {
        				if ($data->detail5 != null && $data->detail5 != '') {
        					DB::table('tbl_product_detail')
                				->where('productDetailID', $productDetail->productDetailID)
                				->update(['detail' => $data->detail5]);
        				}else{
                			DB::table('tbl_product_detail')
                				->where('productDetailID', '=', $productDetail->productDetailID)
                				->delete();
        				}
        			}
        			break;
        		default:
        			return 'Error';
        			break;
        	}
        }
        $array = array();
        for ($i=0; $i < 5; $i++) {
        	switch ($i) {
        		case 0:
        			if ($data->detail1 != null && $data->detail1 != '') {
        				array_push($array, $data->detail1);
        			}else{
        				array_push($array, '');
        			}
        			break;
        		case 1:
        			if ($data->detail2 != null && $data->detail2 != '') {
        				array_push($array, $data->detail2);
        			}else{
        				array_push($array, '');
        			}
        			break;
        		case 2:
        			if ($data->detail3 != null && $data->detail3 != '') {
        				array_push($array, $data->detail3);
        			}else{
        				array_push($array, '');
        			}
        			break;
        		case 3:
        			if ($data->detail4 != null && $data->detail4 != '') {
        				array_push($array, $data->detail4);
        			}else{
        				array_push($array, '');
        			}
        			break;
        		case 4:
        			if ($data->detail5 != null && $data->detail5 != '') {
        				array_push($array, $data->detail5);
        			}else{
        				array_push($array, '');
        			}
        			break;
        		default:
        			break;
        	}
        }
        $productDetail = DB::table('tbl_product_detail')
        				->select('productDetailID','productID','detail')
                        ->where('productID','=',$data->productID)
                        ->get();
        foreach ($array as $i => $newDetail) {
        	$check = false;
        	foreach ($productDetail as $j => $defaultDeatil) {
        		if ($newDetail == $defaultDeatil->detail) {
        			$check = true;
        		}
        		if ($newDetail == '') {
        			$check = true;
        		}
        	}
        	if ($check == false) {
        		$newProduct = new ProductDetail;
                $newProduct->productID = $data->productID;
                $newProduct->detail = $newDetail;
                $newProduct->save();
        	}
        }
        return Redirect::to('admin/productdetail/'.$data->productID.'');
        // return view('backoffice.editproduct', ['product'=>$product]);
    }

    public function deleteproduct($id) {
    	DB::table('tbl_product')
    		->where('productID','=',$id)
    		->delete();
        // return $id;
        return Redirect::to('/admin/manageproducts');
    }

    public function viewnotification($id) {
                        
        $order = Order::where('firebaseID','=',$id)->first();

        $location = Location::select('name as locationName','home_apartment','latitude','longtitude')
                                ->where('locationID','=',$order->locationID)
                                ->first();

        $orderDetail = Orderdetail::select('tbl_order_detail.orderDetailID','tbl_order_detail.orderID',
                                            'tbl_order_detail.productID','tbl_order_detail.total',
                                            'tbl_product.productTypeID','tbl_product.name','tbl_product.price','tbl_product.image'
                                            ,'tbl_order_detail.created_at')
                                    ->where('orderID','=',$order->orderID)
                                    ->join('tbl_product','tbl_product.productID','=','tbl_order_detail.productID')
                                    ->get();

        $totalPrice = 0;
        foreach ($orderDetail as $key => $value) {
            $totalPrice += $value->price * $value->total;
        }

        $filter = $orderDetail->map(function ($item, $key) use ($totalPrice,$location,$order) {
                $item->phone = $order->phone;
                $item->firebaseID = $order->firebaseID;
                $item->totalPrice = $totalPrice;
                $item->locationName = $location->locationName;
                $item->home_apartment = $location->home_apartment;
                $item->latitude = $location->latitude;
                $item->longtitude = $location->longtitude;
        });
        return view('backoffice.viewnotification', ['order'=>$orderDetail]);
    }

    public function orderinformation() {
        $orders = Order::select('tbl_order.orderID','tbl_user.cookie','tbl_order.phone','tbl_order.totalPrice',
                                'tbl_location.name AS locationName','tbl_order.created_at','tbl_order.firebaseID')
                            ->join('tbl_user','tbl_user.userID','=','tbl_order.userID')
                            ->join('tbl_location','tbl_location.locationID','=','tbl_order.locationID')
                            ->orderBy('created_at','DESC')
                            ->get();
        $filter = $orders->map(function ($item, $key) {
            $orderDetail = Orderdetail::select('tbl_order_detail.orderDetailID',
                                            'tbl_order_detail.productID','tbl_order_detail.total',
                                            'tbl_product.productTypeID','tbl_product.name','tbl_product.price','tbl_product.image')
                                    ->where('orderID','=',$item->orderID)
                                    ->join('tbl_product','tbl_product.productID','=','tbl_order_detail.productID')
                                    ->get();
            $item->detail = $orderDetail;
        });
        // return $orders;
        return view('backoffice.orderinformation', ['orders'=>$orders]);
    }

    public function datauser() {
        $users = User::where('cookie','!=','null')->get();
        // return $users;
        return view('backoffice.datauser', ['users'=>$users]);
    }

    public function backoffice() {
        return view('backoffice.notification');
    }
    
    public function addproduct() {
        return view('backoffice.addproduct');
    }
    
    public function adminLogout(){
    	Auth::logout();
    	return Redirect::to('admin');
    }
    

}









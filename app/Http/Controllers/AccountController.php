<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;
use App\User;
use DB;
class AccountController extends Controller {
    public function login() {
        return view('login');
    }
    public function signIn() {
        $input = Input::all();
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|required|min:6'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return view('login')->withError("Please check your data");
        }else {
            $users = User::where('email','=',$input['email'])->where('password','=',md5($input['password']))->first();
            if($users) {
                Auth::loginUsingId($users->userID);
                return Redirect::to('/');
            }else{
                return view('login')->withError("Invalid username / password");
            }
        }
    }
    
    public function register() {
        return view('register');
    }

    public function signUp() {
        $input = Input::all();
        $rules = array(
            'telephone' => 'required|min:9|max:10',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'password' => 'required|required|min:6',
            'confirmPassword' => 'required|required|min:6',
            'accept' => 'required'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return view('register')->withError("Please check your data");
        }else {
            if($input['password']!=$input['confirmPassword']) {
                $error = array("password not same");
                return view('register')->withError($error);
            }else{
                $users = User::where('email','=',$input['email'])->first();
                if($users) {
                    return view('register')->withError("Invalid username / password");
                } else {
                    $newuser = new User;
                    $newuser->genderID = $input['gender'];
                    $newuser->email = $input['email'];
                    $newuser->password = md5($input['password']);
                    $newuser->birthdate = Carbon::parse($input['birthdate'])->toDateString();
                    $newuser->phone = $input['telephone'];
                    $newuser->status = 'user';
                    $newuser->remember_token = $input['_token'];
                    if($newuser->save()==true) {
                        Auth::loginUsingId($newuser->userID);
                        return Redirect::to('/');
                    }else{
                        return view('register')->withError("Something went wrong !!! Please try again.");
                    }
                }
            }
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }
}














<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use DB;

use File;

use Auth;

use Session;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MainController extends Controller{

    public function home() {
        return view('home');
    }

    public function login() {
    	return view('login');
    }
    
    public function register() {
    	return view('register');
    }

    public function alone() {
    	return view('alone');
    }

    public function duo() {
    	return view('duo');
    }

    public function group() {
    	return view('group');
    }

    public function requirelocation() {
        return view('requirelocation');
    }

    public function marklocation() {
        return view('marklocation');
    }

    public function myorder() {
        return view('myorder');
    }


    // -------------------- Back Office ---------------------

    public function admin() {
        return view('backoffice.main.admin');
    }

    public function backoffice() {
        return view('backoffice.notification');
    }

    public function orderinformation() {
        return view('backoffice.orderinformation');
    }

    public function manageproducts() {
        return view('backoffice.manageproducts');
    }

    public function productdetail() {
        return view('backoffice.productdetail');
    }

    public function addproduct() {
        return view('backoffice.addproduct');
    }

    public function editproduct() {
        return view('backoffice.editproduct');
    }

    public function datauser() {
        return view('backoffice.datauser');
    }

}










<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function home() {
        return view('home');
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
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Artisan;
class HomeController extends Controller
{
    public function index()
    {
        Artisan::call('roles:create-role-routes');    // this command use to create new route in roles
        if(isset($_COOKIE['name'])){
            Session::put('branch', $_COOKIE['name']);
        } 
        
        return view('layouts.index');
    }
}

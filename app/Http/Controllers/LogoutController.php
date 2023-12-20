<?php

namespace App\Http\Controllers;

use App\Helpers\Moving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        setcookie('name', false);
        Session::forget('branch');
        Session::flush();
        Moving::getMoving('تسجيل الخروج');
        Auth::user()->update(['activition'=>0]);
        Auth::logout();
        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('front/login');
    }


}

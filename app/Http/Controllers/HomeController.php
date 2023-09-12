<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $uerverfication = Auth()->user()->verification;
            $userverification = Auth()->user()->emailverification;
            if ($uerverfication == 1) {
                if ($userverification == false) {
                    return view("auth.2fa-setup");
                }else{
                    return view('dashboard');
                }
            }else if ($uerverfication == 0) {
                return view("admin.newuser.passwordReset");
            }else{
                return redirect()->back();
            }
        }
    }
    public function verification(){
        return view("admin.newuser.passwordReset");
    }
}

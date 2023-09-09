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
            if ($uerverfication == 1) {
                return view('dashboard');
            }else if ($uerverfication == 0) {
                return view("admin.newuser.passwordReset");
            }else{
                return redirect()->back();
            }
        }
    }
}

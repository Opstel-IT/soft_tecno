<?php

namespace App\Http\Controllers\Backend\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AdminLoginForm()
    {
        return view('backend.admin.account.login');
    }

    public function AdminLogin(Request $request)
    {
       $request->validate([
            'email'=>'required',
            'password'=>'required',

       ]);
       if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
           return redirect()->route('Admin.dashboard');

       }else{
           Session::flash('error_msg','Invalid Email or Password');
           return redirect()->back();
       }
    }

    public function AdminDashboard()
    {
        return view('backend.admin.dashboard.dashboard');
    }


    public function AdminLogOut()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('Admin.LoginForm');
    }

}

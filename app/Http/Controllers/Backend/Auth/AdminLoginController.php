<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\Backend\AdminLoginRequest;
use Auth;
use App\Http\Controllers\Controller;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except'=> ['logout']]) ;
    }
    public function showLoginForm()
    {
        return view('Backend.Auth.admin-login');
    }
    public function login(AdminLoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=>$request->password], $request->remember)) {
               return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return  redirect('/');
    }
}


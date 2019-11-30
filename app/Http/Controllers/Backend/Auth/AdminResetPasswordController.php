<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;
use Illuminate\Http\Request;

class AdminResetPasswordController extends Controller
{

    use ResetsPasswords;

        protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    protected function broker()
    {
        return Password::broker('admins');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('Backend.Pages.Auth.passwords.reset-admin')->with(
         ['token' => $token, 'email' => $request->email]);}
}

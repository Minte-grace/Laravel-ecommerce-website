<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class AdminForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function broker()
    {
        return Password::broker('admins');
    }
    public function showLinkRequestForm()
    {
        return view('Backend.Auth.passwords.email-admin');
    }

}

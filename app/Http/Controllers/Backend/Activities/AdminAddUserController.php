<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAddUserController extends Controller
{
    /*
       |--------------------------------------------------------------------------
       | Register Controller
       |--------------------------------------------------------------------------
       |
       | This controller handles the registration of new users as well as their
       | validation and creation. By default this controller uses a trait to
       | provide this functionality without requiring any additional code.
       |
       */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     *
**/

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function edit($id)
    {
        $users= User::find($id);
        return view('admin.update-user')->with('users', $users);
    }


     public function update(Request $request, $id){
        $users = User::find($id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password=Hash::make($request->input('password'));
        $users->save();

        return  back()->with('success_message', "User profile is updated  successfully!");

     }

    public function register(Request $request)
    {
        $users = User::all();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
         User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return  back()->with('success_message', "New User is added  successfully!");




    }
    public function destroy($id)
    {

        $products = User::where('id', $id)->delete();
        return  back()->with('success_message', "User is deleted  successfully!");

    }
}

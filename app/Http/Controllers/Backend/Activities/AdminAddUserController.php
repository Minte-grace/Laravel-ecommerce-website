<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\UserRegisterRequest;
use App\Http\Requests\Backend\UserUpdateRequest;
use App\Repositories\Backend\User\AddUserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;



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

    protected $adduserRepository;

    public function __construct(AddUserRepository $adduserRepository)
    {
        $this->middleware('auth:admin');
        $this->adduserRepository= $adduserRepository;
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
        $users= $this->adduserRepository->showEditor($id);
        return view('Backend.Pages.update-user')->with('users', $users);
    }


     public function update(UserUpdateRequest $request, $id){
         $this->adduserRepository->update($id, $request->only(
             ['name', 'email', 'password']));
         return  back()->with('success_message', "User profile is updated  successfully!");

     }

    public function register(UserRegisterRequest $request)
    {
        $this->adduserRepository-> create($request->only(
            ['name', 'email', 'password']));
        return  back()->with('success_message', "New User is added  successfully!");

    }
    public function destroy($id)
    {
        $this->adduserRepository->delete($id);
        return  back()->with('success_message', "User is deleted  successfully!");

    }

}

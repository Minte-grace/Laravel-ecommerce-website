<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\UserRegisterRequest;
use App\Http\Requests\Backend\UserUpdateRequest;
use App\Repositories\Backend\User\AddUserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;



class AdminAddUserController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    protected $adduserRepository;

    public function __construct(AddUserRepository $adduserRepository)
    {
        $this->middleware('auth:admin');
        $this->adduserRepository= $adduserRepository;
    }

    public function index(){

        return view('Backend.Pages.admin-add-user');
    }
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

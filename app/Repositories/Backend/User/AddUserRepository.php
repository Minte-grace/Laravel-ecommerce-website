<?php

namespace App\Repositories\Backend\User;
use App\Order;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class AddUserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

  public function create(array $data)
  {
      return DB::transaction(function () use ($data) {
              $user=$this->model::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
          ]);
               return $user;
       });
  }
  public function update($id, array $data)
  {
      return DB::transaction(function () use ($data, $id) {
          $users =$this->model::find($id);
          $users->name = $data['name'];
          $users->email = $data['email'];
          $users->password=Hash::make($data['password']);
          $users->save();

          return $users;
      });
  }
  public function showEditor($id)
  {
      $orders= Order::all();
      $users= User::find($id);
      return [$users,$orders];
  }
  public function delete($id)
  {
      $users = User::where('id', $id)->delete();
      return $users;
  }
}

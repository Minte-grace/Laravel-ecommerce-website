<?php
namespace App\Repositories\Backend\Admin;

use App\Category;
use App\Order;
use App\Product;
use App\Repositories\BaseRepository;
use App\User;

class AdminPageRepository extends BaseRepository
{
     public function __construct(User $model){
         $this->model= $model;
     }

     public function detail(){
         $orders= Order::all();
         $users = User::all();
         return [$orders, $users];
     }

     public function category(){
         $categories=Category::orderBy('created_at','desc')->paginate(5);
         return $categories;
     }

     public function orders(){
         $orders= Order::orderBy('created_at','desc')->paginate(5);
         return $orders;
     }

     public function users(){
         $users = User::orderBy('created_at','desc')->paginate(5);
         return $users;
     }

     public function products(){
         $products = Product::orderBy('created_at','desc')->paginate(5);
         return $products;
     }
}

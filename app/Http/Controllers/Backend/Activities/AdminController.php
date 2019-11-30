<?php

namespace App\Http\Controllers;
use App\Repositories\Backend\Admin\AdminPageRepository;

class AdminController extends Controller
{

  protected $adminpageRepository;

    public function __construct(AdminPageRepository $adminPageRepository){
        $this->middleware('auth:admin');
        $this->adminpageRepository = $adminPageRepository;
    }

    public function index()
    {
        return view('Backend.Pages.admin');
    }

    public function detail(){
        $orders= $this->adminpageRepository->detail();
        $users = $this->adminpageRepository->detail();
        return view('Backend.Pages.order-details')->with([
        'users' => $users,
        'orders' => $orders,
        ]);
    }

    public function categoryTable(){
        $categories=$this->adminpageRepository->category();
        return view('Backend.Pages.categories')->with('categories',$categories);
     }

    public function ordersTable(){
         $orders= $this->adminpageRepository->orders();
         return view('Backend.Pages.orders')->with( 'orders', $orders);
    }

    public function productsTable(){
         $products = $this->adminpageRepository->products();
         return view('Backend.Pages.products-table')->with('products',$products);
    }

    public function usersTable(){
         $users = $this->adminpageRepository->users();
         return view('Backend.Pages.users')->with('users',$users);
    }

}

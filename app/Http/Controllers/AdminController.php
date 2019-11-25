<?php

namespace App\Http\Controllers;
use App\Category;
use App\Order;
use App\User;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders= Order::orderBy('created_at','desc')->paginate(5);
        $products = Product::orderBy('created_at','desc')->paginate(5);
        $categories=Category::orderBy('created_at','desc')->paginate(5);
        $users = User::orderBy('created_at','desc')->paginate(5);
        return view('admin.admin')->with([
            'users' => $users,
            'orders' => $orders,
            'products'=>$products,
            'categories'=>$categories,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product-update')->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function adduser(){

        return view('admin.admin-add-user');
    }
    public function detail(){
        $orders= Order::all();
        $users = User::all();
        return view('admin.order-details')->with([
            'users' => $users,
            'orders' => $orders,
        ]);
    }
    public function addproduct(){
        $products = Product::all();
        $categories= Category::all();

        return view('admin.add-product')->with([
            'products' => $products,
            'categories' => $categories,

        ]);


    }
    public function addcategory(){
        return view('admin.add-category');
    }
 public function categoryTable(){

     $orders= Order::orderBy('created_at','desc')->paginate(5);
     $products = Product::orderBy('created_at','desc')->paginate(5);
     $categories=Category::orderBy('created_at','desc')->paginate(5);
     $users = User::orderBy('created_at','desc')->paginate(5);
     return view('admin.categories')->with([
         'users' => $users,
         'orders' => $orders,
         'products'=>$products,
         'categories'=>$categories,
     ]);

 }
 public function ordersTable(){

     $orders= Order::orderBy('created_at','desc')->paginate(5);
     $products = Product::orderBy('created_at','desc')->paginate(5);
     $categories=Category::orderBy('created_at','desc')->paginate(5);
     $users = User::orderBy('created_at','desc')->paginate(5);
     return view('admin.orders')->with([
         'users' => $users,
         'orders' => $orders,
         'products'=>$products,
         'categories'=>$categories,
     ]);
 }
 public function productsTable(){
     $orders= Order::orderBy('created_at','desc')->paginate(5);
     $products = Product::orderBy('created_at','desc')->paginate(5);
     $categories=Category::orderBy('created_at','desc')->paginate(5);
     $users = User::orderBy('created_at','desc')->paginate(5);
     return view('admin.products-table')->with([
         'users' => $users,
         'orders' => $orders,
         'products'=>$products,
         'categories'=>$categories,
     ]);
    }
 public function usersTable(){
     $orders= Order::orderBy('created_at','desc')->paginate(5);
     $products = Product::orderBy('created_at','desc')->paginate(5);
     $categories=Category::orderBy('created_at','desc')->paginate(5);
     $users = User::orderBy('created_at','desc')->paginate(5);
     return view('admin.users')->with([
         'users' => $users,
         'orders' => $orders,
         'products'=>$products,
         'categories'=>$categories,
     ]);
 }

}

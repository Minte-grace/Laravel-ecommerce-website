<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //public function __construct()
    //{
      //  $this->middleware('auth');
   // }

   public function index()
   {
       $products = Product::inRandomOrder()->take(4)->get();
       return view('pages.index', compact('products'));

   }
}

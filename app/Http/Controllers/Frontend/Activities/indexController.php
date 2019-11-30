<?php

namespace App\Http\Controllers;

use App\Repositories\Frontend\Product\indexRepo;


class indexController extends Controller
{
    public function __construct(indexRepo $indexRepo)
    {
        $this->indexRepo = $indexRepo;
    }

   public function index()
   {
       $products =$this->indexRepo->take();
       return view('Frontend.Pages.index', compact('products'));
   }

}

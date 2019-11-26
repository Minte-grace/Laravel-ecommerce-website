<?php

namespace App\Http\Controllers;
use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);

            });
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        } else {
            $products = Product::take(12);
            $categories = Category::all();
            $categoryName = 'Featured';
        }
           $products = $products->paginate(9);

        return view('Frontend.Pages.products')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
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
    public function show($slug)
    {
       $products = Product::where('slug', $slug)->firstOrFail();
       $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();

       return view('Frontend.Pages.product')->with([
           'product'=> $products,
           'mightAlsoLike' => $mightAlsoLike,
       ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }
    public function productdetail($id){
        $products = Product::find($id);
        return view('Backend.pages.product-details')->with('product', $products);
    }

}

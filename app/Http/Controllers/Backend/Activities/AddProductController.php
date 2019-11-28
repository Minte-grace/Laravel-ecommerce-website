<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AddProductController extends Controller
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

        $categories = Category::all();
        $products = Product::all();

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./storage/Products', $fileName);
        }

        Product::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'details' => $request['details'],
            'price' => $request['price'],
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'image' => $fileName,


        ])->categories()->attach($request->slug);
        return  back()->with([
            'products' => $products,
            'categories' => $categories,

             ])->with('success_message', 'New product is added successfully');


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
        $categories = Category::all();
        $products = Product::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:255'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./storage/Products', $fileName);

            Storage::delete('/storage/Products'.$products->image);

        }

            $products->name = $request->input('name');
            $products->slug = $request->input('slug');
            $products->details= $request->input('details');
            $products->price= $request->input('price');
            $products->description = $request->input('description');
            $products->quantity= $request->input('quantity');

        if($request->hasFile('image')){
            $products->image = $fileName;
        }
            $products->save();
            return  back()->with([
                'products' => $products,
                'categories' => $categories,

                 ])->with('success_message', 'Product is updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products = Product::where('id', $id)->delete();
        return  back()->with('success_message', "Product is deleted  successfully!");

    }
    public function productdetail($id){
        $products = Product::find($id);
        return view('Backend.Pages.product-details')->with('product', $products);
    }


}

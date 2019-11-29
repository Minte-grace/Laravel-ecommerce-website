<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\Backend\ProductUpdateRequest;
use App\Repositories\Backend\Product\ProductRepository;

use DB;

use Illuminate\Http\Request;



class AddProductController extends Controller
{
    protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth:admin');
        $this->productRepository= $productRepository;
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
    public function store(ProductRequest $request)
    {
       $products = $this->productRepository-> create($request->only(
       ['name', 'slug', 'details', 'price', 'description', 'quantity', 'image',])
       )->categories()->attach($request->slug);
        return  back()->with('success_message', 'New product is added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = $this->productRepository->showProduct($id);
        return view('Backend.Pages.product-details')->with('product', $products);
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
    public function update(ProductUpdateRequest $request,$id)
    {
        $this->productRepository->update($id,
        $request->only('name', 'slug', 'details', 'price', 'description', 'quantity', 'image')
            ->categories()->attach($request->slug));
        return  back()->with('success_message', 'Product is updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return  back()->with('success_message', "Product is deleted  successfully!");

    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\Backend\ProductUpdateRequest;
use App\Repositories\Backend\Product\ProductRepository;
use DB;

class AddProductController extends Controller
{
    protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth:admin');
        $this->productRepository= $productRepository;
    }

    public function index()
    {
        $categories= $this->productRepository->list();
        return view('Backend.Pages.add-product')->with('categories', $categories);
    }

    public function store(ProductRequest $request)
    {
        $this->productRepository-> create($request->only(
        ['name', 'slug', 'details', 'price', 'description', 'quantity', 'image',])
        )->categories()->attach($request->slug);
        return  back()->with('success_message', 'New product is added successfully');

    }
    public function show($id)
    {
        $products = $this->productRepository->showProduct($id);
        return view('Backend.Pages.product-details')->with('product', $products);
    }
    public function edit($id)
    {
        $categories= $this->productRepository->list();
        $products = $this->productRepository->edit($id);
        return view('Backend.Pages.product-update')->with([
            'products' => $products,
            'categories' => $categories,

        ]);
    }
    public function update(ProductUpdateRequest $request,$id)
    {
        $this->productRepository->update($id,
        $request->only(['name', 'slug', 'details', 'price', 'description', 'quantity', 'image']
        ));
        return  back()->with('success_message', 'Product is updated successfully');
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return  back()->with('success_message', "Product is deleted  successfully!");
    }
}

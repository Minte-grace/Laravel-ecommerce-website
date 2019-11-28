<?php

namespace App\Repositories;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

abstract class BaseRepository implements RepositoryInterface
{
    public function take(){
        return Product::all();
    }
    public function show(){

        return Product::all();
        return Category::all();

    }
    public function filter(){
        return Product::all();
        return Category::all();
    }
    public function all()
    {
        return News::all();
    }

    public function create($data)
    {
        return News::create($data);
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function delete($id)
    {
        return News::destroy($id);
    }

    public function update($id, array $data)
    {
        return News::find($id)->update($data);
    }
    public function might($slug)
    {
        return Product::all();
        return Category::all();
    }
    public function store(Request $request){
        return Product::all();
        return Cart::all();
    }

}

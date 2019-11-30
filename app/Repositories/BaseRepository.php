<?php

namespace App\Repositories;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

abstract class BaseRepository implements RepositoryInterface
{
    public function take(){
        return Product::all();
    }
    public function show(){

        return Product::all();

    }
    public function filter(){
        return Product::all();

    }
    public function all()
    {
         return Product::all();
    }

    public function create(array $data)
    {
        return Order::create($data);
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

    }
    public function store(Request $request){
        return Product::all();

    }

}

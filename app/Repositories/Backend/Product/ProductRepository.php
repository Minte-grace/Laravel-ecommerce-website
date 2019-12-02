<?php

namespace App\Repositories\Backend\Product;
use App\Product;
use App\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function list(){
        $categories = Category::all();
        return $categories;
    }
    public function create(array $data): Product
    {
        return DB::transaction(function () use ($data) {
            $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./storage/Products', $fileName);
            }

            $product = $this->model::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'details' => $data['details'],
                'price' => $data['price'],
                'description' => $data['description'],
                'quantity' => $data['quantity'],
                'image' => $fileName,
            ]);
            if ($product) {
                return $product;
            }
        });
    }
    public function update($id, array $data): Product
    {
        return DB::transaction(function () use ($data,$id) {
            $products = $this->model->findOrFail($id);
                $fileName = null;
                if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./storage/Products', $fileName);
                Storage::delete('/storage/Products' . $products->image);
                }
            $products->name = $data['name'];
            $products->slug = $data['slug'];
            $products->details = $data['details'];
            $products->price = $data['price'];
            $products->description = $data['description'];
            $products->quantity = $data['quantity'];

                if (request()->hasFile('image')) {
                    $products->image = $fileName;
                }
                $products->save();

                if ($products) {
                    return $products;
                 }
            });
    }
    public function delete($id)
    {
        $products = Product::where('id', $id)->delete();
        return $products;
    }
    public function showProduct($id)
    {
        $products = Product::find($id);
        return $products;
    }
    public function edit($id):Product
    {
        $products = Product::findOrFail($id);
        return $products;
    }


}

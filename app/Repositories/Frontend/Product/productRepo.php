<?php

namespace App\Repositories\Frontend\Product;
use App\Category;
use App\Product;
use App\Repositories\BaseRepository;

class productRepo extends BaseRepository
{
    protected $product;
    protected $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category= $category;
    }
    public function show(){
        $products = Product::take(12);
        return $products;

    }
    public function filter()
    {
        $products = Product::with('categories')->whereHas('categories', function ($query) {
        $query->where('slug', request()->category);
         });
        return $products;
    }
    public function might($slug)
    {
         $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();
         return $mightAlsoLike;
    }
    public function mightName($slug)
    {
         $products = Product::where('slug', $slug)->firstOrFail();
         return $products;
    }
}

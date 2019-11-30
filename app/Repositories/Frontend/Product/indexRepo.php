<?php

namespace App\Repositories\Frontend\Product;
use App\Product;
use App\Repositories\BaseRepository;


class indexRepo extends BaseRepository
{
   public function take()
   {
        $product = Product::inRandomOrder()->take(4)->get();
        return $product;
   }
}

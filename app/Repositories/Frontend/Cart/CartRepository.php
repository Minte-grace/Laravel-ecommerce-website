<?php


namespace App\Repositories\Frontend\Cart;

use App\Product;
use App\Repositories\BaseRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartRepository extends  BaseRepository
{
        public function show(){
            $mightAlsoLike = Product::inRandomOrder()->take(4)->get();
            return $mightAlsoLike;
        }
        public  function store(Request $request){
            $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
            });
        return $duplicates;
        }
        public function  associate(Request $request){
           Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');
           $cart =  Cart::content();
           return $cart;
        }
        public function updateCart(Request $request, $id)
        {
           $update= Cart::update($id, $request->quantity);
           return $update;
        }
        public function delete($id)
        {
           $remove= Cart::remove($id);
           return $remove;
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Frontend\Cart\CartRepository;


class CartController extends Controller
{
   protected $cartRepository;

   public function __construct(CartRepository $cartRepository)
   {
       $this->cartRepository = $cartRepository;
   }
   public function index()
   {
       $mightAlsoLike = $this->cartRepository->show();
       return view('Frontend.Pages.cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    public function store(Request $request)
    {
        $duplicates = $this->cartRepository->store($request);
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }
        $cart = $this->cartRepository->associate($request);
            return redirect()->route('cart.index',compact('cart'))->with('success_message', "Item is added in your cart!");

        }

    public function update(Request $request, $id)
    {
        $update = $this->cartRepository->updateCart($request,$id);
        return $update->withFlushSuccess('Cart is updated');

    }

    public function destroy($id)
    {
        $this->cartRepository->delete($id);
        return  back()->with('success_message','Item has been removed!');
    }
}

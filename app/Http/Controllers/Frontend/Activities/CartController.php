<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Cart\CartRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        $duplicates = $this->cartRepository->store($request);
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }
        $cart = $this->cartRepository->associate($request);
        return redirect()->route('cart.index',compact('cart'))->with('success_message', "Item is added in your cart!");

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
        //*/
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
        $update = $this->cartRepository->updateCart($request,$id);
        return $update->with('success_message', 'Cart is updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       $this->cartRepository->delete($id);
            return  back()->with('success_message','Item has been removed!');
    }
}

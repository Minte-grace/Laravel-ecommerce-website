<?php

namespace App\Http\Controllers;
use App\User;
use Cart;
use App\Order;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\OrdersRequest;
use App\Repositories\Frontend\Cart\CheckoutRepository;
use mysql_xdevapi\Exception;

class CheckoutController extends Controller
{
    protected $checkoutRepository;

    public function __construct(CheckoutRepository $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    public function index()
    {
        if ( Cart::instance('default')->count() == 0) {
            return redirect()->route('products.show');
        }
        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }
            return view('Frontend.Pages.checkout');
        }

    public function create()
    {
        //
    }

    public function store(OrdersRequest $request)
    {

        $this->checkoutRepository->create($request->only([
            'name' ,
            'email' ,
            'address',
            'city',
            'phone',
        ]));
        $this->decreaseQuantities();
        $cartins = Cart::instance('default');
        $cartins->destroy();
        return view('Frontend.Pages.thankyou')->with('success_message', 'Thank you! Your payment has been successfully accepted!');

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function thankyou(){
        return view('Frontend.Pages.thankyou');
    }

    protected function decreaseQuantities(){
            foreach (Cart::content() as $item){
                $product= $this->checkoutRepository->updateCart();
                $product->update(['quantity' => $product->quantity - $item->qty]);
            }
        }
    }

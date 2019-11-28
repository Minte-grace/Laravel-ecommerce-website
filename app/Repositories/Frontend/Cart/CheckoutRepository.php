<?php


namespace App\Repositories\Frontend\Cart;

use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderProduct;
use App\Repositories\BaseRepository;
use http\Env\Request;
use Cart;
use Illuminate\Http\Request;

class CheckoutRepository extends BaseRepository
{
public function all()
{
    $nullify = Cart::instance('default')->count() == 0;
    $user= auth()->user() && request()->is('guestCheckout');
    return [$nullify, $user];
}
public function create($data)
{

    DB::transaction(function ($request){
        $subtotal=Cart::subtotalFloat();
        $total=Cart::totalFloat();
        $tax=Cart::taxFloat();
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_phone' => $request->phone,
            'billing_subtotal' => $subtotal,
            'billing_tax' => $tax,
            'billing_total' => $total,
            'error' => null,

        ]);

});
    foreach (Cart::content() as $item) {
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $item->model->id,
            'quantity' => $item->qty,
        ]);
    }
        $decrement= $this->decreaseQuantities();
        $cartins = Cart::instance('default');
        $cartins->destroy();
        return [$userOrders, $productOrders,$cartins, $decrement];
}
}

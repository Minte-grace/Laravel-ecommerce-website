<?php

namespace App\Repositories\Frontend\Cart;
use App\Http\Controllers\Frontend\Activities\CheckoutController;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderProduct;
use App\Repositories\BaseRepository;
use Cart;


class CheckoutRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
       $this->model = $model;
    }

    public function updateCart(): Product
    {
       foreach (Cart::content() as $item) {
             $product = Product::find($item->model->id);
             return $product;
        }
    }
    public function create(array $data) : Order
    {
        $cartins = Cart::instance('default');
        return DB::transaction(function () use ($data) {
            $order = $this->model::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'billing_name' => $data['name'],
                'billing_email' => $data['email'],
                'billing_address' => $data['address'],
                'billing_city' => $data['city'],
                'billing_phone' => $data['phone'],
                'billing_subtotal' => Cart::subtotalFloat(),
                'billing_tax' => Cart::totalFloat(),
                'billing_total' => Cart::taxFloat(),
            ]);
        foreach (Cart::content() as $item) {
               OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                ]);
               return $order;
            }
    });
 }};






<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return money_format('$%i', $price / 100);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}


function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = Cart::subtotal() ;
  //  $newTax = $newSubtotal * $tax;
    //$newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
      //  'newTax' => $newTax,
        //'newTotal' => $newTotal,
    ]);

}

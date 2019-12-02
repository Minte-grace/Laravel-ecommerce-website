@extends('Frontend.Layouts.app')
@section('content')

<div class="container">
<div class="jumbotron jumbotron-fluid">
    <div class="container"> <h1><b>Your Orders</b></h1>  </div>
</div>
</div>
@foreach ($orders as $order)
<div class="container">
<table class="table">
        <thead class="thead-dark">
        <tr>
            <th><div class="uppercase font-bold">Order Placed</div><div>{{ presentDate($order->created_at) }}</div></th>
            <th><div class="uppercase font-bold">Order ID</div><div>{{ $order->id }}</div></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order->products as $product)
        <tr>
            <td><div><img src="{{asset('/storage/Products/'.$product->image)}}" height="100" width="150" alt="Product Image"></div></td>
            <td><div><b>{{ $product->name }}</b></div>
                <div>{{ $product->details }}</div>
                <div>Subtotal: {{ presentPrice($product->price) }}</div>
                <div>Tax(15%): {{ presentPrice($order->billing_tax) }}</div>
                <div>Quantity: {{ $product->pivot->quantity }}</div>
            </td>
        </tr>
        @endforeach
        <tr>
            <th><div class="uppercase font-bold"></div></th>
            <th><div class="uppercase font-bold">Total</div><div>{{ presentPrice($order->billing_total) }}</div></th>
        </tr>
        </thead>
        </tbody>
        </table>
        </div>
    @endforeach
@endsection

<head>
    <title>Orders table</title>
</head>
@extends('layouts.admin-app')
@section('content')

    <div class="container" style="margin-top: 10px;">
      <div class="jumbotron" style="height: 70px;">
            <h2><b>Orders</b></h2>

      </div>
            <table class="table" style="margin-top: 10px;">
                <thead class="thead-light">
                <tr>
                    <th>Order ID</th>
                    <th>Billing Name</th>
                    <th>Billing Email</th>
                    <th>Billing Address</th>
                    <th>Billing City</th>
                    <th>Order Created at</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->billing_name}}</td>
                        <td>{{$order->billing_email}}</td>
                        <td>{{$order->billing_address}}</td>
                        <td>{{$order->billing_city}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->billing_subtotal}}</td>
                        <td>{{$order->billing_tax}}</td>
                        <td>{{$order->billing_total}}</td>
                        <td style="width: 200px;"><a href="{{route('order.details',$order->id)}}"><button type="button"  class="btn btn-outline-info" style="background-color: #227dc7; color: white; width:50px;">View</button></a>
                            <a href="{{route('order.delete',$order->id)}}"><button type="button" class="btn btn-danger" style="background-color:indianred; color:white; width:60px;">Delete</button></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $orders->links() }}
                </div>
    </div>
</div>

   @endsection

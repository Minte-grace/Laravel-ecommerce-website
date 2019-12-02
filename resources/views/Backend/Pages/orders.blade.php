@extends('Backend.Layouts.admin-app')
@section('content')
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container">
      <div class="jumbotron">
         <h2><b>Orders</b></h2>
         </div>
            <table class="table">
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
                    <td><a href="{{route('order.details',$order->id)}}"><button type="button"  class="btn btn-sm btn-primary">View</button></a>
                        <a href="{{route('order.delete',$order->id)}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></td>
                </tr>
                @endforeach
                </tbody>

            </table>
            {{ $orders->links() }}
    </div>
   @endsection

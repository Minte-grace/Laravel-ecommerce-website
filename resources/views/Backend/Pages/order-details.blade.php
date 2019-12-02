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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1><b>Order Details</b></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th> <div>Order ID {{$order->id}}</div>
                <div>Order created at {{$order->created_at}}</div></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><div>Billing Name: {{$order->billing_name}}</div>
                <div>Billing Email: {{$order->billing_email}}</div>
                <div>Billing Address: {{$order->billing_address}}</div>
                <div>Billing City: {{$order->billing_city}}</div>
                <div>Sub_total: {{$order->billing_subtotal}}</div>
                <div>Tax: {{$order->billing_tax}}</div>
                <div>Total:  {{$order->billing_total}}</div></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection


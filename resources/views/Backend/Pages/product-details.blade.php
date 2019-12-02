@extends('Backend.Layouts.admin-app')
@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1><b>Product Details</b></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th><div>Order ID {{$product->id}}</div>
                <div>{{$product->name}}</div></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><div>{{$product->details}}</div>
                <div>{{$product->description}}</div>
                <div><img src="{{asset('/storage/Products/'.$product->image)}}"/></div>
            </tr>
            </tbody>
        </table>
    </div>
@endsection


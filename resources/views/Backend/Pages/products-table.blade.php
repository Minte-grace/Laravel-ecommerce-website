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
            <h2><b>Products</b></h2>
        </div>
            <a href="{{route('add.product')}}" class="btn btn-primary"> Add New Product</a>
            <p>&nbsp</p>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th style="width: 200px;">Details</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->slug}}</td>
                    <td>{{$product->details}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('product.details',$product->id)}}"><button type="button" class="btn btn-sm btn-success" >View</button></a>
                        <a href="{{route('product.edit', $product->id)}}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                        <a href="{{route('product.delete',$product->id)}}"><button type="button" class="btn btn-sm btn-danger" >Delete</button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection

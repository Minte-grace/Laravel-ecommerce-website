@extends('Frontend.Layouts.app')
@section('content')

<div class="product-img">
<div class="container">
        <div class="row">
        <div class="col-md-6" >
        <img src="{{asset('/storage/Products/'.$product->image)}}" width="300">
</div>
<div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <h3>{{ $product->presentPrice() }}</h3>
        <h4>
            {{ $product->details }}  </h4>
        <p>{{$product->description}}</p>
        <h6>{{$product->quantity}} : Items in Stock</h6>
        <p>&nbsp</p>
 @if($product->quantity > 0)
        <form action="{{ route('cart.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <button type="Submit" class="btn btn-primary ">Add to Cart</button>
        </form>
@endif
            </div>
        </div>
   </div>
</div>
 <div class="container text-center ">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">You might also like</h1>
            <hr class="mt-2 mb-5">
                <div class="row text-center ">
                   @foreach ($mightAlsoLike as $product)
                        @if($product->quantity > 0)
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="d-block mb-4 h-100">
                                    <a href="{{route('product.show', $product->slug)}}"> <img class="img-fluid img-thumbnail" src="{{asset('/storage/Products/'.$product->image)}}"  height="150"alt=""></a>
                                    <h3>{{ $product->name }}</h3>
                                    <p>{{ $product->presentPrice() }}</p>
                                    <div class="row text-center" style="margin-left: 50px">
                                    <div class="col-sm-1"> <button type="Submit" class=" btn btn-group-lg btn-outline-primary">Preview</button></div>
                                    <div class="col-sm-10">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="Submit" class="fa fa-shopping-cart btn btn-primary "></button>
                                    </form>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
@include('Frontend.Partials.footer')
@endsection


@extends('layouts.app')
@section('content')

   <div class="product-img"> 
    <div class="container">
            <div class="row">
                    <div class="col-md-6" >
            <img src="/storage/Products/{{$product->image}}" style="width:300px;margin-left: 200px;">
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

 <!--you may also like this item  -->
 <div class="container text-center ">
        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">You might also like</h1>
            <hr class="mt-2 mb-5">
                <div class="row text-center ">
                   @foreach ($mightAlsoLike as $product)
                      <div class="col-lg-3 col-md-4 col-6">
                          <a href="{{route('product.show', $product->slug)}}" class="d-block mb-4 h-100">
                              <img class="img-fluid img-thumbnail" src="{{asset('/storage/Products/'.$product->image)}}"  alt="" style="height: 150px">
                             <h3>{{ $product->name }}</h3>
                          <p>{{ $product->presentPrice() }}</p>
                         </a>
                     </div>
            @endforeach
        </div>
    </div>
    @include('partials.footer')
@endsection

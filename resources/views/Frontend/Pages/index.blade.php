@extends('Frontend.Layouts.app')
@section('content')

<div class="img-container">
     <img src="{{asset('assets/slide/3.jpg')}}"alt="Snow">
     <div class="bottom-left">We offer quality electronics<br> to consumers at the market’s most competitive prices. </div>
     <button class="btn">Start shopping</button>
</div>
<div class="our-work ">
     <div class="jumbotron  bg-dark text-white jumbotron-fluid text-center bg-info font-weight-light index-jumbotron">
     <div class="container" >
     <h2>OUR SERVICES</h2>
     <hr class="mt-2 mb-5">
     <p>We help retailers offer quality electronics to consumers at the market’s most competitive prices. Our products come with a two-year warranty and a local after-sales support concept that can be tailored to meet any retail need. All of our products are CE certified and live up to the highest EU standards for quality, safety and responsible .We understand the complexities retailers face in dealing with many suppliers, especially in terms of consumer electronics categories, where televisions might come from one supplier, computers and tablets from another, and home security, TVs, and E-mobility products from others still.   </div>
    </div>
</div>
 <div class="container text-center">
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">From Our Products</h1>
        <hr class="mt-2 mb-5">
            <div class="row text-center ">
               @foreach ($products as $product)
                @if($product->quantity > 0)
                  <div class="col-lg-3 col-md-4 col-6">
                      <div class="d-block mb-4 h-100">
                         <a href="{{route('product.show', $product->slug)}}"><img class="img-fluid img-thumbnail" src="{{asset('/storage/Products/'.$product->image)}}"  alt="" style="height: 150px"></a>
                         <h3>{{ $product->name }}</h3>
                         <p>{{ $product->presentPrice() }}</p>
                         <div class="row text-center rm" style="">
                            <div class="col-sm-1"> <button type="Submit" class=" btn btn-group-lg btn-outline-primary">Preview</button></div>
                               <div class="col-sm-10"> <form action="{{ route('cart.store') }}" method="POST">
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
<p>&nbsp</p>
<p>&nbsp</p>
<div class="about">
<div class=" container">
<div class="row jumbotron  bg-dark text-white jumbotron-fluid text-center bg-info font-weight-light index-jumbotron">
    <div class="col">
            <div class="">
                <div class="container" >
                    <h2>About Us</h2>
                    <hr class="mt-2 mb-5">
                    <p>We help retailers offer quality electronics to consumers at the market’s most competitive prices. Our products come with a two-year warranty and a local after-sales support concept that can be tailored to meet any retail need. All of our products are CE certified and live up to the highest EU standards for quality.</div>
               </div>
           </div>
    <div class="col"> <img src="{{asset('assets/slide/5.jpg')}}" height="300" width="500" alt="Snow"></div>
</div>
</div>
</div>
@include('Frontend.Partials.footer')
@endsection

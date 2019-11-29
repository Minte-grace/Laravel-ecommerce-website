@extends('Frontend.Layouts.app')
@section('content')
<div class="img-container">
    <img src="{{asset('assets/slide/3.jpg')}}"alt="Snow">
    <div class="bottom-left">We offer quality electronics<br> to consumers at the market’s most competitive prices. </div>
    <button class="btn">Start shopping</button>
</div>
 <div class="container text-center">
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Our Products</h1>
        <hr class="mt-2 mb-5">
            <div class="row text-center ">
               @foreach ($products as $product)
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
<div class="our-work ">

      <div class="jumbotron  bg-dark text-white jumbotron-fluid text-center bg-info font-weight-light index-jumbotron">
        <div class="container" >
            <h2>OUR SERVICES</h2>
            <hr class="mt-2 mb-5">
            <p>We help retailers offer quality electronics to consumers at the market’s most competitive prices. Our products come with a two-year warranty and a local after-sales support concept that can be tailored to meet any retail need. All of our products are CE certified and live up to the highest EU standards for quality, safety and responsible .We understand the complexities retailers face in dealing with many suppliers, especially in terms of consumer electronics categories, where televisions might come from one supplier, computers and tablets from another, and home security, TVs, and E-mobility products from others still.   </div>
       </div>
</div>
@include('Frontend.Partials.footer')
@endsection

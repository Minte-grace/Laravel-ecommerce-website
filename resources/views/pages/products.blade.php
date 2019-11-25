@extends('layouts.app')
@section('content')

 <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="font-size: large;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <b>BY CATEGORY</b> <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            @foreach($categories as $category)
                            <a class="nav-link" href="{{ route('products.show', ['category' => $category->slug]) }}">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
            <div class="container text-center" style="width:1000px;">
                    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">{{ $categoryName }}</h1>
                        <hr class="mt-2 mb-5">
                            <div class="row text-center ">
                               @foreach ($products as $product)
                                  <div class="col-lg-3 col-md-4 col-6">
                                      <a href="{{route('product.show', $product->slug)}}" class="d-block mb-4 h-100">
                                          <img class="img-fluid img-thumbnail" src="{{asset('/storage/Products/'.$product->image)}}"  alt="" style="width:200px; height: 150px;">
                                         <h3>{{ $product->name }}</h3>
                                      <p>{{ $product->presentPrice() }}</p>
                                     </a>
                                 </div>
                        @endforeach
                    </div>

 <!--pagination -->
         
           <div class="spacer"></div>
           <div style="color: teal"> {{$products->appends(request()->input())->links() }}</div>
      
 </div>
 </div>
 @include('partials.footer')
@endsection

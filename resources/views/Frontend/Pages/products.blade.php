@extends('Frontend.Layouts.app')
@section('content')
<div class="container visible-lg-block">
<div class="nav-side-menu visible-lg-block" style="position:absolute;">
        <div class="brand">BY CATEGORY</div>
            <div class="menu-list">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.show', ['category' => $category->slug]) }}">
                            <i class=""></i>  {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
         </div>
</div>
</div>
<div class="container">
<div class="main">
            <div class="container text-center>
                    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><b style="font-size:35px">{{ $categoryName }}</b></h1>
                        <hr class="mt-2 mb-5">
                            <div class="row text-center ">
                               @foreach ($products as $product)
                                  <div class="col-lg-3 col-md-4 col-6">
                                      <a href="{{route('product.show', $product->slug)}}" class="d-block mb-4 h-100">
                                          <img class="img-fluid img-thumbnail" src="{{asset('/storage/Products/'.$product->image)}}"  alt="" style="width:200px; height: 150px;">
                                         <h3>{{ $product->name }}</h3>
                                      <h7>{{ $product->presentPrice() }}</h7>
                                     </a>
                                 </div>
                        @endforeach
                    </div>
            </div>
 <!--pagination -->
           <div class="spacer"></div>
           <div style="color: teal"> {{$products->appends(request()->input())->links() }}</div>

 </div>
 </div>
 @include('Frontend.Partials.footer')
@endsection

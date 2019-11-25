@extends('layouts.app')
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

      <div class="shopping-cart">

         @if (Cart::count() > 0)
                <div class="title">
                      {{Cart::count()}} item(s) in a Cart
                </div>

         @foreach(Cart::content() as $item)
                      <div class="item">
                             <div class="buttons">
                                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                      <span class="delete-btn"><button type="submit"><img src="{{asset('/assets/img/svg/delete-icn.svg')}}" alt="" /></button></span>
                                  </form>
                             </div>
                             <div class="image">
                                    <img src="/storage/Products/{{$item->model->image}}" alt="" style="width: 100px;"/>
                             </div>
                              <div class="description">
                                    <span><b>{{$item->model->name}}</b></span>
                                    <span>{{$item->model->details}}</span>
                             </div>
                             <div class =" quantity">
                                    <select class="quantity form-control" id="sel1" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                                @for ($i = 1; $i < $item->model->quantity + 1 ; $i++)
                                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                 </select>
                             </div>
                                      <div class="description">
                                          <div class="total-price">Quantity: {{ $item->qty}}</div>
                                      </div>
                                      <div class="description">
                                          <div class="total-price">Subtotal: {{ presentPrice($item->subtotal) }}</div>
                                      </div>
                                      <div class="description">
                                          <div class="total-price">Tax(15%): {{ presentPrice($item->tax) }}</div>
                                      </div>
                                      <div class="description">
                                          <div class="total-price">Total: {{ presentPrice($item->total) }}</div>
                                      </div>
                                      </div>
                                      @endforeach
                                    </div>
                  

             @else
             <h3>No items in Cart</h3>
             @endif
             </div>
             <div class="container text-center">
                 
                     <a href="{{ route('products.show') }}"><button class="btn btn-primary">Continue Shopping</button></a>
                     <a href="{{ route('checkout.index') }}"><button class="btn btn-secondary">Proceed to checkout</button></a>
             </div>
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
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection      


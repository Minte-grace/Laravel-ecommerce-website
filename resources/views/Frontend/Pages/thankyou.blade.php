@extends('Frontend.Layouts.app')
@section('content')

    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1><b>Thank you</b></h1>
                <h3><b>Your order has been submitted</b></h3>
             <div style="margin-top: 50px;">
             <a href="{{ route('products.show') }}"><button class="btn btn-primary">Continue Shopping</button></a>
            </div>
           </div>
        </div>
    </div>
@endsection


@extends('Frontend.Layouts.app')
@section('content')
     <div class="jumbotron">
         <h3>Shipping Address</h3>
     </div>
    <div class="cell example example3" id="example-3">
        <form action="{{ route('checkout.store') }}" method="post" >
            @csrf
        <div class="form-row fieldset">
            <input  id="name" name="name" data-tid="elements_examples.form.name_label" class="field" type="text" placeholder="Name" required="" autocomplete="name">
            <input id="email" name="email" data-tid="email" class="field half-width" type="email" placeholder="Email" required="" autocomplete="email">
            <input id="phone" name="phone"data-tid="elements_examples.form.phone_label" class="field half-width" type="text" placeholder="Phone" required="" autocomplete="phone">
            <input id="address"name="address" data-tid="elements_examples.form.email_label" class="field half-width" type="text" placeholder="Address" required="" autocomplete="address">
            <input id="city" name="city" data-tid="elements_examples.form.phone_label" class="field half-width" type="text" placeholder="City" required="" autocomplete="city">
        </div>
        <button type="submit" data-tid="elements_examples.form.pay_button">Order Item</button>
    </form>
    </div>
 @endsection

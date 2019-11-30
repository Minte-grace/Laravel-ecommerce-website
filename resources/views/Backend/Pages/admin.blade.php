@extends('Backend.Layouts.admin-app')
@section('content')
<div class="nav-side-menu">
    <div class="brand">Admin Dashboard</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      <div class="menu-list">
        <li>
            <a href="{{route('admin.orders')}}">
            <i class="fa fa-shopping-cart fa-lg"></i> Orders
            </a>
        </li>
        <li>
            <a href="{{route('admin.products')}}">
            <i class="fa fa-product-hunt fa-lg"></i> Products
            </a>
         </li>
        <li>
           <a href="{{route('admin.users')}}">
           <i class="fa fa-user fa-lg"></i> Users
          </a>
        </li>
        <li>
           <a href="{{route('admin.category')}}">
           <i class="fa fa-list-alt fa-lg"></i> Categories
           </a>
        </li>

     </div>
</div>
@endsection

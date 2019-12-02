@extends('Backend.Layouts.admin-app')
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
    <div class="container">
        <div class="jumbotron">
            <h2><b>Categories</b></h2>
        </div>
            <a href="{{route('add.category')}}" class="btn btn-primary"> Add New Category</a>
            <p>&nbsp</p>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('category.delete',$category->id)}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
@endsection

<head>
    <title>Categories</title>
</head>
@extends('layouts.admin-app')
@section('content')


    <div class="container" style="margin-top: 10px;">
        <div class="jumbotron" style="height: 50px;">
            <h2><b>Categories</b></h2>

        </div>
            <a href="{{route('add.category')}}" class="btn btn-primary"> Add New Category</a>
            <table class="table" style="margin-top: 20px;">
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
                            <a href="{{route('category.delete',$category->id)}}"><button type="button" class="btn btn-danger" style="background-color:indianred; color:white; width:60px;">Delete</button></a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>

    </div>

@endsection

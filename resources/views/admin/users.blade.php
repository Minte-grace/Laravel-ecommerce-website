@extends('layouts.admin-app')
@section('content')

    <div class="container" style="margin-top: 10px;">
        <div class="jumbotron" style="height: 70px;">
            <h2><b>Users</b></h2>

        </div>
            <a href="{{route('add-user')}}" class="btn btn-primary"> Add New User</a>
            <table class="table" style="margin-top: 50px;">
                <thead class="thead-light">
                <tr>
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><button type="button" class="btn btn-outline-info" style="background-color: #227dc7; color: white; width:100px;">Edit</button>
                            <button type="button" class="btn btn-danger" style="background-color:indianred; color:white; width:100px;">Delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>

@endsection

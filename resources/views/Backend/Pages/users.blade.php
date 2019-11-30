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
                    <td>
                    <a href="{{route('user.edit',$user->id)}}"><button type="button" class="btn btn-outline-info" style="background-color: #227dc7; color: white; width:100px;">Edit</button></a>
                    <a href="{{route('user.delete',$user->id)}}"><button type="button" class="btn btn-danger" style="background-color:indianred; color:white; width:100px;">Delete</button></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
@endsection

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
          <div class="row justify-content-center">
             <div class="col-md-8">
                <div class="card">
                   <div class="card-header"><b>{{ __('Add new Category') }}</b></div>
                     <div class="card-body">
                        <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                                <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Category_slug') }}</label>
                                    <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('name') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                                     @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




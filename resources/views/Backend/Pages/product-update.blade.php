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
                    <div class="card-header"><b>{{ __('Edit product') }}</b></div>

                    <div class="card-body">
                        <form action="{{ route('product.update', $products->id) }}" method="post" enctype="multipart/form-data">
                              {{Form::hidden('_method','PUT')}}
                              @csrf
                              <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                              <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $products->name }}" required autocomplete="name" autofocus>
                                   @error('name')
                                   <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                              </div>
                              </div>
                              <div class="form-group row">
                              <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                              <div class="col-md-6">
                                   <select class="form-control" id="slug" name="slug">
                                    @foreach($categories as $category)
                                        <option>{{$category->name}}</option>
                                    @endforeach
                                   </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Detail') }}</label>
                                <div class="col-md-6">
                                    <input id="details" type="text" class="form-control @error('name') is-invalid @enderror" name="details" value="{{ $products->details }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                                  <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('name') is-invalid @enderror" name="price" value="{{ $products->price }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
\                                   <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ $products->description }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Stoke Quantity') }}</label>
                                    <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control @error('name') is-invalid @enderror" name="quantity" value="{{ $products->quantity }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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




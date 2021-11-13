@extends('layouts.nav')
@section('content')

    @if ($errors->count() > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container"> 
        <div class="card-body">
            <h1>Productos</h1> 
            <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del producto') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}"  autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
                    <div class="col-md-6">
                        <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}"  autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('category_id') }}</label>
                    <div class="col-md-6">
                        <select name="category_id" id="category_id">
                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                           @foreach ($categories as $category)                                        
                           <option value="{{$category->id}}">{{$category->name}}</option>                                    
                           @endforeach 
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>  
@endsection
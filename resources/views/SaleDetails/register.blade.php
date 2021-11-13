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
            <h1>Crear venta</h1> 
            <form method="POST" action="{{ route('saleDetail.create', $sale->id) }}" enctype="multipart/form-data">
                @csrf
                 {{-- cantidad  --}}
                <div class="form-group row">
                    <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                    <div class="col-md-6">
                        <input id="amount" type="number"  class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount')}}">
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('product_id') }}</label>
                    <div class="col-md-6">
                        <select name="product_id" id="product_id">
                            <option value="">--selecciona el Producto--</option>
                           @foreach ($products as $product)                                        
                           <option value="{{$product->id}}">{{$product->name}}</option>                                    
                           @endforeach 
                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="sale_id" value="{{$sale->id}}">
                {{-- <input type="hidden" name="person_id" value="{{$person->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}}
                <br><br>
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
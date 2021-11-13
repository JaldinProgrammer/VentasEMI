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
            <h1>Registrar compra de producto</h1> 
            <form method="POST" action="{{ route('productSupplier.create') }}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="form-group row">
                    <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('Costo de producto') }}</label>
                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}"  autofocus>
                        @error('cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad de producto') }}</label>
                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}"  autofocus>
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="supplier_id" class="col-md-4 col-form-label text-md-right">{{ __('Proveedores') }}</label>
                    <div class="col-md-6">
                        <select name="supplier_id" id="supplier_id">
                            <option value="{{ old('supplier_id') }}">--selecciona al proveedor--</option>
                           @foreach ($suppliers as $supplier)                                        
                           <option value="{{$supplier->id}}">{{$supplier->name}}</option>                                    
                           @endforeach 
                        </select>
                        @error('supplier_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <input type="hidden" name="product_id" value="{{$product->id}}">
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
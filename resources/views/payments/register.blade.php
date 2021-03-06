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
            <h1>Pagos</h1> 
            <form method="POST" action="{{ route('payment.create') }}" enctype="multipart/form-data">
                @csrf
                <br>                    
                <div class="form-group row">
                    <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('total') }}</label>
                    <div class="col-md-6">
                        <input id="price" type="total" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ $sale->dedt }}"  autofocus>
                        @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="payment__type_id" class="col-md-4 col-form-label text-md-right">{{ __('payment__type_id') }}</label>
                    <div class="col-md-6">
                        <select name="payment__type_id" id="category_id">
                            <option value="{{ old('payment__type_id') }}">--selecciona la categoria--</option>
                           @foreach ($payment_types as $payment_type)                                        
                           <option value="{{$payment_type->id}}">{{$payment_type->name}}</option>                                    
                           @endforeach 
                        </select>
                        @error('payment__type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>
                <input type="hidden" name="sale_id" value="{{$sale->id}}">
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
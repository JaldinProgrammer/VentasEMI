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
            <form method="POST" action="{{ route('sale.create', $person->id) }}" enctype="multipart/form-data">
                @csrf
                 {{-- fecha  --}}
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de la venta') }}</label>
                    <div class="col-md-6">
                        <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}">
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="person_id" value="{{$person->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
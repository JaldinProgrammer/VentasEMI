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
  <br>
    <div class="container">
      <h1>Login</h1>
      <form method="POST" action="{{ route('log-in')}}">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
            <input placeholder="CadeteAdmin" value="{{old('username')}}" class="form-control" type="text" name="username" id="username">
            @error('username')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input placeholder="password" class="form-control" type="password" name="password" id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
              <label class="form-check-label" for="exampleCheck1">Recuerda mi sesion</label>
          </div> --}}
          <button type="submit" class="btn btn-warning">Log-In</button>
      </form>
    </div>
@endsection
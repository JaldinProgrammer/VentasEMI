@extends('layouts.nav')
@section('content')
    <br>
        <div class="container">
            <div class="card-body">     
                
                    <ul class="list-group list-group-flush "> 
                        <li class="list-group-item" style="text-align: center">
                            @if ($person[0]->gender)
                            <img src="{{asset('./Icons/woman.png')}}" alt="woman" width="70" height="70">
                            @else
                            <img src="{{asset('./Icons/soldier.png')}}" alt="soldier"  width="70" height="70">
                            @endif
                        </li>
                        <li class="list-group-item" style="text-align: center">{{"Nombre: ".$person[0]->name}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Usuario: ".Auth::user()->username}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Telefono: ".$person[0]->phone}}</li>
                        <li class="list-group-item" style="text-align: center">{{"Email: ".$person[0]->email}}</li>
                        @can('admin')
                        <li class="list-group-item" style="text-align: center">ADMINISTRADOR</li>
                        @endcan
                        @can('salesman')
                        <li class="list-group-item" style="text-align: center">VENDEDOR</li>
                        @endcan
                        {{-- <li class="list-group-item" style="text-align: center"><a href= {{route('user.perfil.locations',Auth::user()->id ) }} ><button type="button" class="btn btn-success btn-lg btn-block">Mis direcciones</button></a></li> --}}
                    </ul>
            </div>
        </div>                
    <br>
@endsection
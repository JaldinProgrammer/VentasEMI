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
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>Personas</h2></li>
            <li class="list-group-item"> <a href=" #" ><button type="button" class="btn btn-success btn-lg btn-block">Nueva persona</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>email</th>
                  <th>NIT</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{($user->email!=null)?$user->email:"---"}}</td>
                        <td>{{$user->nit}}</td>              
                        <td>
                            <a href="#"><button type="button" class="btn btn-warning">Crear venta</button></a>
                            <a href="#"><button type="button" class="btn btn-warning">Crear cuenta</button></a>
                            <a href="#"><button type="button" class="btn btn-warning">Editar</button></a>
                            <a href="#"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar esta especie?')">Borrar</button></a>                 
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$users->links()}}</div>
        </div>
        
    </div>
@endsection
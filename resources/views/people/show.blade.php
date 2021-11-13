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
            <li class="list-group-item"><h2>Clientes</h2></li>
            <li class="list-group-item"> <a href="{{route('people.register')}}" ><button type="button" class="btn btn-success btn-lg btn-block">Nueva persona</button></a></li>
            <li class="list-group-item"> <a href="{{route('people.showDeleted')}}" ><button type="button" class="btn btn-danger btn-sm btn-block">Mostrar usuarios borrados</button></a></li>
            <li class="list-group-item"> <a href="{{route('people.show')}}" ><button type="button" class="btn btn-info btn-sm btn-block">Mostrar usuarios activos</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Sexo</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>email</th>
                  <th>NIT</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                        <td>
                            @if ($user->gender)
                            <img src="{{asset('./Icons/woman.png')}}" alt="woman" width="40" height="40">
                            @else
                            <img src="{{asset('./Icons/soldier.png')}}" alt="soldier"  width="40" height="40">
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{($user->email!=null)?$user->email:"---"}}</td>
                        <td>{{($user->nit!=null)?$user->nit:"---"}}</td>             
                        <td>
                            <a href="{{route('sale.create',$user->id)}}"><button type="button" class="btn btn-success">Crear compra</button></a>
                            <a href="{{route('sale.show',$user->id)}}"><button type="button" class="btn btn-warning">Facturas</button></a>
                            <a href="{{route('user.register',$user->id)}}"><button type="button" class="btn btn-warning">Crear cuenta</button></a>
                            <a href="{{route('people.edit',$user->id)}}"><button type="button" class="btn btn-warning">Editar</button></a>
                            @if ($user->status)
                            <a href="{{route('people.delete',$user->id)}}"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar a esta persona?')">Borrar</button></a>   
                            @else
                            <a href="{{route('people.restore',$user->id)}}"><button type="button" class="btn btn-success" onclick="return confirm('Seguro que quiere restaurar a esta persona?')">Restaurar</button></a>   
                            @endif        
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
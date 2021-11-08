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
            <li class="list-group-item"><h2>Cuentas de usuario</h2></li>
            <li class="list-group-item"> <a href="{{route('user.showDeleted')}}" ><button type="button" class="btn btn-danger btn-sm btn-block">Mostrar cuentas Innactivas</button></a></li>
            <li class="list-group-item"> <a href="{{route('user.show')}}" ><button type="button" class="btn btn-info btn-sm btn-block">Mostrar usuarios activos</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Username</th>
                  <th>Nombre</th>
                  <th>email</th>
                  <th>NIT</th>
                  <th>role</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->person->name}}</td>
                        <td>{{($user->person->email!=null)?$user->person->email:"---"}}</td>
                        <td>{{($user->person->nit!=null)?$user->person->nit:"---"}}</td>      
                        <td>{{$user->role->name}}</td>       
                        <td>
                            @if ($user->status)
                            <a href="{{route('user.delete',$user->id)}}"><button type="button" class="btn btn-danger" onclick="return confirm('Seguro que quiere borrar a esta persona?')">Borrar</button></a>   
                            @else
                            <a href="{{route('user.restore',$user->id)}}"><button type="button" class="btn btn-success" onclick="return confirm('Seguro que quiere restaurar a esta persona?')">Restaurar</button></a>   
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
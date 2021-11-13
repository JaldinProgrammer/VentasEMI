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
            <li class="list-group-item"><h2>Proveedores</h2></li>
            <li class="list-group-item"> <a href="{{route('supplier.register')}}" ><button type="button" class="btn btn-info btn-sm btn-block">Registrar proveedor</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>CREADO</th>
                  <th>ACTUALIZADO</th>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                   <tr>
                        <td>{{$supplier->id}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{($supplier->created_at!=null)?$supplier->created_at->diffForHumans():"----"}}</td>
                        <td>{{($supplier->updated_at!=null)?$supplier->updated_at->diffForHumans():"----"}}</td>  
                        <td>
                            <a href="{{route('supplier.edit',$supplier->id)}}"><button type="button" class="btn btn-info">Editar</button></a>   
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$suppliers->links()}}</div>
        </div>
        
    </div>
@endsection
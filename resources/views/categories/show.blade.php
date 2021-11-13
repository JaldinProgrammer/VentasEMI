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
            <li class="list-group-item"><h2>Categoria</h2></li>
            <li class="list-group-item"> <a href="{{route('category.register')}}" ><button type="button" class="btn btn-success btn-sm btn-block">Registrar categoria</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>id</th>
                  <th>Nombre</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                   <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>   
                        <td>
                            <a href="{{route('category.edit',$category->id)}}"><button type="button" class="btn btn-dark">Editar Categoria</button></a>   
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$categories->links()}}</div>
        </div>
    </div>
@endsection
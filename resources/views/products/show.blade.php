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
            <li class="list-group-item"><h2>Productos</h2></li>
            <li class="list-group-item"> <a href="{{route('supplier.register')}}" ><button type="button" class="btn btn-info btn-sm btn-block">Registrar proveedor</button></a></li>
            <li class="list-group-item"> <a href="{{route('product.register')}}" ><button type="button" class="btn btn-success btn-sm btn-block">Registrar producto</button></a></li>
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>stock</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                   <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>  
                        <td>{{$product->price." Bs."}}</td> 
                        <td>{{$product->stock}}</td>
                        <td>
                            <a href="{{route('product.edit',$product->id)}}"><button type="button" class="btn btn-dark">Editar</button></a>   
                            <a href="{{route('productSupplier.register',$product->id)}}"><button type="button" class="btn btn-success">Comprar</button></a>   
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$products->links()}}</div>
        </div>
        
    </div>
@endsection
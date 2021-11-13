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
            <li class="list-group-item"><h2>Ventas</h2></li>
            {{-- <li class="list-group-item"> <a href="{{route('sale.register')}}" ><button type="button" class="btn btn-info btn-sm btn-block">Registrar proveedor</button></a></li> --}}
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Id</th>
                  <th>Costo</th>
                  <th>Total</th>
                  <th>Cantidad</th>
                  <th>producto</th>
                  <th>proveedor</th>
                  <th>fecha</th>
            </thead>
            <tbody>
                @foreach ($productSuppliers as $productSupplier)
                   <tr>
                        <td>{{$productSupplier->id}}</td>
                        <td>{{$productSupplier->cost." Bs."}}</td>  
                        <td>{{$productSupplier->total." Bs."}}</td>  
                        <td>{{$productSupplier->amount}}</td>  
                        <td>{{$productSupplier->product->name}}</td>  
                        <td>{{$productSupplier->supplier->name}}</td>   
                        <td>{{($productSupplier->created_at!=null)?$productSupplier->created_at->toFormattedDateString():"----"}}</td>
                        <td>
                            {{-- <a href="{{route('productSupplier.edit',$productSupplier->id)}}"><button type="button" class="btn btn-info">Editar</button></a>   --}}
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$productSuppliers->links()}}</div>
        </div>
        
    </div>
@endsection
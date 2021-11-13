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
                  <th>Date</th>
                  <th>Debito</th>
                  <th>Nit</th>
                  <th>Impuesto</th>
                  <th>Total</th>
                  <th>Total antes del impuesto</th>
                  <th>Vendedor</th>
                  <th>Cliente</th>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                   <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->date->toFormattedDateString()}}</td>  
                        <td>{{($sale->dedt != 0)?$sale->dedt." Bs.":"debito saldado"}}</td>  
                        <td>{{$sale->nit}}</td>  
                        <td>{{$sale->tax." %"}}</td>  
                        <td>{{$sale->total." Bs."}}</td>  
                        <td>{{$sale->totalBeforeTax." Bs."}}</td> 
                        <td>{{$sale->user->username}}</td> 
                        <td>{{$sale->person->name}}</td>  
                        <td>
                            <a href="{{route('saleDetail.register',$sale->id)}}"><button type="button" class="btn btn-success">Añadir producto</button></a> 
                            <a href="{{route('saleDetail.show',$sale->id)}}"><button type="button" class="btn btn-info">Detalles</button></a>  
                            <a href="{{route('payment.show',$sale->id)}}"><button type="button" class="btn btn-warning">Pagos</button></a>  
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$sales->links()}}</div>
        </div>
        
    </div>
@endsection
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
            @if ($details[0]!=null)
            <li class="list-group-item"> <a href="{{route('saleDetail.register',$details[0]->sale->id)}}" ><button type="button" class="btn btn-info btn-sm btn-block">Registrar nuevo detalle de venta</button></a></li>
            <li class="list-group-item"><a href="{{route('sale.show',$details[0]->sale->person->id)}}"><button type="button" class="btn btn-primary">Volver a facturas</button></a>  </li>
            @php
                $details[0]->sale->load("person");
                $details[0]->sale->load("user");
            @endphp
                <div class="container">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Fecha : </b> {{$details[0]->sale->date->toFormattedDateString()}}</li>
                        <li class="list-group-item"><b>Debito : </b> {{$details[0]->sale->dedt}}</li>
                        <li class="list-group-item"><b>Total : </b> {{$details[0]->sale->total}}</li>
                        <li class="list-group-item"><b>Total antes del impuesto : </b> {{$details[0]->sale->totalBeforeTax}}</li>
                        <li class="list-group-item"><b>Debito : </b> {{$details[0]->sale->tax}}</li>
                        <li class="list-group-item"><b>Cliente : </b> {{$details[0]->sale->person->name}}</li>
                        <li class="list-group-item"><b>Vendedor : </b> {{$details[0]->sale->user->username}}</li>
                        <li class="list-group-item"><b>NIT : </b> {{($details[0]->sale->nit!= null)?$details[0]->sale->nit: "----"}}</li>
                    </ul>
                </div>
            @endif
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Producto</th>
                  <th>cantidad</th>
                  <th>Total</th>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                   <tr>
                        <td>{{$detail->product->name}}</td>
                        <td>{{$detail->amount}}</td>  
                        <td>{{$detail->total}}</td>  
                        <td>
                            <a href="{{route('saleDetail.edit',$detail->id)}}"><button type="button" class="btn btn-success">Editar</button></a>   
                        </td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$details->links()}}</div>
        </div>
    </div>
@endsection
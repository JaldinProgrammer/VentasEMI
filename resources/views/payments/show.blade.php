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
            <li class="list-group-item"><h2>Pagos</h2></li>
            <li class="list-group-item"><h5><b>Debito: </b>{{$sale->dedt." bs"}}</h5></li>
            <li class="list-group-item"><h5><b>Total: </b>{{$sale->total." bs"}}</h5></li>
            <li class="list-group-item"><h5><b>Total sin el impuesto: </b>{{$sale->totalBeforeTax." bs"}}</h5></li>
            @if ($sale->dedt != 0)
            <li class="list-group-item"> <a href="{{route('payment.register', $sale->id)}}" ><button type="button" class="btn btn-info btn-sm btn-block">Registrar pago</button></a></li>
            @endif
        </ul>
        <br>
        <table class="table table-striped">
            <thead>
                  <th>Id</th>
                  <th>Fecha</th>
                  <th>Total de pago</th>
                  <th>Tipo de Pago</th>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                   <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->date}}</td>  
                        <td>{{$payment->total." Bs."}}</td>  
                        <td>{{$payment->payment_type->name}}</td>  
                        {{-- <td>
                            <a href="{{route('saleDetail.register',$sale->id)}}"><button type="button" class="btn btn-success">Añadir producto</button></a> 
                            <a href="{{route('saleDetail.show',$sale->id)}}"><button type="button" class="btn btn-info">Detalles</button></a>  
                            <a href="{{route('payment.show',$sale->id)}}"><button type="button" class="btn btn-warning">Pagos</button></a>  
                        </td> --}}
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="table table-striped">{{$payments->links()}}</div>
        </div>
        
    </div>
@endsection
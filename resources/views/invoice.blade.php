<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/escudo.jpg')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
 <style>
  #pac{
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100;
      align-content: center;
  }
  #pac td, #pac th {
      border:1px solid #ddd;
      padding: 8px;
  }
  #pac th{
   padding-top:12px;
   padding-bottom:12px;
   text-align: center;
   background-color:#4CAF50;
   color: #fff;
  }
 </style>
    
</head>
<body>
    <div class="container">
        {{-- <img src="{{asset('./Icons/woman.png')}}" alt="woman" width="40" height="40"> --}}
        <h2>Factura EMI-MARKET</h2>
        <div class="container">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Fecha : </b> {{$details[0]->sale->date->toFormattedDateString()}}</li>
                <li class="list-group-item"><b>Debito : </b> {{$details[0]->sale->dedt." BS"}}</li>
                <li class="list-group-item"><b>Total : </b> {{$details[0]->sale->total." BS"}}</li>
                <li class="list-group-item"><b>Total antes del impuesto : </b> {{$details[0]->sale->totalBeforeTax." BS"}}</li>
                <li class="list-group-item"><b>Impuesto : </b> {{$details[0]->sale->tax. " %"}}</li>
                <li class="list-group-item"><b>Cliente : </b> {{$details[0]->sale->person->name}}</li>
                <li class="list-group-item"><b>Vendedor : </b> {{$details[0]->sale->user->username}}</li>
                <li class="list-group-item"><b>NIT : </b> {{($details[0]->sale->nit!= null)?$details[0]->sale->nit: "----"}}</li>
            </ul>
        </div>
        <table  class="table table-striped table-bordered shadow-lg mt-4"  id="pac">
            <thead>
            <tr>
                <th scope="col">producto</th>
                <th scope="col">cantidad</th>
                <th scope="col">total</th>   
            </tr>  
            </thead>
            <tbody>
            @foreach ($details as $detail)
            <tr>
                <td>{{$detail->product->name}}</td>
                <td>{{$detail->amount}}</td>
                <td>{{$detail->total}}</td>
            </tr>
            @endforeach
           </tbody>
      </table>
    </div>
</body>
</html>
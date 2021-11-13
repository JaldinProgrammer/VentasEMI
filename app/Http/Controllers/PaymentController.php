<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payment_Type;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PaymentController extends Controller
{
    public function show($id){
        $sale = Sale::findOrFail($id);
        $payments = Payment::where('sale_id', $sale->id)->paginate(5);
        $payments->load('sale');
        $payments->load('payment_Type');
        return view('payments.show', compact('payments'), compact('sale'));
    }

    public function register($id){
        $payment_types = Payment_Type::all();
        $sale = Sale::findOrFail($id);
        return view('payments.register',compact('sale'), compact('payment_types'));
    }

    public function create(Request $request){
        $carbon = new Carbon('America/La_Paz');
        $credentials =   Request()->validate([
            'total' => ['required'],
            'sale_id' => ['required'],
            'payment__type_id' => ['required'],
        ]);
        
        $sale = Sale::findOrFail((int)$request['sale_id']);
        if($sale->dedt < (float)$request['total']){
            return back()->withErrors('sobrepasa el debito restante');
        }
        $sale->dedt = ($sale->dedt - (float)$request['total']);
        $sale->update();
       // dd($sale);
        Payment::create([
            'total' => $request['total'],
            'date' => $carbon->now(),
            'sale_id' => $request['sale_id'],
            'payment__type_id' => $request['payment__type_id'],
        ]);
        
        return redirect()->route('payment.show',$sale->id);
    }
}
 
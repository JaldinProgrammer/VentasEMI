<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payment_Type;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id){
        $sale = Sale::findOrFail($id);
        $payments = Payment::where('sale_id', $sale->id)->paginate(5);
        $payments->load('sale');
        $payments->load('payment_Type');
        return view('payments.show', compact('payments'));
    }

    public function register($id){
        $payment_types = Payment_Type::all();
        $sale = Sale::findOrFail($id);
        return view('payments.register',compact('sale'), compact('payment_types'));
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'total' => ['required'],
            'date' => ['required'],
            'sales_id' => ['required'],
            'payment_type_id' => ['required'],
        ]);
        $sale = Sale::findOrFail($request['sales_id']);
        $sale->dedt = $sale->dedt - $request['total'];
        $sale->update();
        Payment::create([
            'total' => $request['total'],
            'date' => $request['date'],
            'sales_id' => $request['sales_id'],
            'payment_type_id' => $request['payment_type_id'],
        ]);
        return redirect()->route('payments.show',$sale->id);
    }
}
 
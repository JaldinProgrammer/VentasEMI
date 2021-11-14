<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Sale_Detail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceController extends Controller
{
    public function exports($id){
        $sale = Sale::findOrFail($id);
        $details = Sale_Detail::where('sale_id', $sale->id)->get();
        $details->load('product');
        $details->load('sale');
        $pdf= PDF::loadview('invoice', compact('details'), compact('sale'));
        return $pdf->stream('factura.pdf');
       // return view('invoice', compact('details'), compact('sale'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_Detail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function show($id){
        $sale = Sale::findOrFail($id);
        $details = Sale_Detail::where('sale_id', $sale->id)->paginate(5);
        $details->load('product');
        $details->load('sale');
        $products = Product::where('stock','>=','0')->get();
        return view('salesDetails.show', compact('details'), compact('products'));
    }

    public function register($id){
       // $sale = Sale::findOrFail($id);
        //return view('salesDetails.register',compact('sale'));
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'amount' => ['required'],
            'sale_id' => ['required'],
            'product_id' => ['required'],
        ]);

        $product = Product::findOrFail($request['product_id']);
        if($product->stock < $request['amount']){
            return back()->withErrors('No hay suficiente en el stock del producto como para satisfacer la demanda');
        }
        $sale = Sale::findOrFail($request['sale_id']);
        $totalProduct = $product->price * $request['amount'];
        $sale->total+= ($totalProduct*$sale->tax) + $totalProduct;
        $sale->totalBeforeTax+= $totalProduct;
        $sale->dedt += ($totalProduct*$sale->tax) + $totalProduct;

        Sale_Detail::create([
            'amount' => $request['amount'],
            'sale_id' => $request['sale_id'],
            'product_id' => $request['product_id'],
            'total' => $totalProduct
        ]);
        $details = Sale_Detail::where('sale_id', $request['sale_id'])->paginate(5);
        $products = Product::where('stock','>=','0')->get();
        return view('salesDetails.show', compact('details'), compact('products'));
    }
}

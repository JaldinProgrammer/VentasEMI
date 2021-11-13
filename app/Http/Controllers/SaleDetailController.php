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
        return view('saleDetails.show', compact('details'));
    }

    public function register($id){
        $sale = Sale::findOrFail($id);
        $saleDetail = Sale_Detail::select('product_id')->where('sale_id', $sale->id)->get();
        $products = Product::where('stock','>','0')->get();
        if($saleDetail != null){
            $products = Product::whereNotIn('id',$saleDetail)->where('stock','>','0')->get();
        }
        return view('saleDetails.register',compact('products'), compact('sale'));
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
        $product->stock -= $request['amount'];
        $product->update();
        $sale = Sale::findOrFail($request['sale_id']);

        $totalProduct = $product->price * $request['amount'];
        $sale->total+= ($totalProduct*$sale->tax) + $totalProduct;
        $sale->totalBeforeTax+= $totalProduct;
        $sale->dedt += ($totalProduct*$sale->tax) + $totalProduct;
        $sale->update();
        Sale_Detail::create([
            'amount' => $request['amount'],
            'sale_id' => $request['sale_id'],
            'product_id' => $request['product_id'],
            'total' => $totalProduct
        ]);
        // $details = Sale_Detail::where('sale_id', $request['sale_id'])->paginate(5);
        // $products = Product::where('stock','>=','0')->get();
        return redirect()->route('saleDetail.show',$request['sale_id']);
    }

    public function edit($id){
        $saleDetail = Sale_Detail::findOrFail($id);
        $saleDetail->load('product');
        $saleDetail->load('sale');
        $products = Product::where('stock','>','0')->get();
        return view('saleDetails.edit', compact('saleDetail'), compact('products'));
    }

    public function update(Request $request, $id){
        $saleDetail = Sale_Detail::findOrFail($id);
        $sale = Sale::findOrFail($saleDetail->sale_id);
        $product = Product::findOrFail($saleDetail->product_id);

        $product->stock += $saleDetail->amount;
        $product->stock -= $request['amount'];
        $product->update();

        $sale->totalBeforeTax = $sale->totalBeforeTax - $saleDetail->total;
        $sale->dedt = $sale->dedt - (($saleDetail->total* $sale->tax)+$saleDetail->total);
        $sale->total = ($sale->totalBeforeTax * $sale->tax) + $sale->totalBeforeTax;
        $sale->update();

        $saleDetail->amount = $request['amount'];
        $saleDetail->total = $request['amount'] * $product->price;
        $saleDetail->update();

        $totalProduct = $product->price * $request['amount'];
        $sale->total+= ($totalProduct*$sale->tax) + $totalProduct;
        $sale->totalBeforeTax+= $totalProduct;
        $sale->dedt += ($totalProduct*$sale->tax) + $totalProduct;
        $saleDetail->load('product');
        $sale->update();
        return redirect()->route('saleDetail.show',$saleDetail->sale_id);
    }

}

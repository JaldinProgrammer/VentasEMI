<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;

class ProductSupplierController extends Controller
{
    public function show(){
        $products = ProductSupplier::paginate(5);
        $products->load('product');
        $products->load('supplier');
        return view('suppliers.show', compact('products'));
    }

    public function register(){
        return view('ProductSuppliers.register');
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'cost' => ['required'],
            'amount' => ['required'],
            'product_id' => ['required'],
            'supplier_id' => ['required']
        ]);
        $product = Product::findOrFail($request['product_id']);
        $product->amount+= $request['amount'];
        ProductSupplier::create([
            'cost' => $request['cost'],
            'total' => $request['cost'] * $request['amount'],
            'amount' => $request['amount'],
            'product_id' => $request['product_id'],
            'supplier_id' => $request['supplier_id'],
        ]);
        return redirect()->route('ProductSuppliers.show');
    }
    
    // public function edit($id){
    //     $product = ProductSupplier::findOrFail($id);
    //     return view('ProductSuppliers.edit', compact('product'));
    // }

    // public function update(Request $request, $id){
    //     $product = ProductSupplier::findOrFail($id);
    //     $product->name = $request['name'];
    //     $product->update();
    //     return redirect()->route('ProductSuppliers.show');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductSupplierController extends Controller
{
    public function show(){
        $productSuppliers = ProductSupplier::paginate(5);
        $productSuppliers->load('product');
        $productSuppliers->load('supplier');
        return view('productSuppliers.show', compact('productSuppliers'));
    }

    public function register($id){
        $product = Product::findOrFail($id);
        $suppliers = Supplier::all();
        return view('ProductSuppliers.register',compact('suppliers'), compact('product'));
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'cost' => ['required'],
            'amount' => ['required'],
            'product_id' => ['required'],
            'supplier_id' => ['required']
        ]);
        $product = Product::findOrFail($request['product_id']);
        $product->stock+= $request['amount'];
        $product->update();
        ProductSupplier::create([
            'cost' => $request['cost'],
            'total' => $request['cost'] * $request['amount'],
            'amount' => $request['amount'],
            'product_id' => $request['product_id'],
            'supplier_id' => $request['supplier_id'],
        ]);
        return redirect()->route('productSupplier.show');
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

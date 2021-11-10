<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function show(){
        $products = Product::paginate(5);
        return view('products.show', compact('products'));
    }

    public function register(){
        return view('products.register');
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'price' => ['required'],
            'name' => ['required', 'string'],
        ]);
        Product::create([
            'price' => $request['price'],
            'name' => $request['name']
        ]);
        return redirect()->route('products.show');
    }
    
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->name = $request['name'];
        $product->name = $request['price'];
        $product->update();
        return redirect()->route('products.show');
    }

}

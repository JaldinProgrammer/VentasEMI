<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function show(){
        $products = Product::orderby('id','desc')->paginate(5);
        return view('products.show', compact('products'));
    }

    public function register(){
        $categories = Category::all();
        return view('products.register',compact('categories'));
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'price' => ['required'],
            'name' => ['required', 'string'],
            'category_id' => ['required'],
        ]);
        //dd($request['category_id']);
        Product::create([
            'price' => $request['price'],
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'stock' => 0
        ]);
        return redirect()->route('product.show');
    }
    
    public function edit($id){
        $product = Product::findOrFail($id);
        $product->load('category');
        $categories = Category::all();
        return view('products.edit', compact('product'), compact('categories'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->name = $request['name'];
        $product->name = $request['price'];
        $product->update();
        return redirect()->route('product.show');
    }

}

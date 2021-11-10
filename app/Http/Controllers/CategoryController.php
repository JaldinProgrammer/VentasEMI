<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){
        $categories = Category::paginate(5);
        return view('categories.show', compact('categories'));
    }

    public function register(){
        return view('categories.register');
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'name' => ['required', 'string'],
        ]);
        Category::create([
            'name' => $request['name']
        ]);
        return redirect()->route('categories.show');
    }
    
    public function edit($id){
        $product = Category::findOrFail($id);
        return view('categories.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Category::findOrFail($id);
        $product->name = $request['name'];
        $product->update();
        return redirect()->route('categories.show');
    }
}

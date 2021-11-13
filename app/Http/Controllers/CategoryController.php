<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){
        $categories = Category::orderby('id', 'desc')->paginate(5);
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
        return redirect()->route('category.show');
    }
    
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request['name'];
        $category->update();
        return redirect()->route('category.show');
    }
}

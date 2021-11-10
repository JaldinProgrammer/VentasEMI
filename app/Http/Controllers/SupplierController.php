<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function show(){
        $suppliers = Supplier::paginate(5);
        return view('suppliers.show', compact('suppliers'));
    }

    public function register(){
        return view('suppliers.register');
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'name' => ['required', 'string'],
        ]);
        Supplier::create([
            'name' => $request['name']
        ]);
        return redirect()->route('suppliers.show');
    }
    
    public function edit($id){
        $product = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Supplier::findOrFail($id);
        $product->name = $request['name'];
        $product->update();
        return redirect()->route('suppliers.show');
    }
}

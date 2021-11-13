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
        return redirect()->route('supplier.show');
    }
    
    public function edit($id){
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id){
        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request['name'];
        $supplier->update();
        return redirect()->route('supplier.show');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function show($id){
        $person = Person::findOrFail($id);
        $sales = Sale::where('sale_id', $person->id)->paginate(5);
        $sales->load('user');
        $sales->load('person');
        return view('sales.show', compact('sales'));
    }

    public function register($id){
        $person = Person::findOrFail($id);
        return view('sales.register',compact('person'));
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'date' => ['required'],
            'user_id' => ['required'],
            'person_id' => ['required'],
        ]);
        
        Sale::create([
            'date' => $request['date'],
            'user_id' => $request['user_id'],
            'person_id' => $request['person_id'],
            'tax' => 0,
            'dedt' => 0,
            'total' => 0,
            'totalBeforeTax' => 0,
        ]);
        return redirect()->route('sales.show',$request['person_id']);
    }
}

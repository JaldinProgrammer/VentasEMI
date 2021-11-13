<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class SaleController extends Controller
{
    public function show($id){
        $person = Person::findOrFail($id);
        $sales = Sale::where('person_id', $person->id)->paginate(5);
        $sales->load('user');
        $sales->load('person');
        return view('sales.show', compact('sales'));
    }

    public function register($id){
        $person = Person::findOrFail($id);
        return view('sales.register',compact('person'));
    }

    public function create($id){
        $person = Person::findOrFail($id);
        $carbon = new Carbon('America/Caracas');
        Sale::create([
            'date' => $carbon->today(),
            'user_id' => Auth::user()->id,
            'person_id' => $id,
            'dedt' => 0,
            'total' => 0,
            'totalBeforeTax' => 0,
            'nit' => ($person->nit!=null)?$person->nit:null,
        ]);
        return redirect()->route('sale.show',$id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function perfil(){
        $user = User::findOrFail(Auth::user()->id);
        $person = Person::where('id',$user->person_id)->get();
        return view('dashboard',compact('person'));
    }

    public function people(){
        
        $users = Person::where('status',1)->orderby('id','desc')->paginate(5);
        return view('people.show',compact('users'));
    }

    public function register(){
        return view('people.register');
    }

    public function create(Request $request){
        $credentials =   Request()->validate([
            'phone' => ['string'],
            'name' => ['required', 'string'],
            'email' => ['email'], 
            'gender' => ['required'],
            'nit' =>  ['string'],
        ]);
        Person::create([
            'phone' => $request['phone'],
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'nit' => $request['nit'],
        ]);
        return redirect()->route('people.show');
    }

    public function edit($id){
        $user = Person::findOrFail($id);
        return view('people.edit',compact('user'));
    }

    public function update($id, Request $request){
        $user = Person::findOrFail($id);
        $credentials =   Request()->validate([
            'phone' => ['string'],
            'name' => ['required', 'string'],
            'gender' => ['required'],
            'nit' =>  ['string'],
            'email' => ['email'],     
        ]);
        //dd($request);
        $user->phone = $request->get('phone');
        $user->name = $request->get('name');
        $user->nit = $request->get('nit');
        $user->gender = $request->get('gender');
        $user->email = $request->get('email');
        $user->update();
        return redirect()->route('people.show');
    }

    public function delete($id){
        $user = Person::findOrFail($id);
        $user->status = 0;
        $user->update();
        return redirect()->route('people.show');
    }

    public function restore($id){
        $user = Person::findOrFail($id);
        $user->status = 1;
        $user->update();
        return redirect()->route('people.show');
    }

    public function showDeleted(){
        $users = Person::where('status',0)->orderby('id','desc')->paginate(3);
        return view('people.show',compact('users'));
    }
}

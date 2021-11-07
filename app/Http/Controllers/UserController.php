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
        
        $users = Person::paginate(3);
        return view('people.show',compact('users'));
    }
}

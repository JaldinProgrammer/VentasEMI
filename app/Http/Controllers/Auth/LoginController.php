<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Binnacle;
use App\Models\Person;
use App\Models\Role;
use Carbon\Carbon;
class LoginController extends Controller
{
    public function login()
    {
        $credentials =   Request()->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
         ]);
        $remember = request()->filled('remember');
         if(Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            // Binnacle::create([
            //     'entity' => Request('user'),
            //     'action' => "Se loggeo en",
            //     'table' => "El sistema",
            //     'user_id'=> Auth::user()->id
            // ]); 
            return redirect()->route('user.perfil');
         }
         throw ValidationException::withMessages([
            'user' => __('auth.failed')
         ]);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function show(){
        $users = User::where('status',1)->orderby('id','desc')->paginate(3);
        $users->load('person');
        $users->load('role');
        return view('users.show',compact('users'));
    }

    public function showDeleted(){
        $users = User::where('status',0)->orderby('id','desc')->paginate(3);
        $users->load('person');
        $users->load('role');
        return view('users.show',compact('users'));
    }

    public function register($id){
        $person = Person::findOrFail($id);
        $roles = Role::all();
        return view('users.registrer',compact('person'),compact('roles'));
    }

    public function create(){
        //dd(request());
        $name = User::where('username',request('username'))->get();
        //dd($name);
        if(sizeof($name)!=0 ){
            return back()->withErrors('Este nombre de usuario ya existe');
        }
        $credentials =   Request()->validate([
            'username' => ['required', 'string'],   
            'password' => ['required', 'string', 'confirmed'],
            'role_id' => ['required'],
        ]);
        User::create([
            'username' => request('username'),   
            'password' => Hash::make(request('password')),
            'person_id' => request('person_id'),
            'role_id' => request('role_id'),
        ]);
        return redirect()->route('user.show');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->update();
        return redirect()->route('user.show');
    }

    public function restore($id){
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->update();
        return redirect()->route('user.show');
    }
}

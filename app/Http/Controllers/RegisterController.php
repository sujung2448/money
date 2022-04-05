<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->all());
        $validation = $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'account' => 'required',
            'account_name' => 'required',
            'password' => 'required|confirmed',
            'code' => 'nullable',
        ]);    
        // dd($validation);
        $user = new User();
        $user -> name = $validation['name'];
        $user -> email = $validation['email'];
        $user -> bank = $validation['bank'];
        $user -> account = $validation['account'];
        $user -> account_name = $validation['account_name'];
        $user -> password = Hash::make($validation['password']);
        $user -> code = $validation['code'];
        $user -> save();
        
        return redirect() -> route('home');
    }
        
}
        

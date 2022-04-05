<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        $loginInfo = $request->only(['email', 'password']);
        if(auth()->attempt($loginInfo)){
            return redirect()->route('home');
        }
        else{
            return redirect()->route('auth.login.index');
        }
    }
    
    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
    
}

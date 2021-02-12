<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    function new(){
        return view('sessions.create');
    }
    function create(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum',
        ]);
        $user_session = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if(Auth::attempt($user_session)){
            if(Auth::user()->role == "Admin"){
                return redirect('/admin')->with('success', 'You are logged in');
            }
            return redirect('/')->with('success', 'You are logged in');
        }else{
            return back()->with('error', 'Wrong Credentials');
        }
    }

    function destroy(){
        Auth::logout();
        return redirect('/')->with('success', 'You are logged out');
    }
}

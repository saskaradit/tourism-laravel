<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function new(){
        return view('users.create');
    }

    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $new_user = new User();
        $new_user->name = $request->input('name');
        $new_user->email = $request->input('email');
        $new_user->phone = $request->input('phone');
        $new_user->password = Hash::make($request->input('password'));

        $new_user->save();

        $log_user = array(
            'email' => $new_user->get('email'),
            'password' => $new_user->get('password')
        );
        Auth::attempt($log_user);
        return redirect('/')->with('success', 'You are signed in');
    }

    public function usersArticle($userId){
        $user = User::find($userId);
        // dd($user->articles);
        return view('users.articles')->with('articles',$user->articles);
    }
}

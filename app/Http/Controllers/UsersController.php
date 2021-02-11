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

    public function index(){
        $user =auth()->user();
        return view('users.index')->with('user',$user);
    }

    public function show(){
        $users = User::orderBy('name','asc')->paginate(5);
        return view('admin.show')->with('users',$users);
    }

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','new','create']]);
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
            'email' => $new_user->email,
            'password' => $request->get('password')
        );
        // $log_user = array(
        //     'email' => 'rad@rad.com',
        //     'password' => 'rad'
        // );
        // dd($new_user->password);
        // dd(Auth::attempt($log_user));
        Auth::attempt($log_user);
        return redirect('/')->with('success', 'You are signed in');
    }

    public function edit($userId){
        $user = User::find($userId);
        // Check User or Admin
        if(auth()->user()->id != $user->id ){
            return redirect('/')->with('error', 'Unauthorized');
        }
        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $new_user = Auth::user();
        $new_user->name = $request->input('name');
        $new_user->email = $request->input('email');
        $new_user->phone = $request->input('phone');
        $new_user->password = Hash::make($request->input('password'));

        $new_user->save();
        return redirect('/')->with('success', 'Profile Updated');
    }

    public function usersArticle($userId){
        $user = User::find($userId);
        // dd($user->articles);
        return view('users.articles')->with('articles',$user->articles);
    }

    public function adminIndex(){
        if(auth()->user()->role != 'Admin'){
            return redirect('/articles')->with('error', 'Unauthorized');
        }else{
            return view('admin.index');
        }
    }

    public function destroy($userId){
        $user = User::find($userId);
        // dd($user);
        $user->delete();
        return redirect('/admin')->with('success', 'Deleted Users');
    }
}

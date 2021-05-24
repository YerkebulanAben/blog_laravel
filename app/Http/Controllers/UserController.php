<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Регистрация прошла успешно');
    }

    public function loginForm(){
        return view('user.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            if(Auth::user()->is_admin){
                return redirect()->route('admin.index')->with('success', 'Вы вошли в своб учетную запись');;
            } else {
                return redirect()->route('home')->with('success', 'Вы вошли в своб учетную запись');
            }
        }

        return redirect()->back()->with('error', 'Неправильный логин или пароль');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.loginForm');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view("auth.register");
    }

    public function register (Request $request) {
       $field = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $user = User::create($field);
        Auth::login($user);
        return redirect("/");
    }

    public function showLoginForm() {
        return view("auth.login");
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->has('remember');
        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request){
        Auth::logout($request);
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}

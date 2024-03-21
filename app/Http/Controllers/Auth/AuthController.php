<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function newSingup(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'email|required|min:4',
            'tele' => 'regex:/^\+?[0-9]{10,13}$/',
            'password' => 'required|min:6|max:16|confirmed',
        ]);
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->tel = $request->tele;
        $this->user->password = $request->password;
        $this->user->save();
        $request->session()->put('user_name', $this->user->name);
        return redirect('/index')->with('signup', 'Welcom,');
    }
    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['email', 'required', 'min:4'],
            'password' => ['required', 'max:16', 'min:6'],
        ]);
        $user = User::where('email', $attributes['email'])->first();

        if ($user && Hash::check($attributes['password'], $user->password)) {
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_role', $user->role);
            return redirect('/index')->with('success', 'Login successful');
        } else {
            return back()->withErrors(['email' => 'the email or password could not be verified']);
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    # Handl forgot the password

    public function forgotPass(Request $request)
    {
        $request->validate([
            'email' => 'required|email|min:4'
        ]);
    }
}
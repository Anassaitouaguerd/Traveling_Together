<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back_office\Users\AddUserRequest;
use App\Http\Requests\Back_office\Users\LoginUserRequest;
use App\Http\Requests\PasswordRequest;
use App\Mail\ForgetPass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function newSingup(AddUserRequest $request)
    {
        // dd($request);
        $user = User::create($request->validated());
        $request->session()->put('user_name', $user->name);
        return redirect('/index')->with('signup', 'Welcom,');
    }
    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->remember_token = Str::random(45);
            $user->save();
            Mail::to($user)->send(new ForgetPass($user));
            return back()->with('success', 'Checke your Email');
        }
        return back()->with('errore', "this account is not found ");
    }
    public function resetPage($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            return view('Front-office.Forgot-password.reset');
        }
        return abort(404);
    }
    public function resetPassword(PasswordRequest $request, $token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            $user->remember_token = Str::random(45);
            $user->password = $request->password;
            $user->save();
            return redirect('/login')->with('success', 'Your Password is changed successful');
        }
        return back()->with('errore', 'the user is not found');
    }
}

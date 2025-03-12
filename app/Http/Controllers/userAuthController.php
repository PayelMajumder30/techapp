<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class userAuthController extends Controller
{
    //

    public function showRegistrationForm(){
        return view('auth.user-register');
    }

    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    
        // Create user
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'type' => 0, // Normal user
        ]);
    
        // Log the user in after registration
        //Auth::login($user);
    
        // Redirect to home page
        return redirect()->route('user.login')->with('message', 'Registration successful. Welcome!');
    }
    

    public function showLoginForm(){
        return view('auth.user-login');
    }

    public function login(Request $request)
        {
            $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            ]);
           
            if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home');
            }
           
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}

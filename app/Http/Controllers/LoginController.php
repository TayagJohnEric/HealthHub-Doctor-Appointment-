<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //For Doctor Login
    public function loginForm(){
       return view('doctor_login');

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the doctor
        if (Auth::guard('doctor')->attempt($credentials)) {
            // Authentication passed, redirect to the dashboard
            return redirect()->route('doctor.dashboard');
        }
    
        // If authentication fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('doctor')->logout(); // Log out the doctor
    
        // Invalidate the session and regenerate token
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    
        // Clear all session data manually
       // session()->flush(); 
    
        // Redirect to login with a success message
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
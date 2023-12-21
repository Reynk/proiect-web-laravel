<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
           
            $user = Auth::user();
            // dd($user);
            if ($user->is_admin) {
                return redirect()->intended('adminPage');
            } else {
                return redirect()->intended('tickets');
            }
        }
    
        // Authentication failed
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
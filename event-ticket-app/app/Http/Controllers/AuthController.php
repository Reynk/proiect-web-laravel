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
        $credentials = $request->only('username', 'password', 'is_admin');
                    // dd($credentials);
// dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            session()->save();
            // dd(session()->all());
            $user = Auth::user();
            // dd($user);
            if (Auth::check() && $user->is_admin) {
                // dd($user);
                return redirect()->intended('adminPage');
            } else {
                            // dd($user);

                return redirect()->intended('tickets');
            }
        }
    
        // Authentication failed...
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontrol extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function display()
    {
        return view('login');
    }

    public function checking(Request $request)
    {
        // 1. Validate the incoming form fields
        $request->validate([
            'position' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        // 2. Find the user by position and name
        $user = User::where('position', $request->position)
                    ->where('name', $request->name)
                    ->first();

        // 3. Verify password (Request password FIRST, database password hash SECOND)
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // 4. Role-based redirection using correct syntax ->intended()
            if ($user->position === 'chef') {
                return redirect()->intended('/dashboard/kitchen');
            } elseif ($user->position === 'waiter') {
                return redirect()->intended('/dashboard/order');
            } elseif ($user->position === 'accountant') {
                return redirect()->intended('/dashboard/finance');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        // 5. Unified error message if login fails
        return back()->withErrors([
            'credentials' => 'Wrong name, position, or password',
        ])->onlyInput('name', 'position');
    }
}
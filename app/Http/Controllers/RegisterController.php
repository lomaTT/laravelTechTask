<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request) {
        if (Auth::guard('user')->check()) {
            return redirect(route('user.private'));
        }

        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Email already registered!'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            Auth::guard('user')->login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Cannot save user!'
        ]);
    }
}

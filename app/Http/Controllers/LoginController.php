<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        if (Auth::guard('user')->check()) {
            return redirect()->intended(route('user.private'));
        }

        $formFields = $request->only(['email', 'password']);

        if (Auth::guard('user')->attempt($formFields)) {
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Can not authorize'
        ]);
    }
}

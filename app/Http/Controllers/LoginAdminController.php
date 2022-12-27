<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAdminController extends Controller
{
    public function login(Request $request) {
        if (Auth::guard('admin')->check()) {
            return Redirect::to(route('admin.adminPrivate'));
        }

        $formFields = $request->only(['username', 'password']);

        if (Auth::guard('admin')->attempt($formFields)) {
            return Redirect::to(route('admin.adminPrivate'));
        }

        return redirect(route('admin.login'))->withErrors([
            'username' => 'Can not authorize'
        ]);
    }
}

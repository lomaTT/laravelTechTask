<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterAdminController extends Controller
{
    public function save(Request $request) {
        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.adminPrivate'));
        }

        $validateFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Admin::where('username', $validateFields['username'])->exists()) {
            return redirect(route('admin.registration'))->withErrors([
                'username' => 'Username already registered!'
            ]);
        }

        $admin = Admin::create($validateFields);
        if ($admin) {
            Auth::guard('admin')->login($admin);
            return redirect(route('admin.adminPrivate'));
        }
        return redirect(route('admin.login'))->withErrors([
            'formError' => 'Cannot save admin!'
        ]);
    }
}

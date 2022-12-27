<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');

Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth:user')->name('private');

//    Route::get('/private', function () {
//       if (Auth::guard('user')->check()) {
//           return redirect(route('user.private'));
//       }
//       return redirect(route('user.login'));
//    });

   Route::get('/login', function() {
       if (Auth::guard('user')->check()) {
           return redirect(route('user.private'));
       }
       return view('login');
   })->name('login');

   Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);


    Route::get('/logout', function () {
        Auth::guard('user')->logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function() {
        if (Auth::guard('user')->check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);


});

Route::name('admin.')->group(function () {
    Route::view('/adminPrivate', 'adminPrivate')->middleware('auth:admin')->name('adminPrivate');
//    dd(Route::view('/adminPrivate', 'adminPrivate')->middleware('auth')->name('private'));

    Route::get('/adminLogin', function() {
        if (Auth::guard('admin')->check()) {

            return redirect(route('admin.adminPrivate'));
        }
        return view('adminLogin');
    })->name('login');

    Route::post('/adminLogin', [\App\Http\Controllers\LoginAdminController::class, 'login']);


    Route::get('/adminLogout', function () {
        Auth::guard('admin')->logout();
//        dd(Auth::guard('user')->logout());
        return redirect('/');
    })->name('logout');

    Route::get('/adminRegistration', function() {
        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.adminPrivate'));
        }
        return view('adminRegistration');
    })->name('registration');

    Route::post('/adminRegistration', [\App\Http\Controllers\RegisterAdminController::class, 'save']);
});

Route::get('/editor', function () {
    return view('editor');
})->name('editor')->middleware('auth:user');

Route::get('/adminEditor', function () {
//    dd(Auth::user()->getAttributes());
    return view('editor');
})->name('editor')->middleware('auth:admin');

Route::post('/submit/{user}/{isAdmin}', [\App\Http\Controllers\MessageController::class, 'createMessage'])->name('submit');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/send_form', [\App\Http\Controllers\SendContact::class, 'sendContact'])->name('send_form');

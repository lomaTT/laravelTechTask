<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        return abort(404);
//        dd($request->admin());
//        if (! $request->expectsJson() && $request->getPathInfo() === "/login") {
//            return redirect()->route('/login');
////            abort(404);
//        }

//        if ($request->parameters == null) {
//            abort(404);
//        };
//
//        if (! $request->expectsJson() && $request->getPathInfo() === "/adminLogin") {
//            return redirect()->route('/adminLogin');
//        }

//        dd($request->getPathInfo());
    }
}

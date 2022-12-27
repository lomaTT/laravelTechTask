<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function createMessage(Request $request, $user, $isAdmin) {

        date_default_timezone_set('Europe/Warsaw');
        $content = $request->get("content");

        DB::table('messages')->insert([
            'user_id' => $user,
            'message' => $content,
            'isAdmin' => $isAdmin,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        if ($isAdmin == 0) {
            echo "hello!";
            return redirect(route('user.private'));
        } else {
            echo "hello, admin!";
            return redirect(route('admin.adminPrivate'));
        }
    }
}

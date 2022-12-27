<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="text-center">
    <h2>Logged in!</h2>
    <a href="adminLogout">Logout</a>
{{--    {{ \App\Models\Admin::all() }}--}}
    <br>
    <a href="adminEditor">New message</a>
    <br><br>
    <h2>Messages</h2>
    <?php
    $count = \Illuminate\Support\Facades\DB::table('messages')->count();
    for ($i = 1; $i <= $count; $i++) {
        if (\Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id', 'isAdmin')->get()[$i - 1]->isAdmin == 0) {
            $id =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id')->get()[$i - 1]->user_id;
            $message =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id')->get()[$i - 1]->message;
            $date =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id', 'created_at')->get()[$i - 1]->created_at;
            $email = \Illuminate\Support\Facades\DB::table('users')->select('email')->where('id', '=', $id)->get()[0]->email;

            echo "User email: " . $email . "<br>";
            echo "Message: " . $message;
            echo "Created: " . $date . "<br><br>";
            echo "<div style='width:100%; height: 1px; background-color: blue'></div><br>";
        } else {
            $id =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id')->get()[$i - 1]->user_id;
            $message =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id')->get()[$i - 1]->message;
            $date =  \Illuminate\Support\Facades\DB::table('messages')->select('message', 'user_id', 'created_at')->get()[$i - 1]->created_at;
            $username = \Illuminate\Support\Facades\DB::table('admins')->select('username')->where('id', '=', $id)->get()[0]->username;
            echo "Admin username: " . $username . "<br>";
            echo "Message: " . $message;
            echo "Created: " . $date . "<br><br>";
            echo "<div style='width:100%; height: 1px; background-color: blue'></div><br>";;
        }


    }
    ?>
</div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="text-center"><h1>Authorization</h1>
    <br>
<form action="{{ route('user.login') }}" method="POST" class="col-4 offset-4 border rounded">
    @csrf
    <div class="form-group">
        <label for="email" class="col-form-label-lg">Your email:</label>
        <input type="text" value="" placeholder="email" id="email" class="form-control" name="email">
        @error('email')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label-lg">Password:</label>
        <input type="password" value="" placeholder="password" id="password" class="form-control" name="password">
        @error('password')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Enter</button>
    </div>

</form>
</div>
</body>
</html>

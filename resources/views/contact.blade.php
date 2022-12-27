<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    <h2>Formularz kontaktowy</h2>
    <div id="send_form_status"></div>
    <form method="post" action=" {{ route('send_form') }}" id="contact_form">
        @csrf
    <div><label for="name">Imię i nazwisko</label></div>
    <div><input type="text" name="name" id="name" class="formField" /></div>
    <div><label for="phone">Numer telefonu</label></div>
    <div><input type="text" name="phone" id="phone" class="formField" /></div>
    <div><label for="email">Adres email</label></div>
    <div><input type="text" name="email" id="email" class="formField" /></div>
    <div><label for="message">Treść wiadomości</label></div>
    <div><textarea name="message" id="message" class="formField"></textarea></div>
    <div><button id="sendBtn">Wyślij</button></div>
</form>
</body>
</html>



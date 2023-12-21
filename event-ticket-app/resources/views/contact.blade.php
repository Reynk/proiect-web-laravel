@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 50px;
    }

    .logout-button {
        display: block;
        width: 200px;
        height: 50px;
        margin: 0 auto;
        background-color: #f44336;
        color: white;
        text-align: center;
        line-height: 50px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
    <title>Contact Page</title>
</head>
<body>

    <h1> Contact page </h1>

    <div class="contact-box">
        <h2> Contact information </h2>
        <span> Email: RRZ@gmail.com </span> <br>
        <span> Adress: Str. Teodor Mihali, Cluj-Napoca, Romania </span> <br>
        <span> Telephone: 0751622632 </span> <br>
        <span> Aditional information: You can contact us by sending an email to the adress, or by calling </span> <br>
        <br>

</body>
</html>
@endsection
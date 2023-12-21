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
    .info-text {
            color: black;
            font-size: 18px;
            padding: 10px;
            font-family: Arial, sans-serif;}
            
</style>
</head>
<body>

                <div>
                    <h1>Home Page</h1>
                    <h4 class="info-text">Immerse yourself in a world of cutting-edge technology, innovation, and knowledge-sharing. Explore a curated selection of IT conferences, workshops, and meetups tailored for tech enthusiasts, developers, and industry professionals. With seamless ticket booking and a community-centric approach, we connect you to the latest trends, expert insights, and networking opportunities. Elevate your IT experience with exclusive access to groundbreaking events and become part of a dynamic community that celebrates the forefront of technology. Your journey into the future of IT starts here—explore, connect, and stay ahead with RRZ tickets.</h4>
                </div>
</body>
</html>

@endsection
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
</head>
<main>
    <h1>ORDER PAGE</h1>
    <div class="evenst-list">
        <table>
            <tr>
                <th>Event Name</th>
                <th>Price</th>
                <th>Size</th>
            </tr>
            
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->event_title }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->size }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</main>
<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>
@endsection
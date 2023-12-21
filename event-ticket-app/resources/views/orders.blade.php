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
    <h1>Order Page</h1>
    <div class="orders-list">
        @forelse ($orders as $order)
            <table>
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Price</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ htmlentities($order->event_title) }}</td>
                        <td>{{ htmlentities($order->price) }}</td>
                        <td>{{ htmlentities($order->size) }}</td>
                    </tr>
                </tbody>
            </table>
        @empty
            <p>No orders found.</p>
        @endforelse
    </div>
</main>
<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>
@endsection

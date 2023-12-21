@extends('layouts.app')

@section('content')
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

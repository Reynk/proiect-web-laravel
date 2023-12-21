@extends('layouts.app')

@section('content')
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
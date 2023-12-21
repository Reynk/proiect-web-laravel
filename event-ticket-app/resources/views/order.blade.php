@extends('layouts.app')

@section('content')

<header>
    <nav>
        <ul class="nav-links">
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">LOGOUT</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<h1>Order List</h1>
<div class="event-list">
    <table>
        <tr>
            <th>Event Name</th>
            <th>Price</th>
            <th>Size</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->event->event_title }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->event->size }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
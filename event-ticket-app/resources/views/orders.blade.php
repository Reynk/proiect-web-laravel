@extends('layouts.app')

@section('content')
<main>
    <h1>ORDER PAGE</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Price</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->event_title }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->size }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Nothing in history</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>
@endsection
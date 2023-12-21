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
{{ var_dump(Auth::user()) }}
<h1>Upcoming events</h1>
<div class="event-list">
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Date</th>
            <th>About</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td><img src="{{ $event->image }}" alt="logo" class="event-image"></td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->about }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->price }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
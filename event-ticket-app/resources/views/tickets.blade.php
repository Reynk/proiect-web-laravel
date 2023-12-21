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
<header>
    <nav>

    </nav>
</header>
{{ var_dump(Auth::check()) }}
<h1>Upcoming events</h1>
<div class="event-list">
    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>About</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->title }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->about }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->price }}</td>
            <td>
                <a href="{{ route('eventInfo', ['id' => $event->id]) }}" class="btn btn-info">Event Info</a>
            </td>
            <td>
                <div class="buy-ticket">
                    <form action="{{ route('insertOrder') }}" method="POST">
                        @csrf
                        <select name="size">
                            @for ($i = 1; $i <= 9; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                        <input type="hidden" name="username" value="{{ $username }}">
                        <input type="hidden" name="event_title" value="{{ $event->title }}">
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <input type="hidden" name="price" value="{{ $event->price }}">
                        <button type="submit" class="custom-button">Buy Ticket</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
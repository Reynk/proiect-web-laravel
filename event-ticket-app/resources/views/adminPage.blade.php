@extends('layouts.app')

@section('content')
<header>
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
</header>
{{ var_dump(Auth::check()) }}
<main>
    <h1>Admin event administration</h1>
    <div class="bilete-button">
        <div>
            <form action="{{ route('createEvent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="event-create">
                    <tr>
                        <th colspan="2">
                            <h2>Create new event</h2>
                        </th>
                    </tr>
                    <tr>
                        <td><label for="title">title:</label></td>
                        <td><input type="text" id="title" name="title"></td>
                    </tr>
                    <tr>
                        <td><label for="date">date:</label></td>
                        <td><input type="date" value="2023-01-01" min="2023-01-01" max="2033-12-31" id="date"
                                name="date"></td>
                    </tr>
                    <tr>
                        <td><label for="about">about:</label></td>
                        <td><input type="text" id="about" name="about"></td>
                    </tr>
                    <tr>
                        <td><label for="description">description:</label></td>
                        <td><input type="text" id="description" name="description"></td>
                    </tr>
                    <tr>
                        <td><label for="price">price:</label></td>
                        <td><input type="text" id="price" name="price"></td>
                    </tr>
                    <tr>
                        <td><label for="image">image:</label></td>
                        <td><input type="file" id="image" name="image"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Create new event" class="admin-button"></td>
                    </tr>
                </table>
            </form>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>About</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->about }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->price }}</td>
                    <td>
                        <form action="{{ route('deleteEvent', $event->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-button-delete">Delete Event</button>
                        </form>
                    </td>
                </tr>
                <tr class="edit-row">
                    <form action="{{ route('updateEvent', $event->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td colspan="5">
                            <input type="text" name="title" value="{{ $event->title }}" placeholder="Update Title">
                            <input type="date" name="date" value="{{ $event->date }}" placeholder="Update Date">
                            <input type="text" name="about" value="{{ $event->about }}">
                            <input type="text" name="description" value="{{ $event->description }}"
                                placeholder="Update Description">
                            <input type="text" name="price" value="{{ $event->price }}" placeholder="Update Price">
                            <input type="file" name="image" id="image">
                        </td>
                        <td>
                            <button class="admin-button" type="submit">Update Information</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
</main>
<footer>
    <div class="footer">
        <p>&copy; 2023 RRZ Tickets</p>
    </div>
</footer>
@endsection
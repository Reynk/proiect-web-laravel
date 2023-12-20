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
            <div class="event-list">
                <table>
                    <!-- Your table headers here -->
                    @foreach($events as $event)
                    <tr>
                        <!-- Your table data here -->
                    </tr>
                    <tr class="edit-row">
                        <form action="{{ route('updateEvent', $event->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Your form fields here -->
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
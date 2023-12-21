<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- head content -->
</head>
<body>
    <nav>
        <ul class="nav-links">
            <li><a href="{{ route('mainPage') }}">Home</a></li>
            <li><a href="{{ route('tickets') }}">Tickets</a></li>
            <li><a href="{{ route('order') }}">Order history</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
@auth
<nav>
    <ul>
        <li><a href="/mainPage">Home</a></li>
        <li><a href="/tickets">Tickets</a></li>
        <li><a href="/orders">Orders</a></li>
        <li><a href="/contact">Contact</a></li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">LOGOUT</button>
        </form>
    </ul>
</nav>
@endauth
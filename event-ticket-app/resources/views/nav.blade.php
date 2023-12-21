
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

    .navbar {
        display: flex;
        justify-content: center;
        background-color: #333;
        padding: 15px;
    }

    .navbar li {
        display: inline;
    }

    .navbar a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }
</style>
</head>
<body>
<form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="logout-button">LOGOUT</button>
                </form>
                <div>
                    <h1>Home Page</h1>
                </div>
                <div class="navbar">
                    <ul>
                    <li><a href="/mainPage">Home</a></li>
                    <li><a href="/tickets">Tickets</a></li>
                    <li><a href="/orders">Orders</a></li>
                    <li><a href="/contact">contact</a></li>
                    </ul>
                </div>
</body>
</html>


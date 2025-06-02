<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main>
    <header>
        <nav>
            <ul class="flex justify-between align-middle">
                <div class="flex space-x-5">
                <li><a href="/">Home</a></li>
                @auth
                <li><a href="#">Items</a></li>
                <li><a href="#">Consumers</a></li>
                <li><a href="{{ route('supplier.index') }}">Suppliers</a></li>
                <li><a href="#">Transactions</a></li>
                <li><a href="{{ route('category.index') }}">Categories</a></li>
                @endauth
                </div>

                <div class="flex space-x-5">
                @auth
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endauth
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                </div>
            </ul>
        </nav>
    </header>
    {{ $slot }}
    <footer>
        <p>© 2025 Inventory Management</p>
    </footer>
    </main>
</body>
</html>
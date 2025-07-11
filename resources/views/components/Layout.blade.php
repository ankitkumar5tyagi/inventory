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
                <li><a href="{{ route('uom.index') }}">UOM</a></li>
                <li><a href="{{ route('group.index') }}">Groups</a></li>
                <li><a href="{{ route('godown.index') }}">Godowns</a></li>
                <li><a href="{{ route('category.index') }}">Categories</a></li>
                <li><a href="{{ route('item.index') }}">Items</a></li>
                <li><a href="{{ route('voucher.index') }}">Vouchers</a></li>
                <li><a href="{{ route('partyGroup.index') }}">Parties</a></li>
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
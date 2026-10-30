<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <nav class="bg-emerald-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-4">
                <span class="font-bold text-lg">Bakuna Tracker</span>
                <a href="/dashboard" class="hover:underline">Dashboard</a>
                <a href="/schedule" class="hover:underline">Schedule</a>
            </div>

            <div class="flex items-center gap-3 text-sm">
                @auth
                    <span>Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="underline">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="underline">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto w-full px-4 py-6 flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-300 text-sm text-center py-4">
        Barangay Matina Crossing Health Center &copy; 2026
    </footer>

</body>
</html>

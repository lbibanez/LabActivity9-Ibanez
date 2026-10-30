<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker - Purok Ibanez')</title>

    {{-- Vite Asset Loading (Requirement 3) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- Navigation Bar (Requirement 7) --}}
    <nav class="bg-emerald-700 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/dashboard" class="font-bold text-xl tracking-wide">
                Bakuna Tracker - Purok Ibanez
            </a>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm font-medium">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm bg-emerald-800 hover:bg-emerald-900 px-3 py-1 rounded transition">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm bg-emerald-800 hover:bg-emerald-900 px-3 py-1 rounded transition">
                        Sign in
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Main Content Section (Requirement 2) --}}
    <main class="flex-grow max-w-7xl w-full mx-auto p-4 md:p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t mt-auto py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Barangay Matina Crossing Health Center
    </footer>

</body>
</html>
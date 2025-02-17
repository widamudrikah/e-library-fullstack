<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    @vite('resources/css/app.css')
</head>

<body>
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-primary">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <ul class="flex space-x-4">
                    @guest
                    @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Login</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Register</a>
                    </li>
                    @endif
                    @else
                    <li class="relative">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" class="text-red-500 ml-4"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
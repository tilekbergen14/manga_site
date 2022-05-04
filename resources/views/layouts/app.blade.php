<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col">
    <nav class="bg-gray-800 text-white">
        <div class="container">
            <div class="flex justify-between items-center py-6">
                <h1 class="text-4xl mr-4"><a href="/">MANGA.KZ</a></h1>
                <div class="w-full md:w-1/3 flex">
                    <form action="/manga" class="flex w-full">
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="search" placeholder="Іздеу"
                            value="{{ $search ?? old('search') }}">
                        <button
                            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2"
                            type="submit">
                            Іздеу
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-gray-700  py-3">
            <div class="flex justify-between container">
                <ul class="flex">
                    <li class="mr-2">Басты Бет</li>
                    <li class="mr-2">Іздеу</li>
                    {{-- <li>Discussion</li> --}}
                </ul>
                <ul>
                    @auth
                        <li><a href="/logout">Шығу</a></li>
                    @endauth
                    @guest
                        <li><a href="/login">Кіру</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>

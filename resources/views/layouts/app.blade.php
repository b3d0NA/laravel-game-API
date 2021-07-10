<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{ asset("css/custom.css") }}">
    <livewire:styles />
    <title>@yield("title")</title>
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <a href="{{ route("home") }}">
{{--                    <img src="" class="w-32 flex-none" alt="">--}}
                    <h2 class="text-xl text-white">Agre<span class="logo-animation text-2xl transform rotate-90">g</span>ation</h2>
                </a>
                <ul class="flex ml-16 space-x-8 m-5">
                    <li><a href="{{ route("home") }}" class="hover:text-gray-400">Home</a></li>
                </ul>
            </div>
            <livewire:search-dropdown />
        </nav>
    </header>
    <main class="py-8">
        @yield("content")
    </main>
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered by <a href="https://www.igdb.com/api" class="hover:text-gray-400 underline">IGDB Api</a>
        </div>
    </footer>
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</body>
</html>

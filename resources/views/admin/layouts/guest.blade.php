<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased ">
    <div class="min-h-screen flex flex-col sm:justify-center items-center p-0 sm:pt-0 bg-[#BCDDEB]">

        <div class="flex flex-row justify-center w-full mb-4 px-40">
            <div class="relative w-full sm:max-w-md mt-6 px-6 py-10 bg-cover content-center shadow-md overflow-hidden rounded-s"
                style="background-image: url('{{ asset('images/japanese-woman-posing-restaurant.webp') }}');">
                <a href="/" class="relative z-10">
                    <img src="{{ asset('images/logo.png') }}" alt="uniEarn" class="max-w-[400px]">
                </a>
                <div class="absolute inset-0 bg-[#1892C8] bg-opacity-40 rounded-s z-0"></div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-40 bg-white shadow-md overflow-hidden rounded-e">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>

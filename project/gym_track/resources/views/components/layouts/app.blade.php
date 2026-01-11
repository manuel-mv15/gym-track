<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 antialiased dark:bg-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-row">
        {{-- Main Content --}}
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>

        @auth
            <x-layouts.navbar />
        @endauth
    </div>
</body>

</html>
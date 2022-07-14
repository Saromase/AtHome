<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-slate-700">
        @include('layouts.admin-navigation')
        {{-- 

            <!-- Page Heading -->
            <header class="bg-white dark:text-white dark:bg-slate-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 dark:text-white">
                    {{ $header }}
    </div>
    </header> --}}

    <!-- Page Content -->
    <main class="flex w-full h-[calc(100vh-theme(space.16))]">
        @include('layouts.admin-sidebar')
        <section class="w-full py-4 px-3">
            <x-flash-message :session="session()"></x-flash-message>

            {{ $slot }}
        </section>

        @livewireScripts
    </main>
    </div>
</body>

</html>
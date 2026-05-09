<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CRM Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="min-h-screen flex flex-col overflow-x-hidden bg-gray-50 dark:bg-gray-900">


{{-- NAVBAR --}}
<x-navbar/>

{{-- SIDEBAR (desktop) --}}
@auth
    <x-sidebars.sidebar-component/>
@endauth

@auth
    <main class="flex-1 mt-16 lg:ml-64 p-4">
        @yield('content')
        {{ $slot }}
    </main>
@else
    <main class="flex-1 mt-16 p-4">
        @yield('content')
        {{ $slot }}
    </main>
@endauth

{{-- FOOTER --}}
<x-footer/>


</body>
</html>

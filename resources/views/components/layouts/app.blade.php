<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ session('title', 'Sistem Informasi Desa') }}</title>
    <link rel="icon" href="{{ asset('image/bogor.png') }}" type="image/x-icon">

    {{-- Tambahkan CDN FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >  
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  
    {{-- CDN Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>


    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

    @livewireScripts
    @if (!request()->routeIs('filament.admin.auth.login') && !request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs('forgot.password'))
        @livewire('navbar')
    @endif
    <div>
        {{ $slot }}
    </div>

    @if (!request()->routeIs('filament.admin.auth.login') && !request()->routeIs('login') && !request()->routeIs('register') && !request()->routeIs('forgot.password'))
        @livewire('footer')
    @endif

    @yield('content')

    @livewireScripts
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

<script>lucide.createIcons();</script>
<script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.js"></script>
<script>feather.replace()</script>

</html>

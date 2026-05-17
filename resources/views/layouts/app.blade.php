<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script>
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark')
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Levtofer') }} - @yield('title', 'home')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Lora:ital,wght@0,400;0,500;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-paper-3 text-ink min-h-screen" x-data="{ sidebarOpen: false, ...darkMode() }" x-init="init()">

    {{-- mobile overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-ink/20 z-30 lg:hidden"></div>

    <div class="flex min-h-screen">

        {{-- sidebar --}}
        @include('layouts.sidebar')

        {{-- main wrapper --}}
        <div class="flex-1 flex flex-col min-w-0 min-h-screen">

            {{-- mobile header --}}
            <header
                class="lg:hidden sticky top-0 z-20 bg-paper border-b border-ink/10 px-4 py-3 flex items-center justify-between">
                <span class="font-caveat text-xl font-bold text-ink">Levtofer</span>
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="w-8 h-8 flex flex-col items-center justify-center gap-1 border border-ink/15 rounded-lg">
                        <span class="w-4 h-px bg-ink block"></span>
                        <span class="w-4 h-px bg-ink block"></span>
                        <span class="w-4 h-px bg-ink block"></span>
                    </button>
                </div>
            </header>

            {{-- page content --}}
            <main class="flex-1 px-4 pt-6 md:px-8 md:pt-10 pb-16 max-w-5xl w-full mx-auto">
                @yield('content')
            </main>

            {{-- footer --}}
            <footer class="px-8 py-5 border-t border-ink/10 text-xs text-ink-3 font-caveat text-center">
                made slowly with love - levtofer {{ date('Y') }}
            </footer>

        </div>
    </div>

    @stack('scripts')
</body>

</html>

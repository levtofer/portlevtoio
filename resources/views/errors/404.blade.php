<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — lost</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=DM+Sans:opsz,wght@9..40,400;9..40,500&display=swap"
        rel="stylesheet">
    <?php
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    $css = $manifest['resources/css/app.css']['file'] ?? '';
    $js = $manifest['resources/js/app.js']['file'] ?? '';
    ?>
    <link rel="stylesheet" href="/build/{{ $css }}">
    <script src="/build/{{ $js }}" defer></script>
</head>

<body x-data="{ sidebarOpen: false, ...darkMode() }" x-init="init()"
    class="bg-paper-3 text-ink min-h-screen flex items-center justify-center p-8">

    <div class="flex flex-col items-center gap-6 text-center max-w-md">

        {{-- big 404 --}}
        <div class="relative">
            <span class="font-caveat text-[8rem] font-bold text-ink/10 leading-none select-none">404</span>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-paper border border-ink/10 rounded-2xl px-6 py-3 shadow-sm">
                    <span class="font-caveat text-xl text-ink">you seem lost (TwT)</span>
                </div>
            </div>
        </div>

        {{-- torn note --}}
        <div class="relative bg-paper border border-ink/10 rounded-sm px-8 py-6 rotate-[1deg] shadow-sm max-w-xs"
            style="clip-path: polygon(0% 0%, 100% 0%, 100% 88%, 96% 95%, 92% 90%, 88% 96%, 84% 91%, 80% 96%, 76% 92%, 72% 97%, 68% 92%, 64% 96%, 60% 91%, 56% 96%, 52% 92%, 48% 97%, 44% 92%, 40% 96%, 36% 91%, 32% 96%, 28% 92%, 24% 97%, 20% 92%, 16% 96%, 12% 91%, 8% 96%, 4% 92%, 0% 97%)">
            <p class="font-caveat text-sm text-ink-2 leading-relaxed">
                this page doesn't exist,<br>
                or maybe it used to.<br>
                either way, it's gone now.
            </p>
        </div>

        {{-- back home --}}
        <a href="/"
            class="font-caveat text-base text-ink-3 hover:text-ink border border-ink/15 px-5 py-2 rounded-lg hover:bg-paper transition-all duration-200 hover:-translate-y-0.5">
            ← take me home
        </a>

        {{-- doodle note --}}
        <div class="font-caveat text-xs text-ink-3/50 rotate-[-1deg]">
            maybe check the url?
        </div>

    </div>

</body>

</html>
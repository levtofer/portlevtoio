<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - lost</title>
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

<body x-data="{ ...darkMode() }" x-init="init()"
    class="min-h-screen bg-paper-3 text-ink flex items-center justify-center p-6">

    <main class="w-full max-w-md text-center">

        <!-- 404 -->
        <h1 class="font-caveat text-8xl font-bold leading-none text-ink">
            404
        </h1>

        <!-- message card -->
        <div class="mt-4 bg-paper border border-ink/10 rounded-2xl px-8 py-7 shadow-sm">

            <p class="font-caveat text-2xl text-ink mb-3">
                you seem lost
            </p>

            <p class="text-sm text-ink-2 leading-relaxed">
                The page you're looking for doesn't exist,
                has been moved, or was never here to begin with.
            </p>

            <a href="/" class="inline-flex items-center mt-6 px-4 py-2 rounded-lg
                       border border-ink/15 hover:bg-paper-2
                       transition-colors duration-200">
                ← Back home
            </a>

        </div>

        <!-- tiny note -->
        <p class="mt-4 font-caveat text-sm text-ink-3/60">
            maybe check the URL?
        </p>

    </main>

</body>

</html>
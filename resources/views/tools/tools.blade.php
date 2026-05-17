@extends('layouts.app')
@section('title', 'tools')

@section('content')
    <div class="flex flex-col gap-6 pb-10">

        <div class="px-2">
            <div class="flex items-center gap-3 mb-2">
                <h1 class="font-caveat text-4xl text-ink">tools & setup</h1>
                <span class="flex-1 h-px bg-ink/10"></span>
                <a href="/" class="text-xs text-ink-3 hover:text-ink transition-colors">go back →</a>
            </div>
            <p class="font-caveat text-sm text-ink-3">things i usually use</p>
        </div>
        @php
            $categories = [
                [
                    'name' => 'web development',
                    'note' => 'things i actually build with',
                    'rotate' => '-rotate-[0.1deg]',
                    'tools' => [
                        ['name' => 'Laravel', 'icon' => 'laravel', 'note' => 'main framework'],
                        ['name' => 'PHP', 'icon' => 'php', 'note' => 'mostly vanilla'],
                        ['name' => 'MySQL', 'icon' => 'mysql', 'note' => 'database stuff'],
                        ['name' => 'Tailwind', 'icon' => 'tailwindcss', 'note' => 'styling everything'],
                        ['name' => 'Alpine.js', 'icon' => 'alpinedotjs', 'note' => 'small interactions'],
                    ],
                ],

                [
                    'name' => 'art & creative',
                    'note' => 'outside of coding',
                    'rotate' => 'rotate-[-0.1deg]',
                    'tools' => [
                        ['name' => 'MediBang Paint', 'icon' => 'medibangpaint', 'note' => 'main drawing app'],
                        ['name' => 'Krita', 'icon' => 'krita', 'note' => 'painting sometimes'],
                        ['name' => 'ibisPaint X', 'icon' => 'ibispaint', 'note' => 'mobile sketches'],
                        ['name' => 'LMMS', 'icon' => 'lmms', 'note' => 'music experiments'],
                        ['name' => 'Alight Motion', 'icon' => 'alightmotion', 'note' => 'editing on mobile'],
                        ['name' => 'Shotcut', 'icon' => 'shotcut', 'note' => 'simple video edits'],
                    ],
                ],

                [
                    'name' => 'workflow',
                    'note' => 'daily environment',
                    'rotate' => '-rotate-[0.1deg]',
                    'tools' => [
                        ['name' => 'VS Code', 'icon' => 'visualstudiocode', 'note' => 'open 24/7'],
                        ['name' => 'Git', 'icon' => 'git', 'note' => 'version control'],
                        ['name' => 'GitHub', 'icon' => 'github', 'note' => 'where projects live'],
                        ['name' => 'XAMPP', 'icon' => 'xampp', 'note' => 'older local setup'],
                        ['name' => 'Laragon', 'icon' => 'laragon', 'note' => 'preferred local setup'],
                    ],
                ],
                [
                    'name' => 'game dev',
                    'note' => 'small experiments & ideas',
                    'rotate' => 'rotate-[0.15deg]',
                    'tools' => [
                        ['name' => 'Godot', 'icon' => 'godotengine', 'note' => 'learning by making'],
                        ['name' => 'GameMaker', 'icon' => 'gamemaker', 'note' => 'tiny game concepts'],
                    ],
                ],
            ];
        @endphp

        @foreach ($categories as $category)
            <div
                class="flex flex-col sm:flex-row bg-paper border border-ink/10 rounded-2xl overflow-hidden {{ $category['rotate'] }}">

                {{-- left pane --}}
                <div
                    class="sm:w-40 shrink-0 border-b sm:border-b-0 sm:border-r border-ink/10 p-6 flex flex-col justify-center gap-1 bg-paper-2">
                    <span class="font-caveat text-xl text-ink font-bold">{{ $category['name'] }}</span>
                    <span class="font-caveat text-xs text-ink-3">{{ $category['note'] }}</span>
                </div>

                {{-- right pane --}}
                <div class="flex-1 p-6 flex flex-wrap gap-3">
                    @foreach ($category['tools'] as $i => $tool)
                        @php
                            $rotations = [
                                '-rotate-[0.2deg]',
                                'rotate-[0.15deg]',
                                '-rotate-[0.1deg]',
                                'rotate-[0.2deg]',
                                '-rotate-[0.15deg]',
                                'rotate-[0.11deg]',
                            ];
                            $r = $rotations[$i % count($rotations)];
                        @endphp
                        <div
                            class="group flex flex-col items-center gap-1.5 {{ $r }} hover:rotate-0 hover:-translate-y-1 transition-all duration-200 cursor-default">
                            <div
                                class="w-12 h-12 bg-paper-2 border border-ink/10 rounded-xl flex items-center justify-center shadow-sm">
                                <img src="{{ asset('icons/' . $tool['icon'] . '.svg') }}" alt="{{ $tool['name'] }}"
                                    class="w-6 h-6 opacity-60 group-hover:opacity-100 transition-opacity"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                <span
                                    class="hidden w-full h-full items-center justify-center font-caveat text-xs text-ink-3">{{ substr($tool['name'], 0, 2) }}</span>
                            </div>
                            <span class="font-caveat text-xs text-ink-2">{{ $tool['name'] }}</span>
                            <span
                                class="font-caveat text-[10px] text-ink-3/70 text-center max-w-[60px] leading-tight opacity-0 group-hover:opacity-100 transition-opacity">{{ $tool['note'] }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>
@endsection

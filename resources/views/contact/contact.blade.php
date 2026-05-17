@extends('layouts.app')
@section('title', 'reach me')

@section('content')
    <div class="flex flex-col gap-8 pb-10">
        <section class="px-2">
            {{-- HEADER --}}
            <div class="flex items-center gap-3 mb-1">
                <h1 class="font-caveat text-4xl text-ink">reach me</h1>
                <span class="flex-1 h-px bg-ink/10"></span>
                <a href="/" class="text-xs text-ink-3 hover:text-ink transition-colors">go back →</a>
            </div>
            {{-- DIRECT CONTACT --}}
            <div class="flex items-center gap-3 mb-6">
                <span class="font-caveat text-lg text-ink-2">the best way to reach me</span>
            </div>

            @php
                $direct = [
                    [
                        'label' => 'email',
                        'icon' => 'gmail',
                        'value' => 'levtofer@gmail.com',
                        'url' => 'mailto:levtofer@gmail.com',
                        'rotate' => '-rotate-[2deg]',
                        'tape' => 'rotate-[-7deg]',
                        'tapePos' => 'top-[-6px] left-5',
                        'color' => '#EA4335',
                    ],
                    [
                        'label' => 'telegram',
                        'icon' => 'telegram',
                        'value' => '@levtofer',
                        'url' => 'https://t.me/levtofer',
                        'rotate' => 'rotate-[1.5deg]',
                        'tape' => 'rotate-[6deg]',
                        'tapePos' => 'top-[-6px] right-5',
                        'color' => '#26A5E4',
                    ],
                    [
                        'label' => 'discord',
                        'icon' => 'discord',
                        'value' => 'levtofer',
                        'url' => 'https://discord.gg/twPSFet8',
                        'rotate' => '-rotate-[1deg]',
                        'tape' => 'rotate-[-5deg]',
                        'tapePos' => 'top-[-6px] left-6',
                        'color' => '#5865F2',
                    ],
                ];
            @endphp

            <div class="flex flex-wrap gap-6 px-2">
                @foreach ($direct as $d)
                    <a href="{{ $d['url'] }}" target="_blank"
                        class="group relative flex flex-col items-center gap-3 {{ $d['rotate'] }} hover:rotate-0 hover:-translate-y-1 transition-all duration-200">

                        {{-- tape --}}
                        <span
                            class="absolute {{ $d['tapePos'] }} w-8 h-4 opacity-75 bg-paper-2 border border-ink/10 {{ $d['tape'] }} z-10"></span>

                        {{-- torn note card --}}
                        <div class="bg-paper border border-ink/10 rounded-sm px-6 pt-6 pb-5 flex flex-col items-center gap-3 shadow-sm min-w-[120px] transition-colors duration-200"
                            style="clip-path: polygon(0% 0%, 100% 0%, 100% 88%, 96% 95%, 92% 90%, 88% 96%, 84% 91%, 80% 96%, 76% 92%, 72% 97%, 68% 92%, 64% 96%, 60% 91%, 56% 96%, 52% 92%, 48% 97%, 44% 92%, 40% 96%, 36% 91%, 32% 96%, 28% 92%, 24% 97%, 20% 92%, 16% 96%, 12% 91%, 8% 96%, 4% 92%, 0% 97%)"
                            x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false"
                            :style="hovered ? 'background-color: {{ $d['color'] }}' : ''">

                            <img src="{{ asset('icons/' . $d['icon'] . '.svg') }}"
                                class="w-6 h-6 transition-all duration-200"
                                :class="hovered ? 'opacity-100 brightness-0 invert' : 'opacity-50'"
                                alt="{{ $d['label'] }}">

                            <div class="flex flex-col items-center gap-1 pb-3">
                                <span class="font-caveat text-base font-bold transition-colors duration-200"
                                    :class="hovered ? 'text-white' : 'text-ink'">{{ $d['label'] }}</span>
                                <span class="font-caveat text-xs transition-colors duration-200"
                                    :class="hovered ? 'text-white/70' : 'text-ink-3'">{{ $d['value'] }}</span>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- SOCIAL LINKS --}}
        <section>
            <div class="flex items-center gap-3 mb-6 px-2">
                <span class="font-caveat text-lg text-ink-2">or find me on</span>
                <span class="flex-1 h-px bg-ink/10"></span>
            </div>

            @php
                $socials = [
                    // creative
                    [
                        'label' => 'github',
                        'icon' => 'github',
                        'url' => 'https://github.com/levtofer',
                        'category' => 'creative',
                    ],
                    [
                        'label' => 'pinterest',
                        'icon' => 'pinterest',
                        'url' => 'https://pinterest.com/levtofer/',
                        'category' => 'creative',
                    ],

                    // social
                    [
                        'label' => 'instagram',
                        'icon' => 'instagram',
                        'url' => 'https://instagram.com/levtofer',
                        'category' => 'social',
                    ],
                    ['label' => 'twitter/x', 'icon' => 'x', 'url' => 'https://x.com/levtofer', 'category' => 'social'],
                    ['label' => 'facebook', 'icon' => 'facebook', 'url' => 'https://web.facebook.com/profile.php?id=61590109580930', 'category' => 'social'],
                    [
                        'label' => 'bluesky',
                        'icon' => 'bluesky',
                        'url' => 'https://bsky.app/profile/levtofer.bsky.social',
                        'category' => 'social',
                    ],

                    // gaming
                    [
                        'label' => 'roblox',
                        'icon' => 'roblox',
                        'url' => 'https://www.roblox.com/users/10887416826/profile',
                        'category' => 'gaming',
                    ],
                ];
            @endphp

            @php $categories = ['creative', 'social', 'gaming'] @endphp

            <div class="flex flex-col gap-6">
                @foreach ($categories as $cat)
                    <div>
                        <p class="font-caveat text-xs text-ink-3 uppercase tracking-widest mb-3 px-2">{{ $cat }}
                        </p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach ($socials as $s)
                                @if ($s['category'] === $cat)
                                    <a href="{{ $s['url'] }}" target="_blank"
                                        class="flex items-center gap-3 px-4 py-3 bg-paper border border-ink/10 rounded-xl hover:bg-paper-2 hover:-translate-y-0.5 transition-all duration-200 group">
                                        <div class="w-7 h-7 flex items-center justify-center shrink-0">
                                            <img src="{{ asset('icons/' . $s['icon'] . '.svg') }}"
                                                class="w-4 h-4 opacity-50 group-hover:opacity-100 transition-opacity"
                                                alt="{{ $s['label'] }}" onerror="this.style.display='none'">
                                        </div>
                                        <span class="font-caveat text-sm text-ink-2">{{ $s['label'] }}</span>
                                        <span
                                            class="ml-auto text-xs text-ink-3 opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- GUESTBOOK CTA --}}
        <section>
            <a href="{{ route('guestbook') }}"
                class="flex items-center gap-4 px-6 py-5 bg-paper border border-ink/10 rounded-2xl hover:bg-paper-2 hover:-translate-y-0.5 transition-all duration-200 group rotate-[-0.5deg] hover:rotate-0">
                <div class="flex flex-col gap-1">
                    <span class="font-caveat text-lg text-ink">rather write a note?</span>
                    <span class="text-xs text-ink-3">leave something in the guestbook (◠w◠)</span>
                </div>
                <span class="ml-auto font-caveat text-sm text-accent opacity-0 group-hover:opacity-100 transition-opacity">→
                    guestbook</span>
            </a>
        </section>

    </div>
@endsection

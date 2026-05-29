@extends('layouts.app')
@section('title', 'about')

@section('content')
    <div class="flex flex-col gap-10 pb-10">
        <div class="px-2 flex items-center gap-3 mb-2">
            <h1 class="font-caveat text-4xl text-ink">about</h1>
            <span class="flex-1 h-px bg-ink/10"></span>
            <a href="/" class="text-xs text-ink-3 hover:text-ink transition-colors">go back →</a>
        </div>
        {{-- PROFILE CARD --}}
        <section class="relative bg-paper border border-ink/10 rounded-2xl p-6 md:p-8 overflow-visible">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-center lg:items-start text-center lg:text-left">

                <!-- left side -->
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 shrink-0 w-full lg:w-auto">

                    <!-- photo -->
                    <div class="relative shrink-0">
                        <img src="{{ asset('images/profile.png') }}" alt="Levtofer"
                            class="w-28 h-28 md:w-36 md:h-36 rounded-2xl border-2 border-ink/10 object-cover rotate-[-2deg] shadow-md">
                        <span
                            class="absolute -bottom-3 -right-3 font-caveat text-xs text-accent bg-paper border border-accent/20 px-2 py-1 rounded-lg rotate-[3deg] shadow-sm">
                            he/they ✦
                        </span>
                    </div>

                    <!-- identity -->
                    <div class="flex flex-col gap-2 pt-1 flex-1">
                        <div
                            class="flex flex-wrap items-end justify-center lg:justify-start gap-2 text-center lg:text-left">
                            <h1 class="font-caveat text-4xl md:text-5xl font-bold text-ink leading-none">Levtofer</h1>
                            <span class="font-caveat text-xs md:text-sm text-ink-3 mb-1">— the person behind all this</span>
                        </div>
                        <p class="text-xs text-ink-3 tracking-widest uppercase">developer · artist · builder</p>
                        <div class="flex flex-row flex-wrap gap-1.5 mt-1">
                            <span
                                class="font-caveat text-xs md:text-sm bg-paper-2 border border-ink/10 px-3 py-1 rounded-full text-ink-2 rotate-[-1deg]">
                                ⚲ Bandung, Indonesia
                            </span>
                            <span
                                class="font-caveat text-xs md:text-sm bg-paper-2 border border-ink/10 px-3 py-1 rounded-full text-ink-2 rotate-[1deg]">
                                🗓 30 July
                            </span>
                            <span
                                class="inline-flex items-center gap-2 font-caveat text-xs md:text-sm bg-paper-2 border border-ink/10 px-3 py-1 rounded-full text-ink-2 rotate-[-0.5deg]">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSuI9et1arGRGJ9PxOhQHUqJ3l_CxN4QvSTQ&s"
                                    alt="AroAce"
                                    class="shadow-sm hover:-translate-y-0.5 transition-all w-4 h-4 rounded-full object-cover">
                                AroAce
                            </span>
                        </div>
                    </div>

                </div>

                <!-- right side / on mobile sits below -->
                <div class="flex-1 relative pt-1 lg:pt-2 w-full lg:w-auto lg:flex lg:justify-center">
                    <div
                        class="absolute top-0 right-0 font-caveat text-xs text-ink-3/30 rotate-[8deg] select-none hidden lg:block">
                        est. sometime ago
                    </div>
                    <p class="-mt-6 lg:mt-0 font-caveat text-2xl md:text-3xl lg:text-4xl text-ink leading-relaxed">
                        hello, i'm <span class="relative text-accent group cursor-default">
                            levtofer
                            <span
                                class="absolute left-0 -bottom-1 h-[2px] w-0 bg-accent transition-all duration-300 group-hover:w-full"></span>
                        </span>.<br>
                        and...
                    </p>
                </div>

            </div>
        </section>

        {{-- LONG INTRO --}}
        <section class="relative bg-paper border border-ink/10 rounded-2xl p-8 rotate-[-0.3deg]"
            style="
        background-image:
            repeating-linear-gradient(
                transparent,
                transparent 30px,
                rgba(44,38,32,0.08) 31px
            );
        background-size: 100% 31px;
    ">
            <span
                class="absolute -top-3 left-8 font-caveat text-xl text-ink-2 bg-paper px-3 py-1 rounded-md rotate-[-1deg] shadow-sm border border-ink/10">a
                little more about me</span>
            <div class="flex flex-col gap-4 text-sm text-ink-2 leading-relaxed pt-2">
                <p>
                    i've been building things on the web for as long as i can remember.
                    it started from a school assignment, or my literal school major tbe,
                    i was assigned to make a website, simple one from html to php, then i did laravel by myself (with the
                    help of ai
                    ofc, but not all)
                </p>
                <p>
                    most of my projects start when i was thinking that "what can i make using my current knowledge that i
                    have"
                    then come the website thingie. altho i already did some other alternative such as carrd and strawpage,
                    but they are limited
                    (and for custom html, some of them are pay-to-use), so just use the real code instead, why not?
                </p>
                <p>
                    outside of code i spend some time too with music, visuals, and anything that i will fixated, it will
                    last for 1-3 days.
                    to say, my currents for now is code, music, draw, game (mostly geometry dash and godot (for
                    development)), and making a cosplay thing.
                </p>
            </div>
        </section>

        {{-- INTERESTS / FANDOM --}}
        <section>
            <h2 class="font-caveat text-2xl text-ink mb-6 px-2">interests & fandoms</h2>

            @php
                $interests = [
                    [
                        'label' => 'undertale',
                        'note' => 'peak game',
                        'image' =>
                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8oA0-cyfoqrByo5PIClM7I-eVmi73nCuUAQ&s',
                        'rotate' => '-rotate-[2deg]',
                        'tape' => 'rotate-[-7deg]',
                        'tapePosition' => 'top-[-5px] left-5',
                        'size' => 'w-16 h-16',
                    ],
                    [
                        'label' => 'deltarune',
                        'note' => 'peak game (2)',
                        'image' =>
                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA_xfKtT2v5Pfpf5xyq_9w7i5uB4hzW-YfBg&s',
                        'rotate' => 'rotate-[1deg]',
                        'tape' => 'rotate-[4deg]',
                        'tapePosition' => 'top-[-6px] right-4',
                        'size' => 'w-15 h-15',
                    ],
                    [
                        'label' => 'ultrakill',
                        'note' => 'machine',
                        'image' =>
                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgQm6bPuU6msPMoyLktJBI2FZ2speRAz-fUw&s',
                        'rotate' => 'rotate-[1deg]',
                        'tape' => 'rotate-[6deg]',
                        'tapePosition' => 'top-[-5px] right-4',
                        'size' => 'w-15 h-15',
                    ],
                    [
                        'label' => 'geometry dash',
                        'note' => 'john geometry dash',
                        'image' => 'https://upload.wikimedia.org/wikipedia/id/3/35/Geometry_Dash_Logo.PNG',
                        'rotate' => '-rotate-[1.5deg]',
                        'tape' => 'rotate-[-6deg]',
                        'tapePosition' => 'top-[-5px] left-5',
                        'size' => 'w-16 h-16',
                    ],
                    [
                        'label' => 'die of death',
                        'note' => 'ahh, fresh meat',
                        'image' => 'https://pbs.twimg.com/media/Gwz1xNuXAAAMx3a.jpg',
                        'rotate' => 'rotate-[-2deg]',
                        'tape' => 'rotate-[8deg]',
                        'tapePosition' => 'top-[-5px] right-2',
                        'size' => 'w-15 h-15',
                    ],
                    [
                        'label' => 'grace',
                        'note' => 'i\'m parrying it oh',
                        'image' =>
                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF3ujNs4l_Mb0aKT12jxui9MR12cfQ08n__A&s',
                        'rotate' => '-rotate-[-2deg]',
                        'tape' => 'rotate-[-5deg]',
                        'tapePosition' => 'top-[-6px] left-3',
                        'size' => 'w-16 h-16',
                    ],
                    // [
                    //     'label' => 'typography',
                    //     'note' => 'fonts are fun',
                    //     'image' => 'https://placehold.co/96x96/ece4d6/8c7d6e?text=Aa',
                    //     'rotate' => '-rotate-[-4deg]',
                    //     'tape' => 'rotate-[-12deg]',
                    //     'tapePosition' => 'top-[-6px] left-2',
                    //     'size' => 'w-16 h-16',
                    // ],
                    // [
                    //     'label' => 'open source',
                    //     'note' => 'learning in public',
                    //     'image' => 'https://placehold.co/96x96/ece4d6/8c7d6e?text=%3C%2F%3E',
                    //     'rotate' => 'rotate-[1.5deg]',
                    //     'tape' => 'rotate-[11deg]',
                    //     'tapePosition' => 'top-[-5px] right-4',
                    //     'size' => 'w-14 h-14',
                    // ],
                ];
            @endphp

            <div class="flex flex-wrap gap-4 px-2">
                @foreach ($interests as $interest)
                    <div
                        class="group flex flex-col items-center gap-2 {{ $interest['rotate'] }} transition-transform duration-200 hover:rotate-0 hover:-translate-y-1">
                        <div class="relative {{ $interest['size'] }}">

                            <!-- tape -->
                            <span
                                class="absolute {{ $interest['tapePosition'] }} w-6 h-3 bg-paper-1 border border-ink/10 {{ $interest['tape'] }}"></span>

                            <!-- actual card -->
                            <div class="rounded-2xl border border-ink/10 bg-paper shadow-sm overflow-hidden">
                                <img src="{{ $interest['image'] }}" alt="{{ $interest['label'] }}"
                                    class="w-full h-full object-cover group-hover:scale-100 transition-transform duration-300">
                            </div>

                        </div>

                        <div class="text-center leading-tight">
                            <span class="block font-caveat text-sm text-ink-2">
                                {{ $interest['label'] }}
                            </span>
                            <span class="block font-caveat text-[10px] text-ink-3/70">
                                {{ $interest['note'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- TIMELINE --}}
        <section>
            <h2 class="font-caveat text-2xl text-ink mb-6 px-2">timeline</h2>
            @php
                $timeline = [
                    [
                        'year' => '2026',
                        'event' => 'started using laravel',
                        'note' => '2 weeks of laravel, started portlevtio.',
                    ],
                    [
                        'year' => '2025',
                        'event' => 'started moving to php',
                        'note' => 'pemberi harapan palsu.',
                    ],
                    [
                        'year' => '2024',
                        'event' => 'learned html',
                        'note' => 'index.html, style.css, main.js.',
                    ],
                    [
                        'year' => '2023',
                        'event' => 'started going to some cosplay event',
                        'note' => 'not really cosplaying myself that day, i was just started.',
                    ],
                    [
                        'year' => '200*',
                        'event' => 'i was born',
                        'note' => 'goo goo gaga',
                    ],
                ];
            @endphp
            <div class="flex flex-col">
                @foreach ($timeline as $i => $item)
                    <div class="flex gap-4 group">
                        <div class="flex flex-col items-end w-12 shrink-0 pt-1">
                            <span class="font-caveat text-lg text-accent font-bold">{{ $item['year'] }}</span>
                        </div>
                        <div
                            class="flex flex-col relative pl-6 pb-8 border-l-2 border-ink/10 group-last:border-transparent">
                            <span
                                class="absolute left-[-5px] top-2 w-2.5 h-2.5 rounded-full bg-paper border-2 border-accent/40 group-hover:border-accent transition-colors"></span>
                            <span class="font-caveat text-lg text-ink">{{ $item['event'] }}</span>
                            <span class="text-xs text-ink-3 mt-0.5">{{ $item['note'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ONLINE PRESENCE --}}
        <section>
            <h2 class="font-caveat text-2xl text-ink mb-6 px-2">online presence</h2>
            @php
                $platforms = [
                    [
                        'platform' => 'github',
                        'icon' => 'github',
                        'handle' => '@levtofer',
                        'url' => 'https://github.com/levtofer',
                    ],
                    [
                        'platform' => 'twitter/x',
                        'icon' => 'x',
                        'handle' => '@levtofer',
                        'url' => 'https://x.com/levtofer',
                    ],
                    [
                        'platform' => 'instagram',
                        'icon' => 'instagram',
                        'handle' => '@levtofer',
                        'url' => 'https://instagram.com/levtofer',
                    ],
                    [
                        'platform' => 'discord',
                        'icon' => 'discord',
                        'handle' => 'levtofer',
                        'url' => 'https://discord.gg/twPSFet8',
                    ],
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach ($platforms as $p)
                    <a href="{{ $p['url'] }}" target="_blank"
                        class="flex items-center gap-4 px-5 py-4 bg-paper border border-ink/10 rounded-xl hover:bg-paper-2 hover:-translate-y-0.5 transition-all duration-200 group">
                        <div
                            class="w-9 h-9 border border-ink/10 rounded-xl flex items-center justify-center bg-paper-2 shrink-0">
                            <img src="{{ asset('icons/' . $p['icon'] . '.svg') }}"
                                class="w-4 h-4 opacity-50 group-hover:opacity-100 transition-opacity"
                                alt="{{ $p['platform'] }}">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-caveat text-base text-ink">{{ $p['platform'] }}</span>
                            <span class="text-xs text-ink-3">{{ $p['handle'] }}</span>
                        </div>
                        <span
                            class="ml-auto text-xs text-ink-3 opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                    </a>
                @endforeach
            </div>
        </section>

    </div>
@endsection

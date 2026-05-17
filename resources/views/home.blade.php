@extends('layouts.app')

@section('title', 'home')

@section('content')

    {{-- HERO --}}
    <section
        class="bg-paper border border-ink/10 rounded-2xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden mb-8">

        <div class="absolute top-0 right-0 w-64 h-64 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

        {{-- left: text --}}
        <div class="order-2 md:order-1 flex-1 flex flex-col gap-4 z-10">
            <div
                class="flex items-center justify-center md:justify-start gap-2 text-xs uppercase tracking-widest text-ink-3 text-center md:text-left">
                <span class="hidden md:inline-block w-5 h-px bg-ink-3"></span>
                developer · artist · builder
            </div>
            <h1 class="font-lora text-4xl md:text-5xl text-ink leading-tight">
                hello, i make<br>
                <em class="text-accent">personal things.</em>
            </h1>
            <p class="text-sm text-ink-2 leading-relaxed max-w-sm">
                web pages, unfinished code projects, roblox games, blender models, original / cover musics, what else?
            </p>
            <div class="flex gap-3 flex-wrap mt-1">
                <a href="/works"
                    class="text-sm px-5 py-2 bg-ink text-paper rounded-lg hover:bg-accent transition-colors duration-200">
                    see my work
                </a>
                <a href="/guestbook"
                    class="text-sm px-5 py-2 border border-ink/15 text-ink-2 rounded-lg hover:bg-paper-2 transition-colors duration-200">
                    leave a note
                </a>
            </div>
        </div>

        {{-- right: profile image --}}
        <div class="order-1 md:order-2 relative shrink-0">
            <img src="{{ asset('images/profile.png') }}" alt="Levtofer""
                class="w-40 h-40 rounded-full border-2 border-ink/10 object-cover">
            <span
                class="absolute -top-2 -right-0 font-caveat text-xs text-accent bg-paper border border-accent/20 px-2 py-1 rounded-lg rotate-2">←
                wip</span>
            <span
                class="absolute -bottom-2 -left-3 font-caveat text-xs text-accent-3 bg-paper border border-accent-3/20 px-2 py-1 rounded-lg -rotate-2">made
                with ♡</span>
        </div>

    </section>

    {{-- FEATURED WORKS --}}
    <div class="flex items-center gap-3 mb-4">
        <span class="font-caveat text-lg text-ink-2">featured works</span>
        <span class="flex-1 h-px bg-ink/10"></span>
        <a href="/works" class="text-xs text-ink-3 hover:text-ink transition-colors">see all →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        @forelse($projects as $project)
            <a href="/works/{{ $project->slug }}"
                class="bg-paper border border-ink/10 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-200 block">
                <div class="h-28 bg-gradient-to-br from-accent/10 to-accent-3/10 flex items-center justify-center">
                    @if ($project->cover_image)
                        <img src="{{ $project->cover_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://placehold.co/400x160/faf7f2/8c7d6e?text=cover" alt="cover"
                            class="w-full h-full object-cover opacity-60">
                    @endif
                </div>
                <div class="p-4">
                    <div class="font-caveat text-base font-semibold text-ink mb-1">{{ $project->title }}</div>
                    <div class="text-xs text-ink-3 italic mb-3">{{ $project->description }}</div>
                    <div class="flex gap-2 flex-wrap">
                        @foreach ($project->tags ?? [] as $tag)
                            <span
                                class="text-xs px-2 py-0.5 bg-paper-2 border border-ink/10 rounded-full text-ink-3">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-3 bg-paper border border-ink/10 rounded-xl p-10 text-center">
                <p class="font-caveat text-xl text-ink-3">nothing here yet (TwT)</p>
            </div>
        @endforelse
    </div>

    {{-- RECENT NOTES --}}
    <div class="flex items-center gap-3 mb-4">
        <span class="font-caveat text-lg text-ink-2">recent notes</span>
        <span class="flex-1 h-px bg-ink/10"></span>
        <a href="/guestbook" class="text-xs text-ink-3 hover:text-ink transition-colors">see all →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        @forelse($notes as $note)
            <div class="bg-paper-2 border border-ink/10 rounded-xl p-4">
                <p class="font-caveat text-sm text-ink-2 leading-relaxed mb-3">"{{ $note->message }}"</p>
                <p class="text-xs text-ink-3">- {{ $note->name ?? 'anonymous' }}</p>
            </div>
        @empty
            <div class="col-span-3 bg-paper border border-ink/10 rounded-xl p-10 text-center">
                <p class="font-caveat text-xl text-ink-3">no notes yet - be the first (◠w◠)</p>
            </div>
        @endforelse
    </div>

@endsection

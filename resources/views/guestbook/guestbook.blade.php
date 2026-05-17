@extends('layouts.app')
@section('title', 'guestbook')

@section('content')
    <div class="flex flex-col gap-8 pb-10">

        {{-- HEADER --}}
        <div class="px-2">
            <div class="flex items-center gap-3 mb-1">
                <h1 class="font-caveat text-4xl text-ink">guestbook</h1>
                <span class="flex-1 h-px bg-ink/10"></span>
                <a href="/" class="text-xs text-ink-3 hover:text-ink transition-colors">go back →</a>
            </div>
            <p class="font-caveat text-sm text-ink-3">leave a note (>w<)< /p>
        </div>

        {{-- FORM --}}
        <section class="relative bg-paper border border-ink/10 rounded-2xl p-8"
            style="background-image: repeating-linear-gradient(transparent, transparent 27px, rgba(44,38,32,0.04) 28px); background-size: 100% 28px;">
            <span
                class="absolute -top-3 left-8 font-caveat text-xl text-ink-2 bg-paper px-3 py-1 rounded-md rotate-[-1deg] shadow-sm border border-ink/10">
                leave a note
            </span>

            @if (session('success'))
                <div
                    class="mb-6 font-caveat text-base text-accent-3 border border-accent-3/20 bg-accent-3/5 px-4 py-3 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('guestbook.store') }}" class="flex flex-col gap-5 pt-2">
                @csrf

                {{-- name --}}
                <div class="flex flex-col gap-1.5">
                    <label class="font-caveat text-lg text-ink-3">name <span
                            class="text-ink-3/50 text-base">(optional)</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="anonymous"
                        class="bg-transparent border-b border-ink/20 focus:border-accent/40 outline-none py-1.5 text-base text-ink font-caveat transition-colors placeholder:text-ink-3/40">
                </div>

                {{-- message --}}
                <div class="flex flex-col gap-1.5">
                    <label class="font-caveat text-lg text-ink-3">message</label>
                    <textarea name="message" rows="4" placeholder="say something nice..."
                        class="bg-transparent border-b border-ink/20 focus:border-accent/40 outline-none py-1.5 text-base text-ink font-caveat transition-colors placeholder:text-ink-3/40 resize-none leading-relaxed">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end mt-2">
                    <button type="submit"
                        class="font-caveat text-base text-ink-3 hover:text-ink border border-ink/15 px-5 py-2 rounded-lg hover:bg-paper-2 transition-all duration-200 hover:-translate-y-0.5 rotate-[-2deg] hover:rotate-0 active:scale-95">
                        leave a note →
                    </button>
                </div>

            </form>
        </section>

        {{-- NOTES WALL --}}
        <section>
            <div class="flex items-center gap-3 mb-6 px-2">
                <span class="font-caveat text-lg text-ink-2">notes left behind</span>
                <span class="flex-1 h-px bg-ink/10"></span>
                <span class="font-caveat text-xs text-ink-3">{{ $notes->total() }} notes</span>
            </div>

            @if ($notes->isEmpty())
                <div class="bg-paper border border-ink/10 rounded-xl p-10 text-center">
                    <p class="font-caveat text-xl text-ink-3">no notes yet - be the first (◠w◠)</p>
                </div>
            @else
                <div class="masonry-grid w-full after:content-[''] after:block after:clear-both">
                    <div class="masonry-sizer w-full sm:w-1/2 md:w-1/3"></div>

                    @foreach ($notes as $note)
                        @php
                            $rotations = [
                                '-rotate-[1deg]',
                                'rotate-[0.8deg]',
                                '-rotate-[0.5deg]',
                                'rotate-[1.2deg]',
                                '-rotate-[0.8deg]',
                            ];
                            $r = $rotations[$loop->index % count($rotations)];
                        @endphp
                        <div class="masonry-item w-full sm:w-1/2 md:w-1/3 float-left mb-3 px-1.5">
                            <div
                                class="bg-paper-2 border border-ink/10 rounded-xl p-5 {{ $r }} hover:rotate-0 hover:-translate-y-1 transition-all duration-200">
                                <p class="font-lora italic text-sm text-ink-2 leading-relaxed mb-4">
                                    "{{ $note->message }}"
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="font-caveat text-sm text-ink-3">— {{ $note->name ?? 'anonymous' }}</span>
                                    <span class="text-xs text-ink-3/50">{{ $note->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- pagination --}}
                @if ($notes->hasPages())
                    <div class="mt-6 flex justify-center gap-2">
                        @if ($notes->onFirstPage())
                            <span class="font-caveat text-sm text-ink-3/40 px-3 py-1">← prev</span>
                        @else
                            <a href="{{ $notes->previousPageUrl() }}"
                                class="font-caveat text-sm text-ink-3 hover:text-ink px-3 py-1 transition-colors">← prev</a>
                        @endif

                        <span class="font-caveat text-sm text-ink-3 px-3 py-1">{{ $notes->currentPage() }} /
                            {{ $notes->lastPage() }}</span>

                        @if ($notes->hasMorePages())
                            <a href="{{ $notes->nextPageUrl() }}"
                                class="font-caveat text-sm text-ink-3 hover:text-ink px-3 py-1 transition-colors">next →</a>
                        @else
                            <span class="font-caveat text-sm text-ink-3/40 px-3 py-1">next →</span>
                        @endif
                    </div>
                @endif

            @endif
        </section>

    </div>
@endsection

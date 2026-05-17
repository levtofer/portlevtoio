@extends('layouts.app')
@section('title', 'sketchbook')

@section('content')
<div class="flex flex-col gap-8 pb-10">

    {{-- HEADER --}}
    <div class="px-2">
        <div class="flex items-center gap-3 mb-1">
            <h1 class="font-caveat text-4xl text-ink">sketchbook</h1>
            <span class="flex-1 h-px bg-ink/10"></span>
        </div>
        <p class="font-caveat text-sm text-ink-3">things i made or found beautiful</p>
    </div>

    {{-- GRID --}}
    @if($items->isEmpty())
        <div class="bg-paper border border-ink/10 rounded-xl p-10 text-center">
            <p class="font-caveat text-xl text-ink-3">nothing pinned yet (TwT)</p>
        </div>
    @else
        <div class="masonry-grid w-full after:content-[''] after:block after:clear-both">
            <div class="masonry-sizer w-1/2 md:w-1/3 lg:w-1/4"></div>

            @foreach($items as $i => $item)
            @php
                $rotations = ['-rotate-[1.5deg]', 'rotate-[1deg]', '-rotate-[0.8deg]', 'rotate-[1.5deg]', '-rotate-[1deg]'];
                $r = $rotations[$i % count($rotations)];
            @endphp
            <div class="masonry-item w-1/2 md:w-1/3 lg:w-1/4 float-left mb-3 px-1.5">
                <div class="group relative bg-paper border border-ink/10 rounded-xl overflow-hidden {{ $r }} hover:rotate-0 hover:-translate-y-1 transition-all duration-200">

                    <img
                        src="{{ $item->image_url }}"
                        alt="{{ $item->title }}"
                        class="w-full object-cover"
                    >

                    {{-- hover overlay --}}
                    <div class="absolute inset-0 bg-ink/60 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex flex-col justify-end p-4">
                        @if($item->title)
                            <span class="font-caveat text-base text-paper">{{ $item->title }}</span>
                        @endif
                        @if($item->note)
                            <span class="font-lora italic text-xs text-paper/70 mt-0.5">{{ $item->note }}</span>
                        @endif
                        <span class="text-xs text-paper/40 mt-1">{{ $item->created_at->format('M d, Y') }}</span>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    @endif

</div>
@endsection
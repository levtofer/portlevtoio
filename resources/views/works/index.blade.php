@extends('layouts.app')
@section('title', 'works')

@section('content')
    <div class="pb-10 px-0 md:px-2">

        <div class="flex items-center gap-3 mb-8">
            <h1 class="font-caveat text-3xl text-ink">works</h1>
            <span class="flex-1 h-px bg-ink/10"></span>
            <a href="/" class="text-xs text-ink-3 hover:text-ink transition-colors">go back →</a>
        </div>

        @if ($projects->isEmpty())
            <div class="bg-paper border border-ink/10 rounded-xl p-10 text-center">
                <p class="font-caveat text-xl text-ink-3">nothing here yet (TwT)</p>
            </div>
        @else
            <div class="masonry-grid w-full">
                <div class="masonry-sizer w-1/2 md:w-1/3 lg:w-1/5"></div>

                @forelse($projects as $project)
                    <div class="masonry-item w-1/2 md:w-1/3 lg:w-1/5 float-left mb-1 md:mb-3 px-0.5 md:px-1.5">
                        <a href="/works/{{ $project->slug }}"
                            class="block bg-paper border border-ink/10 rounded-xl overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                            <div class="w-full overflow-hidden">
                                <img src="{{ $project->cover_url }}" alt="{{ $project->title }}"
                                    class="w-full object-cover">
                            </div>
                            <div class="p-3">
                                <div class="font-caveat text-sm font-semibold text-ink mb-1">{{ $project->title }}</div>
                                <div class="text-xs text-ink-3 italic mb-2">{{ $project->description }}</div>
                                <div class="flex gap-1 flex-wrap">
                                    @foreach ($project->tags ?? [] as $tag)
                                        <span
                                            class="text-xs px-2 py-0.5 bg-paper-2 border border-ink/10 rounded-full text-ink-3">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="bg-paper border border-ink/10 rounded-xl p-10 text-center w-full">
                        <p class="font-caveat text-xl text-ink-3">nothing here yet (TwT)</p>
                    </div>
                @endforelse

            </div>
        @endif

    </div>
@endsection

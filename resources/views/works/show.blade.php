@extends('layouts.app')
@section('title', $project->title)

@section('content')

    <div class="mb-6">
        <div class="flex items-center gap-3 mb-8">
            <a href="/works" class="text-xs text-ink-3 hover:text-ink transition-colors">← works</a>
            <span class="flex-1 h-px bg-ink/10"></span>
            <h1 class="font-caveat text-xl text-ink-3">{{ $project->title }}</h1>
        </div>
    </div>

    <div class="bg-paper border border-ink/10 rounded-2xl overflow-hidden mb-6">
        <img src="{{ $project->cover_url }}" alt="{{ $project->title }}" class="w-full max-h-72 object-cover">
        <div class="p-8">

            <div class="flex items-start justify-between gap-4 mb-4">
                <h1 class="font-caveat text-4xl text-ink">{{ $project->title }}</h1>
                @if($project->url)
                    <a href="{{ $project->url }}" target="_blank"
                       class="shrink-0 text-sm px-4 py-2 bg-ink text-paper rounded-lg hover:bg-accent transition-colors">
                        visit site →
                    </a>
                @endif
            </div>

            <p class="text-sm text-ink-2 leading-relaxed mb-6">{{ $project->description }}</p>

            @if($project->tech_stack)
            <div class="mb-6">
                <p class="text-xs uppercase tracking-widest text-ink-3 mb-2">built with</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach($project->tech_stack as $tech)
                        <span class="text-xs px-2 py-0.5 bg-paper-2 border border-ink/10 rounded-full text-ink-3">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            @if($project->tags)
            <div class="mb-6">
                <p class="text-xs uppercase tracking-widest text-ink-3 mb-2">tags</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach($project->tags as $tag)
                        <span class="text-xs px-2 py-0.5 bg-paper-2 border border-ink/10 rounded-full text-ink-3">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            @if($project->content)
            <div class="mt-6 pt-6 border-t border-ink/10">
                <p class="text-xs uppercase tracking-widest text-ink-3 mb-4">notes</p>
                <div class="prose prose-sm max-w-none text-ink-2">{!! $project->rendered_content !!}</div>
            </div>
            @endif

        </div>
    </div>

@endsection
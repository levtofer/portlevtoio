<aside
    class="sticky top-0 h-screen w-64 bg-paper border-r border-ink/10 flex flex-col gap-5 px-5 py-6 z-40 overflow-y-auto transition-transform duration-300 lg:translate-x-0 shrink-0 hidden lg:flex"
    :class="sidebarOpen ? '!flex !fixed' : ''">

    {{-- profile --}}
    <div class="flex flex-col items-center gap-2 pt-1">
        <img src="{{ asset('images/profile.png') }}" alt="Levtofer"
            class="w-16 h-16 rounded-full border-2 border-ink/10 object-cover shadow-sm">
        {{-- fallback if no image found --}}
        {{-- <div class="w-16 h-16 rounded-full bg-gradient-to-br from-accent to-accent-3 flex items-center justify-center font-caveat text-2xl text-paper shadow-sm">L</div> --}}
        <span class="font-caveat text-xl font-bold text-ink">Levtofer</span>
        <span class="text-xs text-ink-3 italic text-center leading-relaxed">
            <span class="inline-block w-2 h-2 rounded-full bg-accent-3 mr-1 animate-pulse"></span>
            building things slowly.
        </span>
        {{-- dark mode toggle --}}
        <button @click="toggle()"
            class="w-7 h-7 border border-ink/15 rounded-lg flex items-center justify-center hover:bg-paper-2 transition-all"
            :title="dark ? 'switch to light' : 'switch to dark'">
            <span x-show="!dark" class="text-xs">☀</span>
            <span x-show="dark" class="text-xs">☾</span>
        </button>
        <span class="text-xs text-ink-3 italic text-center leading-relaxed">
            (experimental!)
        </span>
    </div>

    <hr class="border-ink/10">

    {{-- navigation --}}
    <nav class="flex flex-col gap-1">
        @php
            $navItems = [
                ['label' => 'home', 'icon' => '⌂', 'route' => '/'],
                ['label' => 'works', 'icon' => '◈', 'route' => '/works'],
                ['label' => 'about', 'icon' => 'ⓘ', 'route' => '/about'],
                ['label' => 'tools', 'icon' => '⚙', 'route' => '/tools'],
                ['label' => 'gallery', 'icon' => '◻', 'route' => '/gallery'],
                ['label' => 'guestbook', 'icon' => '♡', 'route' => '/guestbook'],
                ['label' => 'reach me', 'icon' => '◎', 'route' => '/contact'],
            ];
        @endphp

        @foreach ($navItems as $item)
            @php
                $isActive = request()->is(ltrim($item['route'], '/') ?: '/');
                $activeClass = $isActive ? 'bg-paper-3 border-ink/10 text-ink font-medium' : '';
            @endphp
            <a href="{{ $item['route'] }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg text-ink-2 hover:bg-paper-2 border border-transparent hover:border-ink/10 transition-all duration-150 {{ $activeClass }}">
                <span class="text-sm opacity-50 w-4 text-center">{{ $item['icon'] }}</span>
                <span class="font-caveat text-base">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <hr class="border-ink/10">

    {{-- music widget --}}
    <div class="bg-paper-2 border border-ink/10 rounded-xl p-3" x-data="musicWidget()" x-init="init()">
        <p class="text-xs uppercase tracking-widest text-ink-3 mb-2">currently listening</p>
        <div class="font-caveat text-sm text-ink leading-snug" x-text="track"></div>
        <div class="text-xs text-ink-3 mt-1" x-text="artist"></div>
        <div class="flex gap-1 items-end h-4 mt-2">
            @foreach ([10, 8, 13, 9, 12, 8] as $i => $h)
                <span class="w-1 bg-accent-3 rounded-sm block"
                    style="height: {{ $h }}px; animation: musicBar 0.8s {{ $i * 0.12 }}s infinite alternate ease-in-out; transform-origin: bottom;"></span>
            @endforeach
        </div>
    </div>

    {{-- socials --}}
    <div class="flex gap-2 justify-center flex-wrap">
        <a href="https://github.com/levtofer" target="_blank"
            class="w-7 h-7 border border-ink/15 rounded-lg flex items-center justify-center hover:bg-paper-2 transition-all">
            <img src="{{ asset('icons/github.svg') }}" class="w-3.5 h-3.5 opacity-50 hover:opacity-100" alt="github">
        </a>
        <a href="#" target="_blank"
            class="w-7 h-7 border border-ink/15 rounded-lg flex items-center justify-center hover:bg-paper-2 transition-all">
            <img src="{{ asset('icons/x.svg') }}" class="w-3.5 h-3.5 opacity-50 hover:opacity-100" alt="x">
        </a>
        <a href="#" target="_blank"
            class="w-7 h-7 border border-ink/15 rounded-lg flex items-center justify-center hover:bg-paper-2 transition-all">
            <img src="{{ asset('icons/instagram.svg') }}" class="w-3.5 h-3.5 opacity-50 hover:opacity-100"
                alt="instagram">
        </a>
        <a href="#" target="_blank"
            class="w-7 h-7 border border-ink/15 rounded-lg flex items-center justify-center hover:bg-paper-2 transition-all">
            <img src="{{ asset('icons/discord.svg') }}" class="w-3.5 h-3.5 opacity-50 hover:opacity-100"
                alt="discord">
        </a>
    </div>

    {{-- doodle note --}}
    <div
        class="font-caveat text-xs text-ink-3 text-center border border-dashed border-ink/15 rounded-lg px-3 py-2 rotate-[-1deg] leading-relaxed mt-auto">
        making things slowly<br>since probably forever
    </div>

</aside>

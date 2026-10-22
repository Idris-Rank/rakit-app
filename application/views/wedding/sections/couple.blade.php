<section id="mempelai" class="batik px-6 py-24 md:py-32">
    <div class="mx-auto max-w-5xl text-center">
        <p class="ornament text-xs font-bold uppercase text-sogan">✦ ✦ ✦</p>
        <p class="mt-6 text-xs font-bold uppercase tracking-[.28em] text-jogja-700">Dengan memohon restu</p>
        <h2 class="mt-3 font-display text-5xl font-semibold md:text-6xl">Mempelai</h2>
        <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-jogja-700/75">Dengan penuh sukacita, kami mengundang Bapak/Ibu/Saudara untuk hadir dan memberikan doa restu pada hari bahagia kami.</p>
        <div class="mt-14 grid items-center gap-10 md:grid-cols-[1fr_auto_1fr]">
            <div class="reveal reveal-delay-1">
                <div class="mx-auto mb-5 h-36 w-36 overflow-hidden rounded-full border-4 border-white shadow-soft"><img src="{{ $couple['groom_photo_url'] }}" alt="{{ $couple['groom'] }}" class="h-full w-full object-cover"></div>
                <h3 class="font-display text-4xl font-semibold">{{ $couple['groom'] }}</h3><p class="mt-2 text-xs uppercase tracking-widest text-sogan">{{ $couple['groom_title'] }}</p><p class="mt-2 text-sm text-jogja-700/75">{{ $couple['groom_parents'][0] }}<br>& {{ $couple['groom_parents'][1] }}</p>
            </div>
            <div class="float font-display text-6xl italic text-sogan">&</div>
            <div class="reveal reveal-delay-2">
                <div class="mx-auto mb-5 h-36 w-36 overflow-hidden rounded-full border-4 border-white shadow-soft"><img src="{{ $couple['bride_photo_url'] }}" alt="{{ $couple['bride'] }}" class="h-full w-full object-cover"></div>
                <h3 class="font-display text-4xl font-semibold">{{ $couple['bride'] }}</h3><p class="mt-2 text-xs uppercase tracking-widest text-sogan">{{ $couple['bride_title'] }}</p><p class="mt-2 text-sm text-jogja-700/75">{{ $couple['bride_parents'][0] }}<br>& {{ $couple['bride_parents'][1] }}</p>
            </div>
        </div>
    </div>
</section>

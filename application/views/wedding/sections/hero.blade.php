<section class="hero-photo flex min-h-[720px] items-end justify-center px-6 pb-20 text-center text-white md:min-h-screen md:pb-28">
    <div class="hero-content max-w-3xl">
        <p class="mb-5 text-xs font-semibold uppercase tracking-[.35em] text-jogja-300">Undangan Pernikahan</p>
        <h1 class="font-display text-7xl font-medium leading-[.82] md:text-9xl">{{ $couple['groom'] }} <span class="text-jogja-300">&</span> {{ $couple['bride'] }}</h1>
        <div class="mx-auto mt-8 h-px w-24 bg-jogja-300"></div>
        <p class="mt-6 font-display text-2xl italic md:text-3xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
        <p class="mt-5 text-sm tracking-wider text-white/80">{{ $event['date'] }} · {{ $event['venue'] }}</p>
        <div id="countdown" data-target="{{ $event['target'] }}" class="mx-auto mt-8 grid max-w-sm grid-cols-4 gap-2 text-center">
            <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="days" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Hari</span></div>
            <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="hours" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Jam</span></div>
            <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="minutes" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Menit</span></div>
            <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="seconds" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Detik</span></div>
        </div>
        <a href="#acara" class="mt-9 inline-flex rounded-full border border-jogja-300 bg-jogja-700/70 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] transition hover:bg-jogja-500">Lihat Undangan</a>
    </div>
</section>

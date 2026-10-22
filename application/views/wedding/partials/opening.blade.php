<div id="opening" class="opening fixed inset-0 z-50 flex items-center justify-center bg-jogja-900 px-6 text-center text-white">
    <div class="opening-card max-w-md">
        <p class="ornament text-xs font-bold text-jogja-300">✦ ✦ ✦</p>
        <p class="mt-7 text-xs font-semibold uppercase tracking-[.3em] text-jogja-300">Undangan Pernikahan</p>
        <h1 class="mt-4 font-display text-7xl leading-none">Raka <span class="text-jogja-300">&</span> Sekar</h1>
        <p class="mt-6 text-sm text-white/70">Kepada Yth. Bapak/Ibu/Saudara/i</p>
        <p class="mt-1 font-display text-2xl italic text-white/90">Tamu Undangan</p>
        <button id="open-invitation" type="button" class="mt-9 rounded-full bg-jogja-300 px-8 py-3 text-xs font-bold uppercase tracking-[.2em] text-jogja-900 transition hover:bg-white">Buka Undangan</button>
        <p class="mt-5 text-[11px] text-white/45">Mohon maaf apabila terdapat kesalahan penulisan nama atau gelar.</p>
    </div>
</div>
<audio id="wedding-audio" loop preload="none" data-audio-url="{{ $audio_url }}"></audio>
<button id="music-toggle" type="button" aria-label="Putar musik" class="music-button fixed bottom-5 right-5 z-30 hidden items-center gap-2 rounded-full bg-jogja-900 px-4 py-3 text-xs font-bold text-white shadow-soft transition hover:bg-sogan">
    <span class="music-bars flex h-4 items-end gap-1"><span class="h-2 w-1 rounded bg-jogja-300"></span><span class="h-3 w-1 rounded bg-jogja-300"></span><span class="h-1.5 w-1 rounded bg-jogja-300"></span></span>
    <span id="music-label">Putar musik</span>
</button>

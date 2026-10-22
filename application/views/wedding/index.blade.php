<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Undangan pernikahan Jawa Raka dan Sekar.">
    <title>Raka & Sekar — Undangan Pernikahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jogja: { 50: '#fbf8f1', 100: '#f4ead6', 300: '#d6b878', 500: '#a87a32', 700: '#6d431c', 900: '#2d1b12' },
                        sogan: '#7b2d26',
                        sage: '#68745f'
                    },
                    fontFamily: {
                        display: ['Cormorant Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    boxShadow: { soft: '0 20px 60px rgba(45, 27, 18, .12)' }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { background: #fbf8f1; color: #2d1b12; }
        .batik { background-image: radial-gradient(circle at 50% 50%, transparent 0 6px, rgba(168,122,50,.13) 7px 8px, transparent 9px), radial-gradient(circle at 0 0, rgba(123,45,38,.09) 0 3px, transparent 4px); background-size: 44px 44px, 22px 22px; }
        .ornament { letter-spacing: .45em; }
        .hero-photo { background-image: linear-gradient(180deg, rgba(45,27,18,.08), rgba(45,27,18,.6)), url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=85'); background-size: cover; background-position: center; animation: heroZoom 14s ease-out both; }
        .hero-content { animation: fadeUp 1.2s .15s ease-out both; }
        .float { animation: float 4s ease-in-out infinite; }
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity .8s ease, transform .8s ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: .12s; }
        .reveal-delay-2 { transition-delay: .24s; }
        .reveal-delay-3 { transition-delay: .36s; }
        body.is-locked { overflow: hidden; }
        .opening { transition: opacity .8s ease, visibility .8s ease; }
        .opening.is-hidden { opacity: 0; visibility: hidden; pointer-events: none; }
        .opening-card { animation: fadeUp 1s ease-out both; }
        .music-button.is-playing .music-bars span { animation: musicBar .8s ease-in-out infinite alternate; }
        .music-bars span:nth-child(2) { animation-delay: .15s; }
        .music-bars span:nth-child(3) { animation-delay: .3s; }
        @keyframes musicBar { from { height: 5px; } to { height: 15px; } }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(28px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes heroZoom { from { background-size: 108%; } to { background-size: 100%; } }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-8px) rotate(2deg); } }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .01ms !important; } .reveal { opacity: 1; transform: none; } }
    </style>
</head>
<body class="is-locked font-sans antialiased">
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
    <nav class="absolute inset-x-0 top-0 z-20 mx-auto flex max-w-6xl items-center justify-between px-6 py-6 text-white">
        <a href="#home" class="font-display text-2xl font-semibold tracking-wide">R<span class="text-jogja-300">&</span>S</a>
        <div class="hidden gap-7 text-xs font-semibold uppercase tracking-[.18em] md:flex">
            <a href="#mempelai" class="transition hover:text-jogja-300">Mempelai</a>
            <a href="#acara" class="transition hover:text-jogja-300">Acara</a>
            <a href="#cerita" class="transition hover:text-jogja-300">Cerita</a>
            <a href="#rsvp" class="transition hover:text-jogja-300">RSVP</a>
        </div>
    </nav>

    <main id="home">
        <section class="hero-photo flex min-h-[720px] items-end justify-center px-6 pb-20 text-center text-white md:min-h-screen md:pb-28">
            <div class="hero-content max-w-3xl">
                <p class="mb-5 text-xs font-semibold uppercase tracking-[.35em] text-jogja-300">Undangan Pernikahan</p>
                <h1 class="font-display text-7xl font-medium leading-[.82] md:text-9xl">Raka <span class="text-jogja-300">&</span> Sekar</h1>
                <div class="mx-auto mt-8 h-px w-24 bg-jogja-300"></div>
                <p class="mt-6 font-display text-2xl italic md:text-3xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
                <p class="mt-5 text-sm tracking-wider text-white/80">{{ $event['date'] }} · Yogyakarta</p>
                <div id="countdown" data-target="{{ $event['target'] }}" class="mx-auto mt-8 grid max-w-sm grid-cols-4 gap-2 text-center">
                    <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="days" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Hari</span></div>
                    <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="hours" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Jam</span></div>
                    <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="minutes" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Menit</span></div>
                    <div class="rounded bg-black/20 px-2 py-3"><strong data-unit="seconds" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Detik</span></div>
                </div>
                <a href="#acara" class="mt-9 inline-flex rounded-full border border-jogja-300 bg-jogja-700/70 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] transition hover:bg-jogja-500">Lihat Undangan</a>
            </div>
        </section>

        <section id="mempelai" class="batik px-6 py-24 md:py-32">
            <div class="mx-auto max-w-5xl text-center">
                <p class="ornament text-xs font-bold uppercase text-sogan">✦ ✦ ✦</p>
                <p class="mt-6 text-xs font-bold uppercase tracking-[.28em] text-jogja-700">Dengan memohon restu</p>
                <h2 class="mt-3 font-display text-5xl font-semibold md:text-6xl">Mempelai</h2>
                <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-jogja-700/75">Dengan penuh sukacita, kami mengundang Bapak/Ibu/Saudara untuk hadir dan memberikan doa restu pada hari bahagia kami.</p>
                <div class="mt-14 grid items-center gap-10 md:grid-cols-[1fr_auto_1fr]">
                    <div class="reveal reveal-delay-1">
                        <div class="mx-auto mb-5 h-36 w-36 overflow-hidden rounded-full border-4 border-white shadow-soft"><img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=500&q=80" alt="Raka" class="h-full w-full object-cover"></div>
                        <h3 class="font-display text-4xl font-semibold">Raden Raka</h3>
                        <p class="mt-2 text-xs uppercase tracking-widest text-sogan">Putra pertama</p>
                        <p class="mt-2 text-sm text-jogja-700/75">Bapak Suryanto<br>& Ibu Ratih</p>
                    </div>
                    <div class="float font-display text-6xl italic text-sogan">&</div>
                    <div class="reveal reveal-delay-2">
                        <div class="mx-auto mb-5 h-36 w-36 overflow-hidden rounded-full border-4 border-white shadow-soft"><img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=500&q=80" alt="Sekar" class="h-full w-full object-cover"></div>
                        <h3 class="font-display text-4xl font-semibold">Rara Sekar</h3>
                        <p class="mt-2 text-xs uppercase tracking-widest text-sogan">Putri kedua</p>
                        <p class="mt-2 text-sm text-jogja-700/75">Bapak Haryono<br>& Ibu Lestari</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="acara" class="bg-jogja-900 px-6 py-24 text-white md:py-32">
            <div class="mx-auto max-w-5xl">
                <div class="text-center"><p class="text-xs font-bold uppercase tracking-[.3em] text-jogja-300">Catat tanggalnya</p><h2 class="mt-3 font-display text-5xl md:text-6xl">Rangkaian Acara</h2></div>
                <div class="mt-14 grid gap-6 md:grid-cols-2">
                    <article class="reveal reveal-delay-1 border border-white/15 bg-white/5 p-8 text-center backdrop-blur"><p class="text-xs font-bold uppercase tracking-[.25em] text-jogja-300">Akad Nikah</p><h3 class="mt-5 font-display text-4xl">Minggu, 20 Oktober 2026</h3><p class="mt-4 text-sm text-white/70">08.00 — 10.00 WIB</p><div class="my-6 h-px bg-white/15"></div><p class="text-sm leading-6 text-white/75">Pendopo Agung<br>Jl. Parangtritis No. 88, Yogyakarta</p></article>
                    <article class="reveal reveal-delay-2 border border-jogja-500/50 bg-sogan/20 p-8 text-center"><p class="text-xs font-bold uppercase tracking-[.25em] text-jogja-300">Resepsi</p><h3 class="mt-5 font-display text-4xl">Minggu, 20 Oktober 2026</h3><p class="mt-4 text-sm text-white/70">11.00 — 14.00 WIB</p><div class="my-6 h-px bg-white/15"></div><p class="text-sm leading-6 text-white/75">Pendopo Agung<br>Jl. Parangtritis No. 88, Yogyakarta</p></article>
                </div>
                <div class="mt-12 text-center"><a href="https://maps.google.com/?q=Yogyakarta" target="_blank" class="inline-flex rounded-full bg-jogja-300 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] text-jogja-900 transition hover:bg-white">Buka Google Maps</a></div>
            </div>
        </section>

        <section id="cerita" class="px-6 py-24 md:py-32"><div class="mx-auto grid max-w-5xl items-center gap-12 md:grid-cols-2"><div class="reveal overflow-hidden shadow-soft"><img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=85" alt="Dekorasi pernikahan Jawa" class="h-[420px] w-full object-cover"></div><div class="reveal reveal-delay-1"><p class="text-xs font-bold uppercase tracking-[.3em] text-sogan">Sebuah cerita</p><h2 class="mt-3 font-display text-5xl font-semibold">Dari salam menjadi janji.</h2><p class="mt-6 text-sm leading-8 text-jogja-700/80">Berawal dari pertemuan sederhana di sebuah sore di Yogyakarta, kami belajar bahwa cinta tumbuh dari perhatian-perhatian kecil. Dengan restu keluarga, kami melangkah menuju perjalanan baru.</p><p class="mt-5 font-display text-2xl italic text-sogan">“Tresna iku tuwuh saka ati.”</p></div></div></section>

        <section id="rsvp" class="bg-jogja-100 px-6 py-24 text-center md:py-28"><div class="mx-auto max-w-xl"><p class="text-xs font-bold uppercase tracking-[.3em] text-sogan">Kehadiran dan doa restu</p><h2 class="mt-3 font-display text-5xl font-semibold">Sampai jumpa di hari bahagia kami</h2><p class="mt-5 text-sm leading-7 text-jogja-700/75">Merupakan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara berkenan hadir. Silakan konfirmasi kehadiran melalui tombol di bawah.</p><a href="https://wa.me/6281234567890?text=Halo%20Raka%20dan%20Sekar%2C%20saya%20akan%20hadir." target="_blank" class="mt-8 inline-flex rounded-full bg-sogan px-8 py-3 text-xs font-bold uppercase tracking-[.2em] text-white transition hover:bg-jogja-900">Konfirmasi Kehadiran</a></div></section>
    </main>

    <footer class="bg-jogja-900 px-6 py-10 text-center text-white"><p class="font-display text-3xl">Raka <span class="text-jogja-300">&</span> Sekar</p><p class="mt-3 text-xs text-white/50">Made with love · Yogyakarta · 2026</p></footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var body = document.body;
            var opening = document.getElementById('opening');
            var openButton = document.getElementById('open-invitation');
            var audio = document.getElementById('wedding-audio');
            var musicButton = document.getElementById('music-toggle');
            var musicLabel = document.getElementById('music-label');
            var audioUrl = audio && audio.getAttribute('data-audio-url');
            var hasAudio = Boolean(audioUrl);
            if (hasAudio) audio.setAttribute('src', audioUrl);

            if (hasAudio) musicButton.classList.remove('hidden');
            openButton.addEventListener('click', function () {
                opening.classList.add('is-hidden');
                body.classList.remove('is-locked');
                if (hasAudio) audio.play().then(function () {
                    musicButton.classList.add('is-playing');
                    musicLabel.textContent = 'Jeda musik';
                }).catch(function () {});
            });
            musicButton.addEventListener('click', function () {
                if (audio.paused) {
                    audio.play(); musicButton.classList.add('is-playing'); musicLabel.textContent = 'Jeda musik';
                } else {
                    audio.pause(); musicButton.classList.remove('is-playing'); musicLabel.textContent = 'Putar musik';
                }
            });

            var countdown = document.getElementById('countdown');
            var target = new Date(countdown.getAttribute('data-target')).getTime();
            function updateCountdown() {
                var remaining = Math.max(0, target - Date.now());
                var values = {
                    days: Math.floor(remaining / 86400000),
                    hours: Math.floor(remaining / 3600000) % 24,
                    minutes: Math.floor(remaining / 60000) % 60,
                    seconds: Math.floor(remaining / 1000) % 60
                };
                Object.keys(values).forEach(function (unit) { countdown.querySelector('[data-unit="' + unit + '"]').textContent = String(values[unit]).padStart(2, '0'); });
            }
            updateCountdown();
            setInterval(updateCountdown, 1000);

            var revealItems = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                revealItems.forEach(function (item) { item.classList.add('is-visible'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries, currentObserver) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        currentObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            revealItems.forEach(function (item) { observer.observe(item); });
        });
    </script>
</body>
</html>

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
                    colors: { jogja: { 50: '#fbf8f1', 100: '#f4ead6', 300: '#d6b878', 500: '#a87a32', 700: '#6d431c', 900: '#2d1b12' }, sogan: '#7b2d26', sage: '#68745f' },
                    fontFamily: { display: ['Cormorant Garamond', 'serif'], sans: ['Plus Jakarta Sans', 'sans-serif'] },
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
        .batik { background-image: radial-gradient(circle at 50% 50%, transparent 0 6px, rgba(168, 122, 50, .13) 7px 8px, transparent 9px), radial-gradient(circle at 0 0, rgba(123, 45, 38, .09) 0 3px, transparent 4px); background-size: 44px 44px, 22px 22px; }
        .ornament { letter-spacing: .45em; }
        .hero-photo { background-image: linear-gradient(180deg, rgba(45, 27, 18, .08), rgba(45, 27, 18, .6)), url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=85'); background-size: cover; background-position: center; animation: heroZoom 14s ease-out both; }
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
    @yield('content')
    @include('wedding.partials.script')
</body>
</html>

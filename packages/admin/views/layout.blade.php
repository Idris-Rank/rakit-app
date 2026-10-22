<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }} — Rakit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { ink: '#2d1b12', gold: '#b88a3b', cream: '#fbf8f1', sogan: '#7b2d26' } } } };</script>
</head>
<body class="min-h-screen bg-cream text-ink">
    <div class="flex min-h-screen flex-col md:flex-row">
        <aside class="w-full bg-ink p-6 text-white md:w-64">
            <p class="text-xs font-bold uppercase tracking-[.3em] text-gold">Rakit Admin</p>
            <h1 class="mt-3 font-serif text-3xl">Raka <span class="text-gold">&</span> Sekar</h1>
            <?php $admin_uri = trim(Request::uri(), '/'); ?>
            <nav class="mt-10 space-y-2 text-sm">
                <a href="{{ url('admin') }}" class="block rounded-lg px-4 py-3 transition {{ 'admin' === $admin_uri ? 'bg-white/10 font-semibold text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">Dashboard</a>
                <a href="{{ url('admin/settings') }}" class="block rounded-lg px-4 py-3 transition {{ 'admin/settings' === $admin_uri ? 'bg-white/10 font-semibold text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">Pengaturan Undangan</a>
                <a href="{{ url('admin/users') }}" class="block rounded-lg px-4 py-3 transition {{ 0 === strpos($admin_uri, 'admin/users') ? 'bg-white/10 font-semibold text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">Users</a>
                <a href="{{ url('/') }}" class="block rounded-lg px-4 py-3 transition hover:bg-white/10">Lihat Undangan ↗</a>
                <a href="{{ url('admin/logout') }}" class="block rounded-lg px-4 py-3 text-white/70 transition hover:bg-white/10 hover:text-white">Keluar</a>
            </nav>
        </aside>
        <main class="min-w-0 flex-1 p-6 md:p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>

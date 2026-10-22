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
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <section class="w-full max-w-md rounded-2xl border border-ink/10 bg-white p-8 shadow-lg">
            <p class="text-xs font-bold uppercase tracking-[.3em] text-gold">Rakit Admin</p>
            <h1 class="mt-3 text-3xl font-bold">Masuk ke dashboard</h1>
            <p class="mt-2 text-sm text-ink/60">Kelola konten undangan Raka & Sekar.</p>

            @if (isset($error))
                <div class="mt-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">{{ $error }}</div>
            @endif

            <form method="post" action="{{ url('admin/login') }}" class="mt-8 space-y-5">
                {{-- CSRF protection is compiled by the Rakit Blade engine. --}}
                @csrf
                <label class="block text-sm font-semibold">Email
                    <input type="email" name="email" value="{{ isset($email) ? $email : '' }}" required autofocus class="mt-2 w-full rounded-lg border border-ink/15 px-3 py-3 text-sm outline-none transition focus:border-sogan">
                </label>
                <label class="block text-sm font-semibold">Password
                    <input type="password" name="password" required class="mt-2 w-full rounded-lg border border-ink/15 px-3 py-3 text-sm outline-none transition focus:border-sogan">
                </label>
                <button type="submit" class="w-full rounded-lg bg-sogan px-5 py-3 text-sm font-semibold text-white transition hover:bg-ink">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>

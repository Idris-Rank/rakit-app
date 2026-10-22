@layout('admin::layout')

@section('content')
<div class="mx-auto max-w-6xl"><div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end"><div><p class="text-xs font-bold uppercase tracking-[.25em] text-sogan">Control center</p><h2 class="mt-2 text-3xl font-bold">{{ $page_title }}</h2><p class="mt-2 text-sm text-ink/60">Kelola seluruh konten website undangan dari satu tempat.</p></div><a href="{{ url('admin/settings') }}" class="inline-flex w-fit rounded-lg bg-sogan px-5 py-3 text-sm font-semibold text-white transition hover:bg-ink">Mulai mengatur data</a></div><div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
@foreach ($sections as $section)
<article class="rounded-2xl border border-ink/10 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"><div class="flex items-start justify-between gap-3"><h3 class="font-bold">{{ $section['title'] }}</h3><span class="rounded-full bg-gold/15 px-2 py-1 text-[10px] font-bold uppercase tracking-wide text-sogan">{{ $section['status'] }}</span></div><p class="mt-4 text-sm leading-6 text-ink/60">{{ $section['description'] }}</p><a href="{{ url('admin/settings') }}" class="mt-5 inline-block text-xs font-bold uppercase tracking-wider text-sogan">Kelola →</a></article>
@endforeach
</div><div class="mt-8 rounded-2xl border border-gold/40 bg-gold/10 p-5 text-sm leading-6 text-ink/75"><strong>Catatan keamanan:</strong> akses dashboard ini dilindungi autentikasi berbasis session. Gunakan HTTPS pada environment production.</div></div>
@endsection

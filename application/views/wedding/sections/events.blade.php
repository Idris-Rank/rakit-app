<section id="acara" class="bg-jogja-900 px-6 py-24 text-white md:py-32">
    <div class="mx-auto max-w-5xl">
        <div class="text-center"><p class="text-xs font-bold uppercase tracking-[.3em] text-jogja-300">Catat tanggalnya</p><h2 class="mt-3 font-display text-5xl md:text-6xl">Rangkaian Acara</h2></div>
        <div class="mt-14 grid gap-6 md:grid-cols-2">
            @foreach ($events as $event_item)
            <article class="reveal reveal-delay-{{ $event_item->sort_order }} {{ 2 == $event_item->sort_order ? 'border border-jogja-500/50 bg-sogan/20' : 'border border-white/15 bg-white/5' }} p-8 text-center backdrop-blur"><p class="text-xs font-bold uppercase tracking-[.25em] text-jogja-300">{{ $event_item->name }}</p><h3 class="mt-5 font-display text-4xl">{{ $event_item->date_label }}</h3><p class="mt-4 text-sm text-white/70">{{ $event_item->time_label }}</p><div class="my-6 h-px bg-white/15"></div><p class="text-sm leading-6 text-white/75">{{ $event_item->venue }}<br>{{ $event_item->address }}</p></article>
            @endforeach
        </div>
        <div class="mt-12 text-center"><a href="{{ $event['maps_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex rounded-full bg-jogja-300 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] text-jogja-900 transition hover:bg-white">Buka Google Maps</a></div>
    </div>
</section>

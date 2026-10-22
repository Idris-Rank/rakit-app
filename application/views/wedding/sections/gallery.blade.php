@if (count($galleries) > 0)
<section id="galeri" class="bg-jogja-50 px-6 py-24 md:py-32">
    <div class="mx-auto max-w-5xl">
        <div class="text-center"><p class="text-xs font-bold uppercase tracking-[.3em] text-sogan">Momen pilihan</p><h2 class="mt-3 font-display text-5xl font-semibold">Galeri</h2></div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($galleries as $gallery)
                <figure class="reveal overflow-hidden rounded-xl bg-white shadow-soft"><img src="{{ $gallery->image_url }}" alt="{{ $gallery->alt_text }}" class="h-72 w-full object-cover"><figcaption class="p-4 text-sm text-ink/70">{{ $gallery->caption }}</figcaption></figure>
            @endforeach
        </div>
    </div>
</section>
@endif

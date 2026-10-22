@layout('wedding.layouts.wedding')

@section('content')
    @include('wedding.partials.opening')
    @include('wedding.partials.navigation')

    <main id="home">
        @include('wedding.sections.hero')
        @include('wedding.sections.couple')
        @include('wedding.sections.events')
        @include('wedding.sections.story')
        @include('wedding.sections.rsvp')
    </main>

    @include('wedding.partials.footer')
@endsection

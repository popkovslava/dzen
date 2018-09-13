@extends('layouts.default_static')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop

@section('content')
    @include('sections.gallery.gallery-simple')
    <div class="after-parallax">
        <section class="works-filter section-gray">
            @if($works)
                <h2>Our works</h2>
                <section id="works">
                    <works
                            :prop-works="{{ json_encode($works) }}"
                            :prop-stacks="{{ json_encode($stacks) }}"
                    ></works>
                </section>
            @endif

        </section>
        @include('sections.video')
        @include('sections.banner-bottom')
    </div>
@stop


@section('footerjs')
    <script src="/js/works.js"></script>
    <script src="/js/vue-root-app.js"></script>
@endsection
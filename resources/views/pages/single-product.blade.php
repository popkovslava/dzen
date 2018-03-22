@extends('layouts.default_static')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop

@section('content')
    @include('sections.gallery.gallery-product')
    <div class="after-parallax">

    @if($page->work)

            <section class="section-gray case">
                <div class="container">
                    <article>
                        <h3 class="ta-center">{!!$page->work->title1 !!}</h3>
                        <div class="case-text">{!!$page->work->text1 !!}</div>
                    </article>
                    <article>
                        <h3 class="ta-center">{!! $page->work->title2 !!}</h3>
                        <div class="case-text">{!!$page->work->text2!!}</div>
                    </article>
                    <article>
                        @include('sections.stack-block')
                    </article>
                </div>
            </section>

    @endif
    @if($page->work)
        @include('sections.gallery.gallery-gallery-stack-1')
        @include('sections.gallery.gallery-gallery-stack-2')
        @include('sections.one-client-too')

        @include('sections.gallery.gallery-gallery-stack-3')
        @include('sections.video')
        @include('sections.banner-bottom')
    @endif
    </div>

@stop


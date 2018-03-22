
@extends('layouts.default_static')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop


@section('content')

    @include('sections.gallery.gallery-main')
    <div class="after-parallax">
            @include('sections.one-client-tree')
            {!! $page->text !!}
            @include('sections.gallery.client-gallery')
            @include('sections.banner-bottom')
    </div>

@stop

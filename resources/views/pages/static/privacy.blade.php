@extends('layouts.default_static')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop

@section('content')
    {!! $page->text  !!}
@endsection

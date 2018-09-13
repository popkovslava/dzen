@extends('layouts.default')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop

@section('content')
    {!! $page->text or '' !!}
@stop






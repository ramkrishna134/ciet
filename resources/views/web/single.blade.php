@extends('layouts.app')

@section('title'){{ $page->title }} @endsection
@section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection

@section('content')

<img class="img-fluid" style="width: 100%" src="{{ $page->featured_icon }}" alt="">

<div class="content">
    <div class="container">
        {!! $page->content !!}
    </div>
</div>


@endsection
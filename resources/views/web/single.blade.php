@extends('layouts.app')

@section('content')

<div class="content mt-2">
    <h2 class="text-center">{{ $page->title }}</h2>

    <div class="container">
        {!! $page->content !!}
    </div>
</div>


@endsection
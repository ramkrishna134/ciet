@extends('layouts.app')

@section('title'){{ $page->title }} | @endsection
@section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('{{ $page->featured_icon }}')">
    <div class="container">
        <div class="content">
            <h1 class="title">{{ $page->title }}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                </ol>
              </nav>
        </div>
        
    </div>
</section>


<div class="page-content">
    <div class="container">
        {!! $page->content !!}
    </div>
</div>



@endsection
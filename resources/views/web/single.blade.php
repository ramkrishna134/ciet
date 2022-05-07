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


<div class="general-page" id="main-content">
    <div class="with-watermark">
        <img class="img-fluid" src="/images/web/logo-mark.png" alt="Watermark of CIET LOGO">
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>

@endsection
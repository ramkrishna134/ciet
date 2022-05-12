@extends('layouts.app')

@section('title'){{ $initiative->name }} | @endsection
@section('description'){{ $initiative->description }}@endsection
@section('image'){{ url("/") }}{{ $initiative->icon }}@endsection
@section('keyword'){{ $initiative->key_word }}@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">{{ $initiative->name }}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('initiative') }}">Initiatives</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $initiative->name }}</li>
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
                {!! $initiative->content !!}
            </div>
        </div>
    </div>
</div>

@endsection
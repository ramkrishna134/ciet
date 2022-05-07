@extends('layouts.app')

@section('title'){{ $event->title }} | @endsection
@section('description'){{ $event->description }}@endsection
@section('image'){{ $event->featured_icon }}@endsection
@section('keyword'){{ json_decode($event->key_word) }}@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('{{ $event->featured_image }}')">
    <div class="container">
        <div class="content">
            <h1 class="title">{{ $event->title }}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('calender') }}">Calender</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
                </ol>
            </nav>
        </div>
        
    </div>
</section>


<div class="general-page" id="main-content mb-5">
    <div class="with-watermark">
        <img class="img-fluid" src="/images/web/logo-mark.png" alt="Watermark of CIET LOGO">
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                {!! $event->content !!}
            </div>
        </div>
    </div>
</div>

@endsection
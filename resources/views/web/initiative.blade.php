@php
    $lang = $_GET['lang'] ?? null;
@endphp
@extends('layouts.app')

@section('title')Digital education initiatives | @endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">Digital education initiatives</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Digital education initiatives</li>
                    </ol>
                </nav>
            </div>

        </div>
    </section>

    <section class="websites" id="main-content">

        <div class="container web-wrap">

            <div class="heading text-center text-primary">Access and use of Digital initiatives of NCERT under the aegis of MoE-Govt. of India</div>
            
            <div class="row justify-content-center mt-3">
                <div class="col-sm-10">

                    
                    @foreach($initiatives as $item)


                    <div class="row web-item align-items-center">
                        <div class="col-sm-3 image-wrap text-center">
                            <div class="image">
                                <img class="img-fluid" src="{{ $item->icon }}" alt="{{ $item->name }} Logo">
                            </div>
                        </div>

                        <div class="col-sm-9 details-wrap">
                            <div class="details">
                                <div class="title">{{ $item->name }}</div>
                                <p>{{ substr($item->description, 0,  500) }} @if(!empty($item->content
                                ))<a href="/initiative/{{ $item->slug }}{{ $lang ? "?lang=".$lang : ""  }}"><strong>Read More</strong></a>@endif </p>

                                <div class="icons">
                                    <a href="{{ $item->web_link }}" class="item bg-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visit Website" target="_blank"><i class="fas fa-globe"></i></a>
                                    @if(!empty($item->play_store))
                                    <a href="{{ $item->play_store }}" class="item bg-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Get it on Play Store" target="_blank"><i class="fab fa-google-play"></i></a>
                                    @endif

                                    @if(!empty($item->apple_store))
                                    <a href="{{ $item->apple_store }}" class="item bg-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Get it on Apple Store" target="_blank"><i class="fab fa-apple"></i></a>
                                    @endif

                                    @if(!empty($item->window_store))
                                    <a href="{{ $item->window_store }}" class="item bg-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Get it on Windows Store" target="_blank"><i class="fab fa-windows"></i></a>
                                    @endif

                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <div class="pagination-wrap pb-4">
                        {!! $initiatives->links() !!}
                    </div>


                </div>
            </div>
        </div>
       

    </section>


    @endsection
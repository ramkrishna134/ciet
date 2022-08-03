@extends('layouts.app')

@section('title'){{ $book->name }} | Audio Book | @endsection
@section('description')@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')


<section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">{{ $book->name }}</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('audio.list') }}">Audio Books</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $book->name }}</li>
                </ol>
            </nav>
        </div>

    </div>
</section>

<section class="page-content audio-book" id="main-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <div class="row ">
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-body d-flex justify-content-center">
                                <img class="img-fluid" src="{{ $book->cover }}" alt="{{ $book->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="heading mb-0">{{ $book->name }}</div>
                        <div class="class mb-3">
                            @php
                            $class = intval($book->class);
                            @endphp
                            @if($class <= 12)
                            <strong>Class {{ $book->class }}</strong>
                            @else
                            <strong>{{ $book->class }}</strong>
                            @endif
                        </div>

                        <hr>
                        <div class="audio-list pt-3">
                            @foreach($audios as $audio)
                            <div class="audio-wrap">
                                <div class="title">{{ $audio->name }}</div>
                                <audio preload="auto" controls>
                                    <source src="{{ $audio->file }}">
                                </audio>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>




@endsection
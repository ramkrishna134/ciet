@extends('layouts.app')

{{-- @dd($department); --}}

@section('title'){{ $department->title }} |@endsection
@section('description'){{ $department->description }}@endsection
@section('image'){{ $department->featured_icon }}@endsection
@section('keyword'){{ json_decode($department->key_word) }}@endsection

@section('content')
    <section class="department-hero" style="background-image: url('{{ $department->featured_image }}')">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="title mb-1">{{ $department->title }}</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $department->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}

    <section class="about-department" id="main-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-7">

                    <div class="heading mb-2">{{ $department->title }}</div>

                    <p>{!! $department->description !!}</p>
                </div>

                <div class="col-sm-5">

                    <div class="head-message">
                        <div class="message-wrap d-flex">
                            <div class="image">
                                <img class="img-fluid" src="{{ $department->head_image }}" alt="{{ $department->title }}">
                            </div>
                            <div class="message">
                                <h4 class="heading">FORM THE desk of The Head </h4>
                                <p>"{{ $department->head_message }}"</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Sections --}}

    <section class="description-department">

        <div class="container">
            <ul class="nav nav-pills mb-4 section-link" id="pills-tab" role="tablist">

                @foreach($metas as $meta)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{$meta->key}}-tab" data-bs-toggle="pill" data-bs-target="#pill-{{$meta->key}}"
                        type="button" role="tab" aria-controls="pills-{{$meta->key}}" aria-selected="true">{{$meta->key}}</button>
                </li>
                @endforeach

            
            </ul>
            <div class="tab-content section-content" id="pills-tabContent">

                @foreach($metas as $meta)

                <div class="tab-pane fade" id="pill-{{$meta->key}}" role="tabpanel" aria-labelledby="pill-{{$meta->key}}-tab">
                    {!! $meta->value !!}
                </div>
                @endforeach
                
            </div>
        </div>


    </section>

    {{-- Our Staff --}}

    <section class="our-staff">

        <div class="over-lyar">
            {{-- <img src="/images/web/logo-mark.png" alt="Watermark of CIET LOGO"> --}}
        </div>

        <div class="container">

            <h2 class="heading uppercase text-light text-center">Our Staff</h2>

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="staff-wrap">
                        <div class="row justify-content-center">

                            @foreach($faculties as $faculty)

                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="image">
                                        <img class="img-fluid" src="{{ $faculty->image }}" alt="Iamge of {{ $faculty->name }}">
                                    </div>
                                    <div class="name">{{ $faculty->name }}</div>
                                    <div class="post">{{ $faculty->post }}</div>
                                    <div class="extn"><i>Extn. Number</i></div>
                                    <div class="number">+91-11-26864801-10 ({{ $faculty->number }})</div>

                                    <a href="{{ $faculty->profile }}" class="profile" target="_blank">View Profile</a>
        
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery --}}

    @php
    $gallery = json_decode($department->gallery);
    @endphp
    
    @if(!empty($gallery))

    <section class="gallery-wrap">
        <div class="container">
            <h2 class="heading uppercase text-center">Gallery</h2>

            <div class="gallery" id="lightgallery">

                <div class="g-row d-flex">
                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 200, 200 ]] ) }}" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 200, 200 ]] ) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-25">
                        <div class="block-xs-100">
                            <a href="{{ $img = array_shift($gallery) }}" class="image">
                                <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 330, 200 ]] ) }}" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="wrap-50">
                        <div class="block-xs-100 ">
                            <a href="{{ $img = array_shift($gallery) }}" class="image">
                                <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 600, 200 ]] ) }}" alt="">
                            </a>
                        </div>
                    </div>

                    
                </div>
                <div class="g-row d-flex">
                    <div class="wrap-25">
                        <div class="block-xs-100">
                            <a href="{{ $img = array_shift($gallery) }}" class="image">
                                <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 300, 200 ]] ) }}" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 200 ]] ) }}" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 200 ]] ) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50-h-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 100 ]] ) }}" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50-h-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 100 ]] ) }}" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50-h-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 100 ]] ) }}" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50-h-50">
                                <a href="{{ $img = array_shift($gallery) }}" class="image">
                                    <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 150, 100 ]] ) }}" alt="">
                                </a>
                            </div>
                        </div>
                        
                    </div>

                    <div class="wrap">
                        <div class="block-xs-100">
                            <a href="{{ $img = array_shift($gallery) }}" class="image">
                                <img class="img-fluid" src="{{ imageUrl( $img, ['crop' => [ 420, 200 ]] ) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
        
    @endif

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.section-link li').eq(0).find('.nav-link').addClass('active');

            $('.section-content .tab-pane').eq(0).addClass('show active');
            
        })
    </script>

@endsection

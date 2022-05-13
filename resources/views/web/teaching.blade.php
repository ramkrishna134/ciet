@extends('layouts.app')

@section('title')Teaching Learning Intervention |@endsection
@section('description')To fight COVID-19, enabling learning from Home and Practice Social Distancing, CIET-NCERT is organizing a month-long Webinar starting from 07 April, 2020 for the enrichment and professional development of students, teachers, teacher educators and researchers. The webinar intends to cover various themes related to Educational Technology (ET) and Information and Communication Technology (ICT) in education. The webinar will encompass topics related to creation and dissemination of e-contents, Content-Pedagogy-Technology integration, use of ICT in teaching-learning and assessment, OER, use of various ICT tools, creation of AR/VR contents, mobile app and AI based platforms etc. Being a premier institution working in the field of ET and ICT for school education and teacher education, CIET invites the learners to join us in the Webinar which will be held daily. This series of interactive sessions will hopefully be a stepping stone in the enhancement of knowledge and skill of those working in the field of education.@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">Teaching Learning Intervention</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Teaching Learning Intervention</li>
                    </ol>
                </nav>
            </div>

        </div>
    </section>

    {{-- <section class="page-content" id="main-content">

        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2>Fight COVID-19: Join us on Webinar</h2>
                    <p> To fight COVID-19, enabling learning from Home and Practice Social Distancing, CIET-NCERT is organizing a month-long Webinar starting from 07 April, 2020 for the enrichment and professional development of students, teachers, teacher educators and researchers. The webinar intends to cover various themes related to Educational Technology (ET) and Information and Communication Technology (ICT) in education. The webinar will encompass topics related to creation and dissemination of e-contents, Content-Pedagogy-Technology integration, use of ICT in teaching-learning and assessment, OER, use of various ICT tools, creation of AR/VR contents, mobile app and AI based platforms etc. Being a premier institution working in the field of ET and ICT for school education and teacher education, CIET invites the learners to join us in the Webinar which will be held daily. This series of interactive sessions will hopefully be a stepping stone in the enhancement of knowledge and skill of those working in the field of education.
                    </p>
                </div>
                <div class="col-sm-6">
                    <h2>How to join Webinar?</h2>
                    <p>Join us for the live webinar from 04:00 pm to 05:00 pm, Monday to Friday on 'NCERT OFFICIAL' YouTube channel . Subscribe the channel for regular notification.
                        You can watch this webinar telecast through</p>
                        <ul>
                            <li>PM eVidhya Channel</li>
                            <li>DD FreeDish #128</li>
                            <li>DishTV #950</li>
                            <li>Tatasky #756</li>
                            <li>Airtel #440</li>
                            <li>Videocon #477</li>
                            <li>Sundirect #793 and</li>
                            <li>Jio TV Mobile app</li>
                        </ul>
                    <p>Webinar will be conducted in English and Hindi.
                            For Further queries contact training@ciet.nic.in</p>
                </div>
            </div>
        </div>

    </section> --}}

    <section class="upcoming-webiner bg-light py-4 mb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <h3 class="heading text-center mb-3 text-primary">Upcoming Series</h3>

                    <div class="webinar-wrap">
                        <div class="row justify-content-center">

                            @foreach($upcomings as $upcoming)

                            <div class="col-sm-3">

                                <div class="item shadow">
                                    @php
                                      $date = new DateTime($upcoming->web_date);
                                      
                                    @endphp
                            
                                    <div class="date">{{ $date->format('d F Y') }}</div>
                                    <h3 class="title">{{ $upcoming->title }}</h3>
                                    <div class="resourse">{!! $upcoming->res_person !!}
                                    </div>
                                    {{-- <div class="buttons">
                                        <a href="" aria-label="Banner" target="_blank"><i class="fas fa-image"></i></a>
                                    </div> --}}
                                </div>

                            </div>

                            @endforeach

                            @if($upcomings->count() == 0)
                            <h4 class="text-center">No Series Found..</h4>
                            @endif

                            {!! $upcomings->links() !!}
                        </div>
                    </div>
                    
    
                    
                </div>
            </div>
        </div>
    </section>


    <section class="archive-webiner mb-4">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <h3 class="heading text-center text-primary mb-3">Past Series</h3>

                    <div class="webinar-wrap">
                        <div class="row justify-content-center">

                            @foreach($pasts as $past)

                            <div class="col-sm-3 mb-3">

                                <div class="item shadow">
                                    @php
                                      $date = new DateTime($past->web_date);
                                      
                                    @endphp
                            
                                    <div class="date">{{ $date->format('d F Y') }}</div>
                                    <h3 class="title">{{ $past->title }}</h3>
                                    <div class="resourse">{!! $past->res_person !!}
                                    </div>
                                    <div class="buttons">
                                        {{-- <a href="" aria-label="Banner" target="_blank"><i class="fas fa-image"></i></a> --}}
                                        <a href="{{ $past->ppt }}" aria-label="Presentation" target="_blank"><i class="fas fa-file-powerpoint"></i></a>
                                        <a href="{{ $past->video }}" aria-label="Video" target="_blank"><i class="fas fa-video"></i></a>
                                    </div>
                                </div>

                            </div>

                            @endforeach

                            @if($pasts->count() == 0)
                            <h4 class="text-center">No Series Found..</h4>
                            @endif

                            {!! $pasts->links() !!}
                        </div>
                    </div>

                    
                </div>
            </div>

        </div>

    </section>

@endsection
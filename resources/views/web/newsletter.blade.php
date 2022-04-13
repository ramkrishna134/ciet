@extends('layouts.app')

@section('title')Newsletter | @endsection
@section('description')To fight COVID-19, enabling learning from Home and Practice Social Distancing, CIET-NCERT is organizing a month-long Webinar starting from 07 April, 2020 for the enrichment and professional development of students, teachers, teacher educators and researchers. The webinar intends to cover various themes related to Educational Technology (ET) and Information and Communication Technology (ICT) in education. The webinar will encompass topics related to creation and dissemination of e-contents, Content-Pedagogy-Technology integration, use of ICT in teaching-learning and assessment, OER, use of various ICT tools, creation of AR/VR contents, mobile app and AI based platforms etc. Being a premier institution working in the field of ET and ICT for school education and teacher education, CIET invites the learners to join us in the Webinar which will be held daily. This series of interactive sessions will hopefully be a stepping stone in the enhancement of knowledge and skill of those working in the field of education.@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')


<section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Newsletter</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                </ol>
            </nav>
        </div>

    </div>
</section>

<section class="page-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="newsletter-wrap my-5">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="newsletter shadow">

                                <div class="latest">Latest</div>

                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31/12/2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31/12/2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31/12/2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31/12/2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31/12/2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
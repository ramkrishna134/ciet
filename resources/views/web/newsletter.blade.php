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

<section class="page-content" id="main-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <form action="">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select name="month" id="month" class="form-control">
                                                <option value="">-- Select Month ---</option>
                                                @for($i=1; $i<=12; $i++): 
                                                    @php $month = date('F', mktime(0, 0, 0, $i, 10));@endphp
                                                    <option value="">{{ $month }}</option>
                                                @endfor
                                                
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="year" id="year" class="form-control">
                                                <option value="">-- Select Year ---</option>
                                                @php
                                                    $latest_year = date('Y');
                                                    $earliest_year = 2015;
                                                    foreach ( range( $latest_year, $earliest_year ) as $i ):
                                                @endphp
                                                <option value="{{ $i }}">{{ $i }}</option>
        
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fas fa-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="newsletter-wrap mt-4">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="newsletter shadow">

                                <div class="latest">Latest</div>

                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                            
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
                                <a href="" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="newsletter shadow">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/newsletter.png" alt="Newsletter">
                                </div>
                                <div class="title">Volume V, Issue 4, 1 October - 31 December 2021</div>
                                <div class="date"><i class="fas fa-calendar-day"></i> 31st December 2022</div>
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
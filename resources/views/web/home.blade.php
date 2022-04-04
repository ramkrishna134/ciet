@extends('layouts.app')

@section('content')
    {{-- Home Slider --}}
    <section class="home-slider">
        <a href="#" class="slide-item">
            <img class="img-fluid" src="/images/web/ncert-collage.png" alt="">
        </a>
        <a href="#" class="slide-item">
            <img class="img-fluid" src="/images/web/Diksha_Web_Banner.jpg" alt="">
        </a>
        <a href="#" class="slide-item">
            <img class="img-fluid" src="/images/web/BhashaSangambanner.jpg" alt="">
        </a>
    </section>

    {{-- About CIET --}}

    <section class="about-us">
        <div class="container">
            <div class="col-sm-6">

                <h1 class="heading">Central Institute of Educational Technology</h1>
                <p>Central Institute of Educational Technology(CIET), a constituent unit of NCERT, came into existence in
                    the year 1984 with the merger of Center for Educational Technology(CET) and Department of Teaching
                    Aids(DTA). CIET is a premiere national institute of educational technology. Its major aim is to promote
                    utilization of educational technologies viz. radio,TV, films, Satellite communications and cyber media
                    either separately or in combinations, The institute undertakes activities to widen educational
                    opportunities, promote equity and improve quality of educational processes at school level.</p>

                    <a href="" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="head-message">
            <div class="message-wrap d-flex">
                <div class="image">
                    <img class="img-fluid" src="/images/web/jd-message.jpg" alt="JD CIET">
                </div>
                <div class="message">
                    <h4 class="heading">FORM THE desk of joint director</h4>
                    <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam amet ad omnis debitis sunt velit Totam amet ad omnis debitis"</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Digital Education --}}
    <section class="digital-education">
        <div class="container">
            <div class="heading uppercase">
                Digital education initiatives
            </div>

            <div class="digital-slider">

                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-02.png" alt="">
                    </div>
                    <div class="title">NISHTHA</div>
                </a>
                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-03.png" alt="">
                    </div>
                    <div class="title">ePathshala</div>
                </a>
                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-04.png" alt="">
                    </div>
                    <div class="title">PMeVidya</div>
                </a>

                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-06.png" alt="">
                    </div>
                    <div class="title">ICT@Schools</div>
                </a>

                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-24.png" alt="">
                    </div>
                    <div class="title">ICT Curriculam</div>
                </a>
                <a href="#" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/1-02.png" alt="">
                    </div>
                    <div class="title">NISHTHA</div>
                </a>
            </div>

            <a href="" class="btn btn-primary mt-5">View More</a>
        </div>
    </section>


    {{-- Ongoing Events --}}

    <section class="ongoing-events">

        <div class="container">

            <div class="heading">
                Ongoing Events
            </div>

            <div class="ongoing-slider">
                <a href="" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/event-1.jpg" alt="">
                        <div class="layer">
                            <p>View Details <i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                    <div class="title">Event Title</div>
                </a>
    
                <a href="" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/events-2.jpg" alt="">
                        <div class="layer">
                            <p>View Details <i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                    <div class="title">Event Title</div>
                </a>
    
                <a href="" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/event-1.jpg" alt="">
                        <div class="layer">
                            <p>View Details <i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                    <div class="title">Event Title</div>
                </a>
    
                <a href="" class="slide-item">
                    <div class="image">
                        <img class="img-fluid" src="/images/web/events-2.jpg" alt="">
                        <div class="layer">
                            <p>View Details <i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                    <div class="title">Event Title</div>
                </a>
            </div>

            <a href="" class="btn btn-primary mt-4">View All Events</a>
        </div>

    </section>


    {{-- department --}}

    <section class="department">

        {{-- <div class="layer">
            <img class="img-fluid" src="/images/web/gray-wave.svg" alt="Gray wave design">
        </div> --}}

        <div class="container">
            <div class="department-wrap">
                <div class="row">

                    <div class="col-sm-4">
                        <a href="" class="department-item primary">
                            <div class="content">
                                <div class="title">our <i class="fas fa-arrow-right"></i> <br> constituents</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="" class="department-item">
                            <div class="over-layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/dict.png" alt="DICT">
                                </div>
                                <div class="title sm">
                                    Department of ICT & Training
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="" class="department-item">
                            <div class="over-layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/mpd.png" alt="DICT">
                                </div>
                                <div class="title sm">
                                    Media production division
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="" class="department-item">
                            <div class="over-layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/prd.png" alt="DICT">
                                </div>
                                <div class="title sm">
                                    planing & research division
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="" class="department-item">
                            <div class="over-layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/ed.png" alt="DICT">
                                </div>
                                <div class="title sm">
                                    engineering division
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="" class="department-item">
                            <div class="over-layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/ac.png" alt="DICT">
                                </div>
                                <div class="title sm">
                                    Administration & Account
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

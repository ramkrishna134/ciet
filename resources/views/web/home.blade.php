@extends('layouts.app')

@section('content')
    {{-- Home Slider --}}
    <section class="home-slider count-height">
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

    <section class="about-us" id="main-content">
        <div class="container">
            <div class="col-lg-6 col-sm-12">

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
                    <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam amet ad omnis debitis sunt velit
                        Totam amet ad omnis debitis"</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Digital Education --}}
    <section class="digital-education">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="heading uppercase">
                        Digital education initiatives
                    </div>
        
                    <div class="digital-slider scroll-in-view">
        
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
        
                    <a href="{{ route('initiative') }}" class="btn btn-primary mt-5">View More</a>
                </div>
            </div>
        </div>
    </section>


    {{-- Ongoing Events --}}

    <section class="ongoing-events scroll-in-view">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="heading uppercase">
                        Ongoing Events
                    </div>
        
                    <div class="ongoing-slider scroll-in-view">
                        <a href="" class="slide-item">
                            <div class="image">
                                <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                <div class="layer">
                                    <p>View Details <i class="fas fa-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="title">Event Title</div>
                        </a>
        
                        <a href="" class="slide-item">
                            <div class="image">
                                <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                <div class="layer">
                                    <p>View Details <i class="fas fa-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="title">Event Title</div>
                        </a>
        
                        <a href="" class="slide-item">
                            <div class="image">
                                <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                <div class="layer">
                                    <p>View Details <i class="fas fa-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="title">Event Title</div>
                        </a>
        
                        <a href="" class="slide-item">
                            <div class="image">
                                <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                <div class="layer">
                                    <p>View Details <i class="fas fa-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="title">Event Title</div>
                        </a>
                    </div>
        
                    <a href="" class="btn btn-primary mt-4">View All Events</a>
                </div>
            </div>
            
        </div>

    </section>


    {{-- department --}}

    <section class="department">

        <div class="layer">
            <img class="img-fluid" src="/images/web/gray-wave.png" alt="Gray wave design">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="department-wrap">
                        <div class="row">
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item primary">
                                    <div class="content scroll-in-view">
                                        <div class="title">our <i class="fas fa-arrow-right"></i> <br> constituents</div>
                                    </div>
                                </a>
                            </div>
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
                                        <div class="image">
                                            <img class="img-fluid" src="/images/web/dict.png" alt="DICT">
                                        </div>
                                        <div class="title sm">
                                            Department of ICT & Training
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
                                        <div class="image">
                                            <img class="img-fluid" src="/images/web/mpd.png" alt="DICT">
                                        </div>
                                        <div class="title sm">
                                            Media production division
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
                                        <div class="image">
                                            <img class="img-fluid" src="/images/web/prd.png" alt="DICT">
                                        </div>
                                        <div class="title sm">
                                            planing & research division
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
                                        <div class="image">
                                            <img class="img-fluid" src="/images/web/ed.png" alt="DICT">
                                        </div>
                                        <div class="title sm">
                                            engineering division
                                        </div>
                                    </div>
                                </a>
                            </div>
        
                            <div class="col-lg-4 col-sm-6">
                                <a href="" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
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
            </div>
        </div>
    </section>


    {{-- Infrastructure --}}

    <section class="infrastructure" style="background-image: url('/images/web/bg-it.png')">
        <div class="container">
            <div class="heading uppercase">
                infrastructure & publication
            </div>

            <div class="infrastructure-wrap">

                <div class="top-elemement">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/books.png" alt="">
                                    <div class="title">Resources</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/books.png" alt="">
                                    <div class="title">Library</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/studio_1.png" alt="">
                                    <div class="title">studio</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/edusat_1.png" alt="">
                                    <div class="title">satellite network</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6 d-lg-block d-sm-none d-none">

                        </div>


                    </div>
                </div>

                <div class="bottom-element">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-sm-4 d-lg-block d-sm-none d-none">

                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/diksha.png" alt="">
                                    <div class="title">Diksha CCC</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/edusat_1.png" alt="">
                                    <div class="title">satellite network</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/oer.png" alt="">
                                    <div class="title">journal</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ route('newsletter') }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="/images/web/oer.png" alt="">
                                    <div class="title">Newsletter</div>
                                </div>
                            </a>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- Announcement --}}

    <section class="announcement">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-sm-12">

                    <div class="announcement-wrap">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                    aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-vacancy-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-vacancy" type="button" role="tab" aria-controls="pills-vacancy"
                                    aria-selected="false">Vacancies</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-notice-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-notice" type="button" role="tab" aria-controls="pills-notice"
                                    aria-selected="false">Notices</button>
                            </li>
        
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-miscell-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-miscell" type="button" role="tab" aria-controls="pills-miscell"
                                    aria-selected="false">Miscellaneous</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                                aria-labelledby="pills-all-tab">
                                <ul>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae <div class="contractual">Contractual</div></a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid. <div class="regular">Regular</div></a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid,</a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="pills-vacancy" role="tabpanel" aria-labelledby="pills-vacancy-tab">
                                <ul>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae <div class="contractual">Contractual</div></a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid. <div class="regular">Regular</div></a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                </ul>
                                    
                            </div>
                            <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                                <ul>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid,</a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid,</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="pills-miscell" role="tabpanel" aria-labelledby="pills-miscell-tab">
                                <ul>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid.</a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                    <li><a href="">suscipit possimus corrupti fugiat minima odit sint expedita aliquid,</a></li>
                                    <li><a href="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facere placeat vitae</a></li>
                                    <li><a href="">consectetur sit quaerat, nam obcaecati quis ipsam? Perferendis, aut.</a></li>
                                </ul>
                                    
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- Partner --}}
    
    <section class="partner">
        <div class="container">
            <div class="partner-slider">

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/data.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/ncert.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/akam.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/moe.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/dic.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img  src="/images/web/unesco.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/dic.png" alt="">
                    </a>
                </div>

                <div class="slide-item">
                    <a href="" class="image">
                        <img src="/images/web/akam.png" alt="">
                    </a>
                </div>

            </div>
        </div>
    </section>


@endsection

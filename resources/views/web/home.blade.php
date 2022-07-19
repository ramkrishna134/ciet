@php
    $lang = $_GET['lang'] ?? null;
@endphp

@extends('layouts.app')

@section('content')
    {{-- Home Slider --}}
    
    <section class="home-slider-wrap count-height">
        <div class="home-slider">
            @foreach($sliders as $slide)
            {{-- @dd($slide); --}}
            <a href="{{ $slide->url }}" target="_blank" class="slide-item">
                <img class="img-fluid" src="{{ $slide->image }}" alt="{{ $slide->alt }}">
            </a>
            @endforeach
        </div>

        {{-- <a href="" class="play-button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campusModal"><i class="fas fa-play ms-1"></i></a> --}}
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

                <a href="/about{{ $lang ? "?lang=".$lang : ""  }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="head-message">
            <div class="message-wrap d-flex">
                <div class="image">
                    <img class="img-fluid" src="/images/web/jd-message.jpg" alt="JD CIET">
                </div>
                <div class="message">
                    <h2 class="heading">FORM THE desk of joint director</h2>    
                    <p class="mb-1">"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam amet ad omnis debitis sunt velit
                        Totam amet ad omnis debitis.."</p>
                    <a href="" data-bs-toggle="modal" data-bs-target="#headmessageModal"><strong>Read More</strong></a>
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

                        @foreach($initiatives as $item)
                        <a href="/initiative/{{ $item->slug }}{{ $lang ? "?lang=".$lang : ""  }}" class="slide-item">
                            <div class="image">
                                <img class="img-fluid" src="{{ $item->icon }}" alt="{{ $item->name }} Logo">
                            </div>
                            <div class="title">{{ $item->name }}</div>
                        </a>
                        @endforeach
                        
                    </div>
        
                    <a href="{{ route('initiative') }}{{ $lang ? "?lang=".$lang : ""  }}" class="btn btn-primary mt-3">View More</a>
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
                        Ongoing Activites
                    </div>
        
                    <div class="ongoing-slider scroll-in-view">

                        @foreach($events as $event)

                        <a href="/activity/{{ $event->slug }}{{ $lang ? "?lang=".$lang : ""  }}" class="slide-item">
                            <div class="image">
                                
                                <img class="img-fluid" src="{{ imageUrl( $event->icon, ['crop' => [ 350, 250 ]] ) }}" alt="{{ $event->title }} Image">
                                <div class="layer">
                                    <p>View Details <i class="fas fa-arrow-right"></i></p>
                                </div>
                            </div>
                            <div class="title">{{ $event->title }}</div>
                        </a>

                        @endforeach
                    </div>
        
                    <a href="/calender{{ $lang ? "?lang=".$lang : ""  }}" class="btn btn-primary mt-4">View All Activity</a>
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
                                        <div class="title">our <i class="fas fa-arrow-right"></i> <br> departments</div>
                                    </div>
                                </a>
                            </div>

                            @foreach($departments as $department)
                            <div class="col-lg-4 col-sm-6">
                                <a href="department/{{$department->slug}}{{ $lang ? "?lang=".$lang : ""  }}" class="department-item">
                                    <div class="over-layer"></div>
                                    <div class="content scroll-in-view">
                                        <div class="image">
                                            <img class="img-fluid" src="{{$department->icon}}" alt="{{ $department->title }} Icon">
                                        </div>
                                        <div class="title sm">
                                            {{ $department->title }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
        
                            
        
                            {{-- <div class="col-lg-4 col-sm-6">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Infrastructure --}}

    @if(count($infrastrcutures) == 7)

    <section class="infrastructure" style="background-image: url('/images/web/bg-it.png')">
        <div class="container">
            <div class="heading uppercase">
                infrastructure & publication
            </div>
            @php
            $infra1 = array_shift($infrastrcutures);
            $infra2 = array_shift($infrastrcutures);
            $infra3 = array_shift($infrastrcutures);
            $infra4 = array_shift($infrastrcutures);
            $infra5 = array_shift($infrastrcutures);
            $infra6 = array_shift($infrastrcutures);
            $infra7 = array_shift($infrastrcutures);
            @endphp

            <div class="infrastructure-wrap">

                <div class="top-elemement">
                    <div class="row justify-content-center">
                        
                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra1['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra1['icon'] }}" alt="{{ $infra1['title'] }}">
                                    <div class="title">{{ $infra1['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra2['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra2['icon'] }}" alt="{{ $infra2['title'] }}">
                                    <div class="title">{{ $infra2['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra3['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra3['icon'] }}" alt="{{ $infra1['title'] }}">
                                    <div class="title">{{ $infra3['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra4['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra4['icon'] }}" alt="{{ $infra1['title'] }}">
                                    <div class="title">{{ $infra4['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6 d-lg-block d-sm-none d-none">

                        </div>


                    </div>
                </div>

                <div class="bottom-element">
                    <div class="row justify-content-center">

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra5['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra5['icon'] }}" alt="{{ $infra5['title'] }}">
                                    <div class="title"> {{ $infra5['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra6['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra6['icon'] }}" alt="{{ $infra6['title'] }}">
                                    <div class="title">{{ $infra6['title'] }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="{{ $infra7['url'] }}" class="item">
                                <div class="shape" style="background-image: url('/images/web/rhombas.png')"></div>
                                <div class="content scroll-in-view">
                                    <img class="img-fluid" src="{{ $infra7['icon'] }}" alt="{{ $infra7['title'] }}">
                                    <div class="title">{{ $infra7['title'] }}</div>
                                </div>
                            </a>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </section>

    @endif

    {{-- Announcement --}}

    <section class="announcement">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-sm-12">

                    <div class="announcement-wrap">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
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


                        <div class="tab-content no-height" id="pills-tabContent">



                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                                <ul>
        
                                    @foreach($allNotices as $item)
                                    <li>
                                        <a href="{{ $item->url }}" target="_blank">
                                            {{ $item->title }} 
        
                                            @if($item->sub_category == 'contractual')
                                            <div class="item">Contractual</div>
                                            @elseif($item->sub_category == 'regular')
                                            <div class="regular">Regular</div>
                                            @endif
        
                                        </a>
                                    </li>
                                    @endforeach
        
                                    
                                </ul>
        
                                @if($allNotices->count() == 0)
                                    <h4 class="text-center">No Announcement Found..</h4>
                                @endif
                            </div>

                                
                            <div class="tab-pane fade " id="pills-vacancy" role="tabpanel" aria-labelledby="pills-vacancy-tab">
                                <ul>
        
                                    @foreach($vacancies as $vacancy)
                                    <li>
                                        <a href="{{ $vacancy->url }}" target="_blank">
                                            {{ $vacancy->title }} 
        
                                            @if($vacancy->sub_category == 'contractual')
                                            <div class="contractual">Contractual</div>
                                            @elseif($vacancy->sub_category == 'regular')
                                            <div class="regular">Regular</div>
                                            @endif
        
                                        </a>
                                    </li>
                                    @endforeach
        
                                    
                                </ul>
        
                                @if($vacancies->count() == 0)
                                    <h4 class="text-center">No Announcement Found..</h4>
                                @endif
        
                                
                                    
                            </div>
                            <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                                <ul>
                                    @foreach($notices as $notice)
                                    <li>
                                        <a href="{{ $notice->url }}" target="_blank">
                                            {{ $notice->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
        
                                @if($notices->count() == 0)
                                    <h4 class="text-center">No Announcement Found..</h4>
                                @endif
        
                                
                            </div>
                            <div class="tab-pane fade" id="pills-miscell" role="tabpanel" aria-labelledby="pills-miscell-tab">
                                <ul>
                                    @foreach($mislens as $mislen)
                                    <li>
                                        <a href="{{ $mislen->url }}" target="_blank">
                                            {{ $mislen->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if($mislens->count() == 0)
                                    <h4 class="text-center">No Announcement Found..</h4>
                                @endif

                                    
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

                @foreach($partners as $pertner)

                <div class="slide-item">
                    <a href="{{ $pertner->link }}" class="image" target="_blank">
                        <img src="{{ $pertner->logo }}" alt="{{ $pertner->name }} Logo">
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </section>


    {{-- Campus Tour Video --}}
    <!-- Modal -->
    {{-- <div class="modal fade" id="campusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title p-2" id="exampleModalLabel">Campus Tour</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-1">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/ZBqJ_GeLPok" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
        </div>
        </div>
    </div> --}}


  <div class="modal fade" id="headmessageModal" tabindex="-1" aria-labelledby="Head Message Modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-w-bold" id="exampleModalLabel"><strong>FORM THE DESK OF JOINT DIRECTOR</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <div class="image d-inline-block p-2 border rounded mb-3">
                <img class="img-fluid" src="/images/web/jd-message.jpg" alt="JD CIET">
            </div>
            <p>"LOREM IPSUM, DOLOR SIT AMET CONSECTETUR ADIPISICING ELIT. TOTAM AMET AD OMNIS DEBITIS SUNT VELIT TOTAM AMET AD OMNIS DEBITIS."</p>
        </div>
      </div>
    </div>
  </div>


@endsection

@extends('layouts.app')

@section('title')
    Announcements |  
@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Announcements</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Announcements</li>
                </ol>
            </nav>
        </div>
    </div>
</section>


{{-- @dd($vacancies); --}}


<section class="page-content" id="main-content">
    <div class="container announcement rounded pt-4">

        <div class="row justify-content-center announcement-wrap">
            <div class="col-sm-10">

                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-vacancy-tab" data-bs-toggle="pill"
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
                    
                    <div class="tab-pane fade show active" id="pills-vacancy" role="tabpanel" aria-labelledby="pills-vacancy-tab">
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

                        <div class="accordion mt-5" id="accordionVacancy">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingVacancy">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVacancy" aria-expanded="true" aria-controls="collapseOne">
                                  <strong>Archive</strong>
                                </button>
                              </h2>
                              <div id="collapseVacancy" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionVacancy">
                                <div class="accordion-body">
                                    <ul>
                                        {{-- Archive Vacancy --}}
                                        @foreach($vacancyArchives as $vacancy)
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
                                    @if($vacancyArchives->count() == 0)
                                        <h4 class="text-center">No Announcement Found..</h4>
                                    @endif
                                </div>
                              </div>
                            </div>
                            
                        </div>
                            
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

                        <div class="accordion mt-5" id="accordionNotice">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingNotice">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNotice" aria-expanded="true" aria-controls="collapseOne">
                                  <strong>Archive</strong>
                                </button>
                              </h2>
                              <div id="collapseNotice" class="accordion-collapse collapse" aria-labelledby="headingNotice" data-bs-parent="#accordionNotice">
                                <div class="accordion-body">
                                    
                                        {{-- Archive Notice --}}
                                    <ul>
                                        @foreach($noticeArchices as $notice)
                                        <li>
                                            <a href="{{ $notice->url }}" target="_blank">
                                                {{ $notice->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    @if($noticeArchices->count() == 0)
                                        <h4 class="text-center">No Announcement Found..</h4>
                                    @endif

                                    
                                </div>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-miscell" role="tabpanel" aria-labelledby="pills-miscell-tab">
                        <ul>
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
                        </ul>

                        <div class="accordion mt-5" id="accordionMiscell">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingMiscell">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMiscell" aria-expanded="true" aria-controls="collapseOne">
                                  <strong>Archive</strong>
                                </button>
                              </h2>
                              <div id="collapseMiscell" class="accordion-collapse collapse" aria-labelledby="headingMiscell" data-bs-parent="#accordionMiscell">
                                <div class="accordion-body">
                                    <ul>
                                        {{-- Archive Miscellaneous --}}
                                        <ul>
                                            @foreach($mislenArchives as $mislen)
                                            <li>
                                                <a href="{{ $mislen->url }}" target="_blank">
                                                    {{ $mislen->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>

                                        @if($mislenArchives->count() == 0)
                                            <h4 class="text-center">No Announcement Found..</h4>
                                        @endif
                                    </ul>
                                </div>
                              </div>
                            </div>
                            
                        </div>
                            
                    </div>
                </div>

            </div>
        </div>


        
    </div>
</section>


@endsection
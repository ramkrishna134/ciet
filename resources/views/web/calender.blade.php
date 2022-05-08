@extends('layouts.app')


@section('title')
    Activity Calender |
@endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">Activity Calender</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Activity Calender</li>
                    </ol>
                </nav>
            </div>

        </div>
    </section>


    <section class="ongoing-calender" id="main-content">
        <div class="container">
            <div class="heading text-center mb-4">Ongoing Activities</div>

            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row justify-content-center">

                        {{-- @dd($ongoings); --}}
                        @foreach($ongoings as $ongoing)

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('{{ $ongoing->icon }}')">
                                </div>

                                <div class="description">
                                    @php
                                      $startDate = new DateTime($ongoing->start_date);
                                      $endDate = new DateTime($ongoing->end_date);
                                    @endphp
                                    <div class="date">{{ $startDate->format('d F Y') }}  to {{ $endDate->format('d F Y') }}</div>
                                    <a href="/activity/{{ $ongoing->slug }}" class="title">{{ $ongoing->title }}</a>
                                    <div class="excerpt"><p>{{ Str::words($ongoing->description,20); }}</p></div>

                                    <a href="/activity/{{ $ongoing->slug }}" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        @endforeach 

                        {!! $ongoings->links() !!}

                        @if($ongoings->count() == 0)
                        <h4 class="text-center">No Activity Found..</h4>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="upcoming-calender">

        <div class="container">
            <div class="heading text-center mb-4">Upcoming Activities</div>


            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row justify-content-center">

                        @foreach($upcomings as $upcoming)

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('{{ $upcoming->icon }}')">
                                </div>

                                <div class="description">
                                    @php
                                      $startDate = new DateTime($upcoming->start_date);
                                      $endDate = new DateTime($upcoming->end_date);
                                    @endphp
                                    <div class="date">{{ $startDate->format('d F Y') }}  to {{ $endDate->format('d F Y') }}</div>
                                    <a href="/activity/{{ $upcoming->slug }}" class="title">{{ $upcoming->title }}</a>
                                    <div class="excerpt"><p>{{ Str::words($upcoming->description,20); }}</p></div>

                                    <a href="/activity/{{ $upcoming->slug }}" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        @endforeach

                        @if($upcomings->count() == 0)
                        <h4 class="text-center">No Activity Found..</h4>
                        @endif

                        {!! $upcomings->links() !!}

                        
                    </div>
                </div>
            </div>
        </div>

    </section>

{{---------------------- Past Events ------------------------------}}
    <section class="past-calender">

        <div class="container">
            <div class="heading text-center mb-4">Past Activities</div>


            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row justify-content-center">

                        @foreach($pasts as $past)

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('{{ $past->icon }}')">
                                </div>

                                <div class="description">
                                    @php
                                      $startDate = new DateTime($past->start_date);
                                      $endDate = new DateTime($past->end_date);
                                    @endphp
                                    <div class="date">{{ $startDate->format('d F Y') }}  to {{ $endDate->format('d F Y') }}</div>
                                    <a href="/activity/{{ $past->slug }}" class="title">{{ $past->title }}</a>
                                    

                                    <a class="link" href="/activity/{{ $past->slug }}" class="">Read More</a>
                                </div>

                            </article>
                        </div>

                        @endforeach

                        {!! $pasts->links() !!}
                        
                        @if($pasts->count() == 0)
                        <h4 class="text-center">No Activity Found..</h4>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

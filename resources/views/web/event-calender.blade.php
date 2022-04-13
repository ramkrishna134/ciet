@extends('layouts.app')

@section('title')
    Event Calender |
@endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">Event Calender</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Event Calender</li>
                    </ol>
                </nav>
            </div>

        </div>
    </section>


    <section class="ongoing-calender" id="main-content">
        <div class="container">
            <div class="heading text-center mb-4">Ongoing Events</div>

            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/sme.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/mewec.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/srg_banner.png')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="upcoming-calender">

        <div class="container">
            <div class="heading text-center mb-4">Upcoming Events</div>


            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/sme.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/mewec.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/srg_banner.png')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    <div class="excerpt"><p>Social media in education states the drill of using social
                                        media platforms as an approach to augment the learning of students. Technology
                                        incorporation can be...</p></div>

                                    <a href="" class="btn btn-outline-primary">Read More</a>
                                </div>

                            </article>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>

    </section>

{{---------------------- Past Events ------------------------------}}
    <section class="past-calender">

        <div class="container">
            <div class="heading text-center mb-4">Past Events</div>


            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/sme.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    

                                    <a class="link" href="" class="">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/mewec.jpg')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    

                                    <a class="link" href="" class="">Read More</a>
                                </div>

                            </article>
                        </div>

                        <div class="col-sm-4">
                            <article class="event-item">
                                <div class="image" style="background-image: url('/images/web/srg_banner.png')">
                                </div>

                                <div class="description">
                                    <div class="date">22/02/2022 to 25/02/2022</div>
                                    <a href="" class="title">"Online Training on “Social Media for Education”</a>
                                    

                                    <a class="link" href="" class="">Read More</a>
                                </div>

                            </article>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

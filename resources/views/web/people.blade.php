@php $lang = $lang ?? null; @endphp
@extends('layouts.app')

@section('title')
    @if(empty($lang) OR $lang === 'en')
    People |
    @elseif($lang === 'hi')
    People|
    @endif  
@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">People</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">People</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="page-content" id="main-content">
    <div class="container people-wrap">

        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                    type="button" role="tab" aria-controls="pills-all" aria-selected="true">Academic</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-vacancy-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-vacancy" type="button" role="tab" aria-controls="pills-vacancy"
                    aria-selected="false">Administration</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-notice-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-notice" type="button" role="tab" aria-controls="pills-notice"
                    aria-selected="false">Technical</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <div class="staff-wrap">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="https://ciet.nic.in/img/contact/DrBharti.JPG" alt="">
                                </div>
                                <div class="name">Dr. Bharti</div>
                                <div class="post">Associate Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (217)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrInduKumar.jpg" alt="">
                                </div>
                                <div class="name">Dr. Indu Kumar</div>
                                <div class="post">Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (231)</div>
        
                                <a href="" class="profile">View Profile</a>
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-vacancy" role="tabpanel" aria-labelledby="pills-vacancy-tab">
                <div class="staff-wrap">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="https://ciet.nic.in/img/contact/DrBharti.JPG" alt="">
                                </div>
                                <div class="name">Dr. Bharti</div>
                                <div class="post">Associate Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (217)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrInduKumar.jpg" alt="">
                                </div>
                                <div class="name">Dr. Indu Kumar</div>
                                <div class="post">Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (231)</div>
        
                                <a href="" class="profile">View Profile</a>
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                <div class="staff-wrap">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="https://ciet.nic.in/img/contact/DrBharti.JPG" alt="">
                                </div>
                                <div class="name">Dr. Bharti</div>
                                <div class="post">Associate Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (217)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrInduKumar.jpg" alt="">
                                </div>
                                <div class="name">Dr. Indu Kumar</div>
                                <div class="post">Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (231)</div>
        
                                <a href="" class="profile">View Profile</a>
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                        <div class="col-sm-3">
                            <div class="single-item bg-white">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/DrRejaulKarimBarbhuiya.jpg" alt="">
                                </div>
                                <div class="name">Dr. Rejaul Karim Barbhuiya</div>
                                <div class="post">Assistant Professor</div>
                                <div class="extn"><i>Extn. Number</i></div>
                                <div class="number">+91-11-26864801-10 (237)</div>
        
                                <a href="" class="profile">View Profile</a>
        
                            </div>
                        </div>
        
                    </div>
                </div>

            </div>
        </div>


        
    </div>
</section>

@endsection


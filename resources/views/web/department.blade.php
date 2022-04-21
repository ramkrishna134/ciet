@extends('layouts.app')

@section('title')
    Department of ICT & Training |
@endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="department-hero" style="background-image: url('/images/web/depart-hero.jpg')">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="title mb-1">Department of ICT & Training</h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Department of ICT & Training</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-department" id="main-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-7">

                    <div class="heading mb-2">About Department of ICT & Training</div>

                    <p>Ut imperdiet libero at elit luctus, quis fermentum ligula pretium. Donec sodales dui vitae sem
                        euismod, in luctus erat imperdiet. Pellentesque mattis justo nec nisl tempor fermentum. Praesent
                        purus nulla, ornare eu ultrices vel, congue quis diam. Fusce lacinia, tortor vel pretium efficitur,
                        dolor est ultricies sapien, ut volutpat augue orci eget ante. Nulla libero dui, malesuada in
                        molestie vitae, congue sit amet tellus. Suspendisse purus risus, scelerisque quis turpis dignissim,
                        faucibus aliquet odio. Proin malesuada, metus sed egestas tempor, diam tellus elementum ex, vel
                        sollicitudin quam nisi eget lorem. Integer volutpat nisl nec lectus ultrices pulvinar. Pellentesque
                        gravida mi eget eros iaculis, quis mollis tellus accumsan. Duis non mi quis arcu aliquet elementum
                        in varius leo. Vestibulum sit amet nunc accumsan, vehicula est vitae, ultrices mi. Curabitur
                        consectetur dui vitae pellentesque aliquam. Phasellus id ipsum elit.</p>
                </div>

                <div class="col-sm-5">

                    <div class="head-message">
                        <div class="message-wrap d-flex">
                            <div class="image">
                                <img class="img-fluid" src="/images/web/head-dict.png" alt="Head DICT">
                            </div>
                            <div class="message">
                                <h4 class="heading">FORM THE desk of Head DICT</h4>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam amet ad omnis debitis
                                    sunt velit
                                    Totam amet ad omnis debitis"</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="description-department">

        <div class="container">
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                        type="button" role="tab" aria-controls="pills-all" aria-selected="true">Training</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-vacancy-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-vacancy" type="button" role="tab" aria-controls="pills-vacancy"
                        aria-selected="false">Webiner</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-notice-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-notice" type="button" role="tab" aria-controls="pills-notice"
                        aria-selected="false">Workshop</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-miscell-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-miscell" type="button" role="tab" aria-controls="pills-miscell"
                        aria-selected="false">Miscellaneous</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget pulvinar neque, ac commodo
                        sapien. Phasellus libero est, vestibulum eu congue in, tristique quis nunc. Vivamus felis ipsum,
                        accumsan at tempus in, elementum sed sapien. Nullam eget pharetra metus. Morbi tempus turpis at
                        turpis venenatis gravida. Maecenas ut dui a sem molestie euismod. Praesent a nunc nunc. Morbi dui
                        justo, auctor venenatis ex eu, blandit condimentum metus. Pellentesque laoreet nulla tellus,
                        consequat aliquam orci viverra vitae. Phasellus viverra imperdiet interdum. Integer cursus velit ac
                        ligula euismod ornare.</p>
                    <p>Proin vel arcu suscipit, facilisis nibh vel, aliquet tortor. Nunc id dictum ante. Integer ullamcorper
                        nec risus in luctus. Pellentesque ultrices quam sed leo laoreet facilisis. Nunc tempus nisi eget
                        mattis elementum. Maecenas fringilla facilisis iaculis. Duis ut lorem ac dui porta euismod. Fusce
                        aliquet quam sed ipsum tristique, at rhoncus lacus faucibus. Curabitur ut sagittis velit.</p>
                </div>

                <div class="tab-pane fade" id="pills-vacancy" role="tabpanel" aria-labelledby="pills-vacancy-tab">
                    <p>Mauris porttitor lectus a scelerisque mattis. Pellentesque sodales vel metus ac aliquam. Curabitur ut
                        consequat eros. Quisque efficitur massa eleifend pharetra pellentesque. Cras iaculis semper felis
                        sed sollicitudin. Vestibulum velit risus, vestibulum vel semper eget, dictum id sapien. Donec non
                        blandit velit, nec hendrerit dolor. Suspendisse consectetur elementum justo nec convallis.</p>
                    <p>Quisque sodales eleifend nisi, eu lobortis nisi tempus ut. Nulla hendrerit quis felis porttitor
                        eleifend. Quisque ut feugiat magna. Curabitur rhoncus urna eu leo consequat venenatis. In eu
                        vehicula erat. Nulla facilisi. Mauris vehicula porta viverra. Sed eu efficitur est. Sed risus massa,
                        gravida id rhoncus eget, ullamcorper id neque.</p>
                </div>
                <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                    <p>Quisque pellentesque magna sem, ut venenatis dolor dictum quis. Pellentesque consequat sollicitudin
                        diam, id faucibus neque elementum a. Etiam tellus tortor, gravida ut dignissim ac, varius in lorem.
                        Mauris quis lobortis massa. Morbi purus sapien, rutrum id fringilla nec, interdum ac justo. Donec
                        placerat massa ultrices, tincidunt turpis sit amet, semper est. Pellentesque tempor, dolor quis
                        consequat pellentesque, leo felis dapibus ipsum, id mollis nulla justo quis enim. Integer tellus
                        neque, auctor id interdum ut, rutrum nec enim. Etiam ornare volutpat tortor, et cursus diam
                        hendrerit ac. Curabitur fringilla fermentum ex. Ut rutrum hendrerit mauris sit amet rutrum. Integer
                        non metus massa. Donec auctor ante ac justo finibus, ut fermentum ligula luctus. Vivamus felis nunc,
                        posuere porta nunc consectetur, interdum dapibus nibh. Pellentesque euismod orci lorem. Proin
                        sollicitudin nisl mattis magna malesuada viverra.</p>
                </div>
                <div class="tab-pane fade" id="pills-miscell" role="tabpanel" aria-labelledby="pills-miscell-tab">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget pulvinar neque, ac commodo
                        sapien. Phasellus libero est, vestibulum eu congue in, tristique quis nunc. Vivamus felis ipsum,
                        accumsan at tempus in, elementum sed sapien. Nullam eget pharetra metus. Morbi tempus turpis at
                        turpis venenatis gravida. Maecenas ut dui a sem molestie euismod. Praesent a nunc nunc. Morbi dui
                        justo, auctor venenatis ex eu, blandit condimentum metus. Pellentesque laoreet nulla tellus,
                        consequat aliquam orci viverra vitae. Phasellus viverra imperdiet interdum. Integer cursus velit ac
                        ligula euismod ornare.</p>
                    <p>Proin vel arcu suscipit, facilisis nibh vel, aliquet tortor. Nunc id dictum ante. Integer ullamcorper
                        nec risus in luctus.</p>

                </div>
            </div>
        </div>


    </section>



    <section class="our-staff">

        <div class="over-lyar">
            {{-- <img src="/images/web/logo-mark.png" alt="Watermark of CIET LOGO"> --}}
        </div>

        <div class="container">

            <h2 class="heading uppercase text-light text-center">Our Staff</h2>

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="staff-wrap">
                        <div class="row justify-content-center">
                            <div class="col-sm-3">
                                <div class="single-item">
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
                                <div class="single-item">
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
                                <div class="single-item">
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
                                <div class="single-item">
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

                            {{-- <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="image">
                                        <img class="img-fluid" src="/images/web/DrInduKumar.jpg" alt="">
                                    </div>
                                    <div class="name">Dr. Indu Kumar</div>
                                    <div class="post">Professor</div>
                                    <div class="extn"><i>Extn. Number</i></div>
                                    <div class="number">+91-11-26864801-10 (231)</div>

                                    <a href="" class="profile">View Profile</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-wrap">
        <div class="container">
            <h2 class="heading uppercase text-center">Gallery</h2>

            <div class="gallery" id="lightgallery">

                <div class="g-row d-flex">
                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50">
                                <a href="/images/web/ciet-event-1.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50">
                                <a href="/images/web/ciet-g3.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-25">
                        <div class="block-xs-100">
                            <a href="/images/web/CIET-g2.jpg" class="image">
                                <img class="img-fluid" src="/images/web/CIET-g2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="wrap-50">
                        <div class="block-xs-100 ">
                            <a href="/images/web/CIET-g2.jpg" class="image">
                                <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    
                </div>
                <div class="g-row d-flex">
                    <div class="wrap-25">
                        <div class="block-xs-100">
                            <a href="/images/web/ciet-event-1.jpg" class="image">
                                <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50">
                                <a href="/images/web/CIET-g2.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50">
                                <a href="/images/web/CIET-g2.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-25">
                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50-h-50">
                                <a href="/images/web/ciet-event-1.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50-h-50">
                                <a href="/images/web/ciet-event-1.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-event-1.jpg" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="inner-wrap d-flex">
                            <div class="block-xs-50-h-50">
                                <a href="/images/web/CIET-g2.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                                </a>
                            </div>
                            <div class="block-xs-50-h-50">
                                <a href="/images/web/CIET-g2.jpg" class="image">
                                    <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        
                    </div>

                    <div class="wrap">
                        <div class="block-xs-100">
                            <a href="/images/web/CIET-g2.jpg" class="image">
                                <img class="img-fluid" src="/images/web/ciet-g3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="wrap">
                    <div class="inner-wrap d-flex">
                        <div class="block-xs-25 bg-info"></div>
                        <div class="block-xs-75 bg-danger"></div>
                    </div>
                    <div class="inner-wrap d-flex">
                        <div class="block-xs-50 bg-primary"></div>
                        <div class="block-xs-50 bg-warning"></div>
                    </div>
                    
                </div>
                <div class="wrap">
                    <div class="inner-wrap d-flex">
                        <div class="block-height-50 bg-danger"></div>
                        <div class="inner-wrap w-50">
                            <div class="block-xs-96 bg-secondary"></div>
                            <div class="block-xs-96 mb-0 bg-secondary"></div>
                        </div>
                    </div>
                </div>
                <div class="wrap">
                    <div class="inner-wrap">
                        <div class="block-height-50 w-100 bg-danger"></div>
                    </div>
                </div> --}}

                {{-- <div class="block-sm">
                    <div class="wrap d-flex">
                        <div class="block-xs-25 bg-info"></div>
                        <div class="block-xs-75 bg-danger"></div>
                    </div>
                    <div class="wrap d-flex">
                        <div class="block-xs-50 bg-warning"></div>
                        <div class="block-xs-50 bg-primary"></div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </section>

@endsection

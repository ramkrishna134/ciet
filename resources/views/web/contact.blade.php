@php $lang = $lang ?? null; @endphp

@extends('layouts.app')

@section('title')
    @if(empty($lang) OR $lang === 'en')
    Contact Us |
    @elseif($lang === 'hi')
    संपर्क करें |
    @endif  
@endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}
@section('content')
{{----------- English Content -----------}}
    @if(empty($lang) OR $lang === 'en')
    <section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">Contact us</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

{{----------- Hindi Content -----------}}
    @elseif($lang === 'hi')
    <section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
        <div class="container">
            <div class="content">
                <h1 class="title">संपर्क करें</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">संपर्क करें</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    @endif

{{----------- English Content -----------}}
    <section class="page-content" id="main-content">
        <div class="container">
            <div class="row justify-content-content">
                <div class="col-sm-11">
                    <div class="contact-wrap">

                        <div class="content shadow">
                            <div class="row align-items-streach">
                                <div class="col-sm-5">
        
                                    <div class="address">
                                        @if(empty($lang) OR $lang === 'en')
                                        <h2 class="heading text-light">Central Institute of Educational Technology (NCERT)</h2>
                                        @elseif($lang === 'hi')
                                        <h2 class="heading text-light">केंद्रीय शैक्षिक प्रौद्योगिकी संस्थान (एनसीईआरटी)</h2>
                                        @endif
                                        <hr>
                                        @if(empty($lang) OR $lang === 'en')
                                        <p>
                                            Chacha Neheru Bhaban <br>
                                            National Council of Educational Research and Training, <br>
                                            Sri Arobinda Marg, New Delhi, <br>
                                            Delhi 110016
                                        </p>
                                        @elseif($lang === 'hi')
                                        <p>
                                            चाचा नेहरू भवन <br>
                                            राष्ट्रीय शैक्षिक अनुसंधान और प्रशिक्षण परिषद, <br>
                                            श्री अरबिंद मार्ग, नई दिल्ली, <br>
                                            दिल्ली 110016
                                        </p>
                                        @endif
        
                                        <div class="address-item mb-3">
                                            <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                            <a href="">+91 88004 40559</a> <br>
                                            <a href="">+91 84484 40632</a> <br>
                                            <a href="">+91 84484 40632</a>
                                        </div>
        
                                        <div class="address-item mb-4">
                                            <div class="icon"><i class="fas fa-fax"></i></div>
                                            <a href="">+91 11 2686 4141</a>
                                        </div>
        
                                        <div class="address-item mb-3">
                                            <div class="icon"><i class="fas fa-envelope"></i></div>
                                            <a href="">jdciet.ncert.nic.in</a> <br>
                                            <a href="">dceta.ncert.nic.in</a>
                                        </div>
        
                                        <h5 class="text-light fw-bold">Follow Us</h5>
        
                                        <div class="foot-icon-wrap">
                                            <a href="{{ setting('facebook') }}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{ setting('instagram') }}" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <a href="{{ setting('twitter') }}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="{{ setting('youtube') }}" class="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                            <a href="{{ setting('linkedin') }}" class="linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
        
                                    </div>
        
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-wrap">
                                        @if(empty($lang) OR $lang === 'en')

                                        <h2 class="heading text-primary">Do you have any Query or Feedback?</h2>
                                        <h6 class="mb-4">Please fill-up the form and submit.</h6>

                                        @elseif($lang === 'hi')

                                        <h2 class="heading text-primary">क्या आपके पास कोई प्रश्न या प्रतिक्रिया है?</h2>
                                        <h6 class="mb-4">कृपया फॉर्म भरें और सबमिट करें।</h6>

                                        @endif

                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check mr-1"></i> {{ session('status') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
        
                                        <form action="{{ route('feedback') }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                            placeholder="Full Name">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="tel" class="form-control" name="phone" id="phone"
                                                            placeholder="Phone No.">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Email ID">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="subject" class="form-label">Subject</label>
                                                        <input type="text" class="form-control" name="subject" id="subject"
                                                            placeholder="Subject">

                                                        @error('subject')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label">Message</label>
                                                        <textarea name="message" id="message" class="form-control"></textarea>
                                                        @error('message')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group mt-2 mb-2">
                                                        <div class="captcha">
                                                            <span>{!! captcha_img() !!}</span>
                                                            <button type="button" class="btn btn-primary" class="reload" id="reload">
                                                                &#x21bb;
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                                        @error('captcha')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
        
                                            </div>
        
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </form>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
        
        
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="map-section">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7215.5036577015135!2d77.19579553242993!3d28.538330007791462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2065c7cfa83%3A0x8262f9426abf8716!2sCentral%20Institute%20of%20Educational%20Technology%20NCERT!5e0!3m2!1sen!2sin!4v1649168717904!5m2!1sen!2sin"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#reload').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
        })
    </script>
@endsection

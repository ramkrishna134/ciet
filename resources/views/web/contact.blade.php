@extends('layouts.app')

@section('title') Contact | @endsection
{{-- @section('description'){{ $page->description }}@endsection
@section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')

<section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Contact Us</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                </ol>
              </nav>
        </div>
        
    </div>
</section>

<section class="page-content">
    <div class="container">
        <div class="contact-wrap">

            <div class="content shadow">
                <div class="row align-items-streach">
                    <div class="col-sm-5">

                        <div class="address">
                            <h2 class="heading text-light">Central Institute of Educational Technology (NCERT)</h2>
                            <hr>
                            <p>
                                Chacha Neheru Bhaban <br>
                                National Council of Educational Research and Training, <br>
                                Sri Arobinda Marg, New Delhi, <br>
                                Delhi 110016
                            </p>

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
                                <a href="" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="" class="youtube"><i class="fab fa-youtube"></i></a>
                              </div>
                            
                        </div> 

                    </div>
                    <div class="col-sm-7">
                        <div class="form-wrap">
                            <h2 class="heading text-primary">Have you any Query or Feedback?</h2>

                            <h6 class="mb-4">Please fill up the form and submit.</h6>

                            <form action="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone No.">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email ID">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea name="message" id="message" class="form-control"></textarea>
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
</section>



<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7215.5036577015135!2d77.19579553242993!3d28.538330007791462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2065c7cfa83%3A0x8262f9426abf8716!2sCentral%20Institute%20of%20Educational%20Technology%20NCERT!5e0!3m2!1sen!2sin!4v1649168717904!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>




@endsection
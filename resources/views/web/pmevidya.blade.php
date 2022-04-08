@extends('layouts.app')

@section('title')
    PMeVidya |
@endsection
@section('description')
    PM eVidya is an innovative and unique initiative by the Ministry of Education, Government of India to facilitate
    learning and teaching at school level. It offers multifarious educational resources in multi-platform mode viz.
    digital/online, TV, radio, community radio, podcast etc.
@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')
    <section class="project-hero" style="background-image: url('images/web/depart-hero.jpg')">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div class="image">
                                    <img class="img-fluid" src="/images/web/1-04.png" alt="">
                                </div>
                            </div>
                            <div class="col-9">
                                <h1 class="title mb-1">PMeVidya</h1>

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">PMeVidya</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-content">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <p>PM eVidya is an innovative and unique initiative by the Ministry of Education, Government of India to
                        facilitate learning and teaching at school level. It offers multifarious educational resources in
                        multi-platform mode viz. digital/online, TV, radio, community radio, podcast etc. The multi-modal
                        components
                        of PM eVidya initiative are:</p>

                    <div class="content p-2 border rounded mb-3 shadow">
                        <ul>
                            <li><span>DIKSHA:</span> as One Nation-One Digital Platform, hosts plenty of multi-modal education
                                contents free
                                for the use of learners, teachers and any stakeholder working in the field of education. </li>
                            <li><span>12 TV Channels:</span> One of the major components of PM eVidya initiative is ‘One
                                Class-One Channel’ where 12 DTH television channels are dedicated for the transmission of
                                education contents for Class 1 to 12 based on NCERT curriculum.
                                Details of Service providers for PMeVidya TV Channels</li>
                            <li><span>SWAYAM Courses in MOOC’s Format:</span> It offers MOOCs (Massive Open Online Courses)
                                pertaining to school education are offered through SWAYAM Portal.</li>
                            <li><span>Community Radio and Podcast:</span> It includes transmission of educational contents
                                through radio and podcast. </li>
                            <li><span>Educational eContents for DIVYANG on DAISY and in Sign Language:</span>Educational
                                eContents for DIVYANG on DAISY and in Sign Language: Educational content to serve Children With
                                Special Needs (CWSN).</li>
                            <li><span>IIT-PAL for IIT/JEE Preparation:</span> IIT-PAL (Indian Institute of Technology- Professor
                                Assisted Learning) is designed to serve the students preparing for competitive exams.</li>
                        </ul>
                    </div>

                    <h2 class="heading text-center">Vidya Daan (VDN 3.0)</h2>
                    <p>In the unprecedented time of COVID-19 pandemic, education is now increasingly resourced and conducted
                        through digital media. This ensures continuous and enhanced learning of students through exposure to
                        a variety of course materials on different platforms. With the objective to make the remote learning
                        meaningful and effective for all the teachers and students across all the States and UTs of India,
                        Hon’ble Minister of Education launched Vidya Daan program on 21st April’ 20. This program, under the
                        PM eVidya initiative of Government of India, envisions the accessibility of quality digital content
                        in different languages on all topics of all the disciplinary subjects to the school students through
                        DIKSHA platform.</p>

                    <h2 class="heading text-center">12 DTH Educational TV Channel Transmission Schedule</h2>
                </div>
            </div>


            <div class="class-wrap">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            <div class="class-name">
                                Class 1
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="class-item" style="background-image:url('/images/web/tv-icon.png')">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

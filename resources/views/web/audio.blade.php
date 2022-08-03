@extends('layouts.app')

@php
 $parameter = $_GET;
@endphp

@section('title')Audio Books | @endsection
@section('description')@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')


<section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Audio Books</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Audio Books</li>
                </ol>
            </nav>
        </div>

    </div>
</section>

<section class="page-content audio-book" id="main-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <form action="{{ route('audio.list') }}">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <div class="card book-filter">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="class">Class</label>
                                                <select name="class" id="class" class="form-control">
                                                    <option value="">-- All Classes ---</option>

                                                    @if(!empty($params['class']))
                                                    <option value="1" @if(1 == $params['class']) selected @endif>Class 1</option>
                                                    <option value="2" @if(2 == $params['class']) selected @endif>Class 2</option>
                                                    <option value="3" @if(3 == $params['class']) selected @endif>Class 3</option>
                                                    <option value="4" @if(4 == $params['class']) selected @endif>Class 4</option>
                                                    <option value="5" @if(5 == $params['class']) selected @endif>Class 5</option>
                                                    <option value="6" @if(6 == $params['class']) selected @endif>Class 6</option>
                                                    <option value="7" @if(7 == $params['class']) selected @endif>Class 7</option>
                                                    <option value="8" @if(8 == $params['class']) selected @endif>Class 8</option>
                                                    <option value="9" @if(9 == $params['class']) selected @endif>Class 9</option>
                                                    <option value="10" @if(10 == $params['class']) selected @endif>Class 10</option>
                                                    <option value="11" @if(11 == $params['class']) selected @endif>Class 11</option>
                                                    <option value="12" @if(12 == $params['class']) selected @endif>Class 12</option>
                                                    <option value="other" @if('other' === $params['class']) selected @endif>Other</option>

                                                    @else
                                                    <option value="1">Class 1</option>
                                                    <option value="2">Class 2</option>
                                                    <option value="3">Class 3</option>
                                                    <option value="4">Class 4</option>
                                                    <option value="5">Class 5</option>
                                                    <option value="6">Class 6</option>
                                                    <option value="7">Class 7</option>
                                                    <option value="8">Class 8</option>
                                                    <option value="9">Class 9</option>
                                                    <option value="10">Class 10</option>
                                                    <option value="11">Class 11</option>
                                                    <option value="12">Class 12</option>
                                                    <option value="other">Other</option>

                                                    @endif
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <select name="subject" id="subject" class="form-control">
                                                    <option value="">-- All Subjects ---</option>
    
                                                    @if(!empty($params['subject']))
    
                                                    <option value="English" @if($params['subject'] === 'English') selected @endif>English</option>
                                                    <option value="Hindi" @if($params['subject'] === 'Hindi') selected @endif>Hindi</option>
                                                    <option value="Urdu" @if($params['subject'] === 'Urdu') selected @endif>Urdu</option>
                                                    <option value="Sanskrit" @if($params['subject'] === 'Sanskrit') selected @endif>Sanskrit</option>
                                                    <option value="Accountancy" @if($params['subject'] === 'Accountancy') selected @endif>Accountancy</option>
                                                    <option value="Chemistry" @if($params['subject'] === 'Chemistry') selected @endif>Chemistry</option>
                                                    <option value="Mathematics" @if($params['subject'] === 'Mathematics') selected @endif>Mathematics</option>
                                                    <option value="Biology" @if($params['subject'] === 'Biology') selected @endif>Biology</option>
                                                    <option value="Psychology" @if($params['subject'] === 'Psychology') selected @endif>Psychology</option>
                                                    <option value="Geography" @if($params['subject'] === 'Geography') selected @endif>Geography</option>
                                                    <option value="Physics" @if($params['subject'] === 'Physics') selected @endif>Physics</option>   
                                                    <option value="Sociology" @if($params['subject'] === 'Sociology') selected @endif>Sociology</option>   
                                                    <option value="Political Science" @if($params['subject'] === 'Political Science') selected @endif>Political Science</option>
                                                    <option value="History" @if($params['subject'] === 'History') selected @endif>History</option>
                                                    <option value="Economics" @if($params['subject'] === 'Economics') selected @endif>Economics</option>
                                                    <option value="Business Studies" @if($params['subject'] === 'Business Studies') selected @endif>Business Studies</option>
                                                    <option value="Computers and Communication Technology" @if($params['subject'] === 'Computers and Communication Technology') selected @endif>Computers and Communication Technology</option>
                                                    <option value="Computer Science" @if($params['subject'] === 'Computer Science') selected @endif>Computer Science</option>
                                                    <option value="Informatics Practice" @if($params['subject'] === 'Informatics Practice') selected @endif>Informatics Practice</option>
                                                    <option value="Fine Art" @if($params['subject'] === 'Fine Art') selected @endif>Fine Art</option>
                                                    <option value="Biotechnology" @if($params['subject'] === 'Biotechnology') selected @endif>Biotechnology</option>
                                                    <option value="Home Science" @if($params['subject'] === 'Home Science') selected @endif>Home Science</option>
                                                    <option value="Creative Writing and Translation" @if($params['subject'] === 'Creative Writing and Translation') selected @endif>Creative Writing and Translation</option>
                                                    <option value="Sangeet" @if($params['subject'] === 'Sangeet') selected @endif>Sangeet</option>
                                                    <option value="NEP 2020" @if($params['subject'] === 'NEP 2020') selected @endif>NEP 2020</option>
    
                                                    @else
    
                                                    <option value="English">English</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="Urdu">Urdu</option>
                                                    <option value="Sanskrit">Sanskrit</option>
                                                    <option value="Accountancy">Accountancy</option>
                                                    <option value="Chemistry">Chemistry</option>
                                                    <option value="Mathematics">Mathematics</option>
                                                    <option value="Biology">Biology</option>
                                                    <option value="Psychology">Psychology</option>
                                                    <option value="Geography">Geography</option>
                                                    <option value="Physics">Physics</option>   
                                                    <option value="Sociology">Sociology</option>   
                                                    <option value="Political Science">Political Science</option>
                                                    <option value="History">History</option>
                                                    <option value="Economics">Economics</option>
                                                    <option value="Business Studies">Business Studies</option>
                                                    <option value="Computers and Communication Technology">Computers and Communication Technology</option>
                                                    <option value="Computer Science">Computer Science</option>
                                                    <option value="Informatics Practice">Informatics Practice</option>
                                                    <option value="Fine Art">Fine Art</option>
                                                    <option value="Biotechnology">Biotechnology</option>
                                                    <option value="Home Science">Home Science</option>
                                                    <option value="Creative Writing and Translation">Creative Writing and Translation</option>
                                                    <option value="Sangeet">Sangeet</option>
                                                    <option value="NEP 2020">NEP 2020</option>
    
                                                    @endif
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lang">Language</label>
                                                <select name="lang" id="lang" class="form-control">
                                                    <option value="">-- All Languages ---</option>
    
                                                    @if(!empty($params['lang']))
                                                    <option value="en" @if('en' == $params['lang']) selected @endif>English</option>
                                                    <option value="hi" @if('hi' == $params['lang']) selected @endif>Hindi</option>
                                                    <option value="ur" @if('ur' == $params['lang']) selected @endif>Urdu</option>
                                                    @else
                                                    <option value="en">English</option>
                                                    <option value="hi">Hindi</option>
                                                    <option value="ur">Urdu</option>
                                                    @endif
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fas fa-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Class Wrap --}}

                    @if(empty($parameter))

                    <div class="class-wrap">
                        <div class="row justify-content-center">
                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 1]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class I</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 2]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class II</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 3]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class III</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 4]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class IV</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 5]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class V</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 6]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class VI</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 7]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class VII</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 8]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class VIII</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 9]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class IX</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 10]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class X</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 11]) }}" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>Class XI</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="{{ route('audio.list',['class' => 12]) }}" class="class-item">
                                    <div class="girl">
                                        <img class="img-fluid" src="/images/web/girl.png" alt="">
                                    </div>
                                    <span>Class XII</span>
                                </a>
                            </div>

                            <div class="col-sm-3">
                                <a href="" class="class-item">
                                    <div class="boy">
                                        <img class="img-fluid" src="/images/web/boy.png" alt="">
                                    </div>
                                    <span>NEP 2020</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    @else

                    {{-- Book Wrap --}}
                    <div class="book-wrap">
                        <div class="row justify-content-center">

                            @foreach($books as $book)
                            <div class="col-sm-3">
                                <a href="{{ route('audio.book', $book) }}" class="book-item shadow">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="image">
                                                <img class="img-fluid" src="{{ $book->cover }}" alt="{{ $book->name }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="name mb-2">{{ $book->name }}</div>
                                            <p class="mb-1 badge bg-primary text-white">
                                                @php
                                                $class = intval($book->class);
                                                @endphp
                                                @if($class <= 12)
                                                Class {{ $book->class }}
                                                @else
                                                {{ $book->class }}
                                                @endif
                                                
                                            </p>
                                            <p class="mb-0 subject">Subject: {{ $book->subject }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            
                        </div>

                        @if (count($books) == 0)
                            <h5 class="text-center">No Books found ...</h5>
                        @endif
                    </div>

                    @endif


                </form>

                
            </div>
        </div>
    </div>

</section>

@endsection
@php
    $book = $book ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $book ? "Edit Book" : "Add Book" }}
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            <a href="{{ route('book.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View All Book</a>
        </div>
        <div class="col-sm-4 text-end">
        </div>
    </div>
</section>

<hr>

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

<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card border border-white rounded shadow">
            <div class="card-body">
                <form action="{{ $book ? route('book.update', $book) : route('book.store') }}" method="post">
                    @csrf
                    @method( $book ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Book name" value="{{ $book->name ?? old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select name="subject" id="subject" class="form-control">
                                    <option value="">-- Select Subject --</option>

                                    @if(!empty($book->subject))

                                    <option value="English" @if($book->subject === 'English') selected @endif>English</option>
                                    <option value="Hindi" @if($book->subject === 'Hindi') selected @endif>Hindi</option>
                                    <option value="Urdu" @if($book->subject === 'Urdu') selected @endif>Urdu</option>
                                    <option value="Sanskrit" @if($book->subject === 'Sanskrit') selected @endif>Sanskrit</option>
                                    <option value="Accountancy" @if($book->subject === 'Accountancy') selected @endif>Accountancy</option>
                                    <option value="Chemistry" @if($book->subject === 'Chemistry') selected @endif>Chemistry</option>
                                    <option value="Mathematics" @if($book->subject === 'Mathematics') selected @endif>Mathematics</option>
                                    <option value="Biology" @if($book->subject === 'Biology') selected @endif>Biology</option>
                                    <option value="Psychology" @if($book->subject === 'Psychology') selected @endif>Psychology</option>
                                    <option value="Geography" @if($book->subject === 'Geography') selected @endif>Geography</option>
                                    <option value="Physics" @if($book->subject === 'Physics') selected @endif>Physics</option>   
                                    <option value="Sociology" @if($book->subject === 'Sociology') selected @endif>Sociology</option>   
                                    <option value="Political Science" @if($book->subject === 'Political Science') selected @endif>Political Science</option>
                                    <option value="History" @if($book->subject === 'History') selected @endif>History</option>
                                    <option value="Economics" @if($book->subject === 'Economics') selected @endif>Economics</option>
                                    <option value="Business Studies" @if($book->subject === 'Business Studies') selected @endif>Business Studies</option>
                                    <option value="Computers and Communication Technology" @if($book->subject === 'Computers and Communication Technology') selected @endif>Computers and Communication Technology</option>
                                    <option value="Computer Science" @if($book->subject === 'Computer Science') selected @endif>Computer Science</option>
                                    <option value="Informatics Practice" @if($book->subject === 'Informatics Practice') selected @endif>Informatics Practice</option>
                                    <option value="Fine Art" @if($book->subject === 'Fine Art') selected @endif>Fine Art</option>
                                    <option value="Biotechnology" @if($book->subject === 'Biotechnology') selected @endif>Biotechnology</option>
                                    <option value="Home Science" @if($book->subject === 'Home Science') selected @endif>Home Science</option>
                                    <option value="Creative Writing and Translation" @if($book->subject === 'Creative Writing and Translation') selected @endif>Creative Writing and Translation</option>
                                    <option value="Sangeet" @if($book->subject === 'Sangeet') selected @endif>Sangeet</option>
                                    <option value="NEP 2020" @if($book->subject === 'NEP 2020') selected @endif>NEP 2020</option>

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

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Class" class="form-label">Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="">-- Select Classes ---</option>

                                    @if(!empty($book))
                                    <option value="1" @if($book->class === '1') selected @endif>Class 1</option>
                                    <option value="2" @if($book->class === '2') selected @endif>Class 2</option>
                                    <option value="3" @if($book->class === '3') selected @endif>Class 3</option>
                                    <option value="4" @if($book->class === '4') selected @endif>Class 4</option>
                                    <option value="5" @if($book->class === '5') selected @endif>Class 5</option>
                                    <option value="6" @if($book->class === '6') selected @endif>Class 6</option>
                                    <option value="7" @if($book->class === '7') selected @endif>Class 7</option>
                                    <option value="8" @if($book->class === '8') selected @endif>Class 8</option>
                                    <option value="9" @if($book->class === '9') selected @endif>Class 9</option>
                                    <option value="10" @if($book->class === '10') selected @endif>Class 10</option>
                                    <option value="11" @if($book->class === '11') selected @endif>Class 11</option>
                                    <option value="12" @if($book->class === '12') selected @endif>Class 12</option>
                                    <option value="NEP 20" @if($book->class === 'NEP 20') selected @endif>NEP 20</option>

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
                                    <option value="NEP 20">NEP 20</option>
                                    @endif
                                    
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('cover') is-invalid @enderror" type="text" name="cover" value="{{ $book->cover ?? old('cover') }}">
                                    <div id="holder" style="margin-top:5px;width:100%;">
                                        @if(!empty($book))
                                        <img class="img-fluid" src="{{ $book->cover }}">          
                                        @endif
                                    </div>
                                </div>
                                @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lang" class="form-label">Language</label>
                                <select name="lang" id="lang" class="form-control">
                                    @if(!empty($book))
                                        <option value="en" @if($book->lang === 'en') selected @endif>English</option>
                                        <option value="hi" @if($book->lang === 'hi') selected @endif>Hindi</option>
                                        <option value="ur" @if($book->lang === 'ur') selected @endif>Urdu</option>        
                                    @else
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
                                    @endif
                                    
                                </select>
                                @error('lang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">

                                    @if(!empty($book))
                                        <option value="0" @if($book->status == 0) selected @endif>Darft</option>
                                        <option value="1" @if($book->status == 1) selected @endif>Published</option>           
                                    @else
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="button text-center">
                        <button type="submit" class="btn btn-success btn-lg">{{ $book ? "Update" : "Create" }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</div>

<script>
    $(document).ready(function(){
        $('#image').filemanager('image');
    })

    
</script>

@endsection
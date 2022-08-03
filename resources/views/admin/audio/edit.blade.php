@php
    $audio = $audio ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $audio ? "Edit Audio" : "Add Audio" }}
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            <a href="{{ route('audio.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> All Audios</a>
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
                <form action="{{ $audio ? route('audio.update', $audio) : route('audio.store') }}" method="post">
                    @csrf
                    @method( $audio ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Audio Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Audio name" value="{{ $audio->name ?? old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="book_id" class="form-label">Book</label>
                                <select name="book_id" id="book_id" class="form-control">
                                    <option value="">-- Select Book --</option>
                                    
                                    @if(!empty($audio))

                                    @foreach($books as $book)
                                    <option value="{{ $book->id }}" @if($audio->book_id == $book->id) selected @endif>{{ $book->name }}</option>
                                    @endforeach

                                    @else

                                    @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach

                                    @endif
                                    
                                </select>

                                @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cover" class="form-label">Upload File</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="audio_file" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose File
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('file') is-invalid @enderror" type="text" name="file" value="{{ $audio->file ?? old('file') }}">
                                    <div id="holder" style="margin-top:5px;width:100%;">
                                        {{-- @if(!empty($file))
                                        <img class="img-fluid" src="{{ $book->cover }}">          
                                        @endif --}}
                                    </div>
                                </div>
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        

                    </div>

                    <div class="button text-center">
                        <button type="submit" class="btn btn-success btn-lg">{{ $audio ? "Update" : "Create" }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</div>

<script>
    $(document).ready(function(){
        $('#audio_file').filemanager('file');
    })

    
</script>

@endsection
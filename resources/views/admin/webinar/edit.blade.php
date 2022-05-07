@php
    $webinar = $webinar ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $webinar ? "Edit Webinar" : "Add Webinar" }}
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            <a href="{{ route('webinar.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View Webinar</a>
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
                <form action="{{ $webinar ? route('webinar.update', $webinar) : route('webinar.store') }}" method="post">
                    <form action="" method="post">
                    @csrf
                    @method( $webinar ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ $webinar->title ?? old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    <option value="ict-tool">ICT Tools</option>
                                    <option value="listen-learn">Listening to Learn Series</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Resource Person" class="form-label">Resource Person</label>
                                <textarea style="height:120px;" type="text" class="form-control @error('res_person') is-invalid @enderror" name="res_person" id="res_person" placeholder="Resource Person">{{ $webinar->res_person ?? old('res_person') }}</textarea>
                                @error('res_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="presentation" class="form-label">Presentation PDF</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lmf" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('ppt') is-invalid @enderror" type="text" name="ppt" value="{{ $webinar->ppt ?? old('ppt') }}">
                                    {{-- <div id="holder" style="margin-top:5px;width:100%;">
                                    </div> --}}
                                </div>
                                @error('ppt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="video" class="form-label">Video URL</label>
                                <input type="url" class="form-control @error('video') is-invalid @enderror" name="video" id="video" placeholder="Video Url" value="{{ $webinar->video ?? old('video') }}">
                                @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Webinar Date" class="form-label">Webinar Date</label>
                                <input type="date" class="form-control @error('web_date') is-invalid @enderror" name="web_date" id="web_date" placeholder="Webinar Date" value="{{ $webinar->web_date ?? old('web_date') }}">
                                @error('web_date')
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
                                    @if(!empty($event))
                                        <option value="en" @if($event->lang === 'en') selected @endif>English</option>
                                        <option value="hi" @if($event->lang === 'hi') selected @endif>Hindi</option>           
                                    @else
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
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

                                    @if(!empty($infrastructure))
                                        <option value="0" @if($webinar->status == 0) selected @endif>Darft</option>
                                        <option value="1" @if($webinar->status == 1) selected @endif>Published</option>           
                                    @else
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Banner</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-btn">
                                    <a id="image" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose Image
                                    </a>
                                    </span>
                                    <input id="thumbnail2" class="form-control" type="text" name="image">
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    
                                <div id="holder2" style="margin-top:5px;width:100%;">
                                    <img class="img img-fluid mb-2" src="" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="button text-center">
                        <button type="submit" class="btn btn-success btn-lg">{{ $webinar ? "Update" : "Create" }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</div>

<script>
    $(document).ready(function(){
        $('#image').filemanager('image');
        $('#lmf').filemanager('file');
    })

    
</script>

@endsection
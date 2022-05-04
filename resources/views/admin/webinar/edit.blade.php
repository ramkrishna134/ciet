@php
    $webinar = $webinar ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $webinar ? "Edit Webinar" : "Add Webinar" }}
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

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
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Resource Person" class="form-label">Resource Person</label>
                                <input type="text" class="form-control @error('res_person') is-invalid @enderror" name="res_person" id="res_person" placeholder="Resource Person" value="{{ $webinar->res_person ?? old('res_person') }}">
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
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('ppt') is-invalid @enderror" type="text" name="ppt" value="{{ $webinar->ppt ?? old('ppt') }}">
                                    <div id="holder" style="margin-top:5px;width:100%;">
                                    </div>
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
                                <select class="form-control @error('lang') is-invalid @enderror" name="lang" id="lang" value="{{ $webinar->lang ?? old('lang') }}">
                                    <option value="">-- Select Language --</option>
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
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
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $webinar ? "Update" : "Create" }}</button>
                </form>
            </div>
        </div>
    </div>

    
</div>

<script>
    $(document).ready(function(){
        $('#lfm').filemanager('file');
        
    })

    
</script>

@endsection
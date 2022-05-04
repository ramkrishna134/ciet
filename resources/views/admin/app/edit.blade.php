@php
    $application = $application ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $application ? "Edit Mobile Application" : "Add Mobile Application" }}
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
            <a href="{{ route('app.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View All Mobile Apps</a>
        </div>
        <div class="col-sm-4 text-end">
            {{-- <a href="{{ route('infrastructure.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View Infrastructure</a> --}}
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
                {{-- <form action="" method="post"> --}}
                <form action="{{ $application ? route('app.update', $application) : route('app.store') }}" method="post">
                    @csrf
                    @method( $application ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ $application->title ?? old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Featured Icon</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('icon') is-invalid @enderror" type="text" name="icon" value="{{ $application->icon ?? old('icon') }}">
                                    <div id="holder" style="margin-top:5px;width:100%;">
                                       
                                    </div>
                                </div>
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Url" class="form-label">Mapping URL</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" id="url" placeholder="Mapping URL" value="{{ $application->url ?? old('url') }}">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Android" class="form-label">Android Link</label>
                                <input type="url" class="form-control @error('android') is-invalid @enderror" name="android" id="android" placeholder="Android Link" value="{{ $application->android ?? old('android') }}">
                                @error('android')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Ios" class="form-label">IOS Link</label>
                                <input type="url" class="form-control @error('ios') is-invalid @enderror" name="ios" id="ios" placeholder="IOS Link" value="{{ $application->ios ?? old('ios') }}">
                                @error('ios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Ios" class="form-label">Windows Link</label>
                                <input type="url" class="form-control @error('window') is-invalid @enderror" name="window" id="window" placeholder="Windows Link" value="{{ $application->window ?? old('window') }}">
                                @error('window')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lang" class="form-label">Language</label>
                                <select class="form-control @error('lang') is-invalid @enderror" name="lang" id="lang" value="{{ $application->lang ?? old('lang') }}">
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

                                    @if(!empty($application))
                                        <option value="0" @if($application->status == 0) selected @endif>Darft</option>
                                        <option value="1" @if($application->status == 1) selected @endif>Published</option>           
                                    @else
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $application ? "Update" : "Create" }}</button>
                </form>
            </div>
        </div>
    </div>

    
</div>

<script>
    $(document).ready(function(){
        $('#lfm').filemanager('image');
        
    })

    
</script>

@endsection
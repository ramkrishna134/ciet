@php
    $infrastructure = $infrastructure ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $infrastructure ? "Edit Infrastructure" : "Add Infrastructure" }}
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
            {{-- <h3>{{ $infrastructure ? "Edit Infrastructure" : "Add Infrastructure" }}</h3> --}}
            <a href="{{ route('infrastructure.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View Infrastructure</a>
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
                <form action="{{ $infrastructure ? route('infrastructure.update', $infrastructure) : route('infrastructure.store') }}" method="post">
                    @csrf
                    @method( $infrastructure ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ $infrastructure->title ?? old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Featured Icon</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fas fa-file-image"></i> Choose
                                    </a>
                                    </span>
                                    <input id="thumbnail" class="form-control  @error('icon') is-invalid @enderror" type="text" name="icon" value="{{ $infrastructure->icon ?? old('icon') }}">
                                    <div id="holder" style="margin-top:5px;width:100%;">
                                        {{-- @if(!empty($page->featured_icon))
                                        <img src="{{ $page->featured_icon }}" alt="">
                                        @endif --}}
                                    </div>
                                </div>
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Mapping URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" placeholder="Mapping URL" value="{{ $infrastructure->url ?? old('url') }}">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lang" class="form-label">Language</label>
                                <select class="form-control @error('lang') is-invalid @enderror" name="lang" id="lang" value="{{ $infrastructure->lang ?? old('lang') }}">
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
                                        <option value="0" @if($infrastructure->status == 0) selected @endif>Darft</option>
                                        <option value="1" @if($infrastructure->status == 1) selected @endif>Published</option>           
                                    @else
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $infrastructure ? "Update" : "Create" }}</button>
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
@php
    $initiative = $initiative ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $initiative ? "Edit Initiative" : "Add Initiative" }}
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/css/grapes.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{asset('vendor/laraberg/js/laraberg.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/grapes.min.js"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            {{-- <h3>{{ $infrastructure ? "Edit Infrastructure" : "Add Infrastructure" }}</h3> --}}
            <a href="{{ route('initiative.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View Initiatives</a>
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


<form action="{{ $initiative ? route('initiative.update', $initiative) : route('initiative.store') }}" method="post">
    @csrf
    @method( $initiative ? 'put' : 'post')
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card border border-white rounded shadow">
                <div class="card-body">
                    

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $initiative->name ?? '' }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $initiative->slug ?? '' }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Short Description</label>
                                    <textarea name="description" id="description" class="form-control">{{ $initiative->description ?? '' }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                
        
                        <textarea name="content" id="content" hidden>{!! $initiative->content ?? old('content') !!}</textarea>
                        

                        
                    
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="lang" class="form-label">Language</label>
                        <select class="form-control @error('lang') is-invalid @enderror" name="lang" id="lang" >
                            @if(!empty($initiative))
                                <option value="en" @if($initiative->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($initiative->lang === 'hi') selected @endif>Hindi</option>           
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

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">

                            @if(!empty($initiative))
                                <option value="0" @if($initiative->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($initiative->status == 1) selected @endif>Published</option>           
                            @else
                            <option value="0">Darft</option>
                            <option value="1">Published</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" class="form-control" name="order" id="order" placeholder="Order by Number" value="{{ $initiative->order ?? old('order') }}">

                        @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">{{ $initiative ? "Update" : "Create" }}</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Icon</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fas fa-file-image"></i> Choose
                            </a>
                            </span>
                            <input id="thumbnail" class="form-control  @error('icon') is-invalid @enderror" type="text" name="icon" value="{{ $initiative->icon ?? old('icon') }}">
                            <div id="holder" style="margin-top:5px;width:100%;">
                                @if(!empty($initiative->icon))
                                <img style="width: 200px;" src="{{ $initiative->icon }}" alt="">
                                @endif
                            </div>
                        </div>
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="web_link" class="form-label">Website</label>
                        <input type="text" name="web_link" id="web_link" class="form-control" placeholder="Website" value="{{ $initiative->web_link ?? '' }}">
                        @error('web_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="play_store" class="form-label">PlayStore Link</label>
                        <input type="text" name="play_store" id="play_store" class="form-control" placeholder="Play Store">
                    </div>

                    <div class="mb-3">
                        <label for="apple_store" class="form-label">Apple Store Link</label>
                        <input type="text" name="apple_store" id="apple_store" class="form-control" placeholder="Apple Store Link">
                    </div>

                    <div class="mb-3">
                        <label for="window_store" class="form-label">Window Store Link</label>
                        <input type="text" name="window_store" id="window_store" class="form-control" placeholder="Window Store Link">
                    </div>

                    <div class="mb-3">
                        <label for="key_word" class="form-label">Meta Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $initiative->key_word ?? old('key_word') }}">
                        @error('key_word')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                </div>
            </div>
        </div>

        
    </div>

</form>

<script>
    $(document).ready(function(){

        Laraberg.init('content', { 
            laravelFilemanager: true,
        });

        

        $('#lfm').filemanager('image');

        $('#icon').filemanager('image');
        
    })
 
</script>

@endsection
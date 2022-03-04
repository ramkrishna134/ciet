@php
    $page = $page ?? null;
@endphp

@extends('layouts.sidebar')

<style>
    .sidebar{
        display: none;
    }

    .main{
        padding-left: 0px !important;
    }

    #holder img{
        height: auto !impotant;
        max-height: 150px;
        width: 100%;
    }
</style>

@section('title')
<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> All Pages</a>   {{ $page ? "Edit Page" : "Add New Page" }}
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


<form action="{{ $page ? route('page.update', $page) : route('page.store') }}" method="POST">

    @csrf
    @method( $page ? 'put' : 'post')

    <section class="hero-section sticky-top">
        <div class="card border-white rounded">
            <div class="card-body shadow">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Page Title" value="{{ $page->title ?? old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ $page->slug ?? old('slug') }}">
                            @if (!empty($page))
                            <div class="input-group-append">
                                <a href="{{ url($page->slug,$page->lang) }}" target="_blank" class="btn btn-primary btn-lg"><i class="fas fa-eye"></i></a>
                            </div>
                            @endif
                          </div>
                        
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <select name="status" id="status" class="form-control">

                            @if(!empty($page))
                                <option value="0" @if($page->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($page->status == 1) selected @endif>Published</option>           
                            @else
                            <option value="0">Darft</option>
                            <option value="1">Published</option>
                            @endif
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-1">
                        <select name="lang" id="lang" class="form-control">
                            @if(!empty($page))
                                <option value="en" @if($page->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($page->lang === 'hi') selected @endif>Hindi</option>           
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
                    <div class="col-sm-1 text-end">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $page ? "Update" : "Create" }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <div class="row">
        <div class="col-sm-9">
            <div class="card border-white rounded">
                <div class="card-body shadow">
        
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                
        
                    <textarea name="content" id="content" hidden>{!! $page->content ?? old('content') !!}</textarea>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card border-white rounded sticky-top inner-sidebar">
                <div class="card-body shadow">

                    @if(!empty($page))
                    <small>Created at: {{ $page->created_at->diffForHumans() }}</small><br>
                    <small>Updated at: {{ $page->updated_at->diffForHumans() }}</small>
                    @endif
                    <hr>

                    <label for="" class="form-label">Featured Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="filepath" value="{{ $page->featured_icon ?? old('filepath') }}">
                    </div>
                    <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty($page->featured_icon))
                        <img src="{{ $page->featured_icon }}" alt="">
                        @endif
                    </div>

                     <hr>

                     <div class="mb-3">
                        <label for="description" class="form-label">Descripion</label>
                        <textarea name="description" id="description" class="form-control">{{ $page->description ?? old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="key_word" class="form-label">Meta Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $page ? json_decode($page->key_word) : old('key_word') }}">
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
        
    })


    
</script>

@endsection
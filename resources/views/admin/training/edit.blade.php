@php
    $training = $training ?? null;
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
<a href="{{ route('training.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> All trainings</a>   {{ $training ? "Edit training" : "Add New training" }}
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


<form action="{{ $training ? route('training.update', $training) : route('training.store') }}" method="POST">

    @csrf
    @method( $training ? 'put' : 'post')

    <section class="hero-section sticky-top">
        <div class="card border-white rounded">
            <div class="card-body shadow">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" id="title" placeholder="training Title" value="{{ $training->title ?? old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ $training->slug ?? old('slug') }}">
                            @if (!empty($training))
                            <div class="input-group-append">
                                <a href="{{ url($training->slug,$training->lang) }}" target="_blank" class="btn btn-primary btn-lg"><i class="fas fa-eye"></i></a>
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

                            @if(!empty($training))
                                <option value="0" @if($training->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($training->status == 1) selected @endif>Published</option>           
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
                            @if(!empty($training))
                                <option value="en" @if($training->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($training->lang === 'hi') selected @endif>Hindi</option>           
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
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $training ? "Update" : "Create" }}</button>
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

                
        
                    <textarea name="content" id="content" hidden>{!! $training->content ?? old('content') !!}</textarea>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card border-white rounded sticky-top inner-sidebar">
                <div class="card-body shadow">

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $training->start_date ?? old('start_date') }}" placeholder="training Start Date">
                        </div>
                        <div class="col-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $training->end_date ?? old('end_date') }}" placeholder="training End Date">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">-- Select Category ---</option>

                            @if(!empty($training))

                            <option value="Upcoming" @if($training->category === 'Upcoming') selected @endif>Upcoming</option>
                            <option value="Ongoing" @if($training->category === 'Ongoing') selected @endif>Ongoing</option>
                            <option value="Past" @if($training->category === 'Past') selected @endif>Past</option>
                            @else
                            <option value="Upcoming">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Past">Past</option>
                            @endif
                        </select>
                    </div>
                   

                    @if(!empty($training))
                    <small>Created at: {{ $training->created_at->diffForHumans() }}</small><br>
                    <small>Updated at: {{ $training->updated_at->diffForHumans() }}</small>
                    @endif
                    <hr>

                    <label for="" class="form-label">Featured Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="featured_image" value="{{ $training->featured_image ?? old('featured_image') }}">
                    </div>
                    <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty($training->featured_image))
                        <img src="{{ $training->featured_image }}" alt="">
                        @endif
                    </div>

                    <label for="" class="form-label">Thumbnail</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="icon" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="icon" value="{{ $training->icon ?? old('icon') }}">
                    </div>
                    <div id="holder2" style="margin-top:5px;width:100%;">
                        @if(!empty($training->icon))
                        <a href="{{ $training->icon }}" alt="" target="_blank"><img class="img-fluid" src="{{ $training->icon }}" alt=""></a>
                        @endif
                    </div>

                     <hr>

                     <div class="mb-3">
                        <label for="description" class="form-label">Descripion</label>
                        <textarea name="description" id="description" class="form-control">{{ $training->description ?? old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="key_word" class="form-label">Meta Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $training ? $training->key_word : old('key_word') }}">
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
@php
    $event = $event ?? null;
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
<a href="{{ route('event.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> All Events</a>   {{ $event ? "Edit Event" : "Add New Event" }}
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


<form action="{{ $event ? route('event.update', $event) : route('event.store') }}" method="POST">

    @csrf
    @method( $event ? 'put' : 'post')

    <section class="hero-section sticky-top">
        <div class="card border-white rounded">
            <div class="card-body shadow">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Event Title" value="{{ $event->title ?? old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ $event->slug ?? old('slug') }}">
                            @if (!empty($event))
                            <div class="input-group-append">
                                <a href="{{ url($event->slug,$event->lang) }}" target="_blank" class="btn btn-primary btn-lg"><i class="fas fa-eye"></i></a>
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

                            @if(!empty($event))
                                <option value="0" @if($event->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($event->status == 1) selected @endif>Published</option>           
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
                    <div class="col-sm-1 text-end">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $event ? "Update" : "Create" }}</button>
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

                
        
                    <textarea name="content" id="content" hidden>{!! $event->content ?? old('content') !!}</textarea>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card border-white rounded sticky-top inner-sidebar">
                <div class="card-body shadow">

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $event->start_date ?? old('start_date') }}" placeholder="Event Start Date">
                        </div>
                        <div class="col-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $event->end_date ?? old('end_date') }}" placeholder="Event End Date">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">-- Select Category ---</option>

                            @if(!empty($event))

                            <option value="Upcoming" @if($event->category === 'Upcoming') selected @endif>Upcoming</option>
                            <option value="Ongoing" @if($event->category === 'Ongoing') selected @endif>Ongoing</option>
                            <option value="Past" @if($event->category === 'Past') selected @endif>Past</option>
                            @else
                            <option value="Upcoming">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Past">Past</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Department</label>
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="">-- Select Department ---</option>

                            @if(!empty($event))
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}" @if($event->department_id == $department->id) selected @endif>{{ $department->title }}</option>
                                @endforeach
                            @else
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    


                    @if(!empty($event))
                    <small>Created at: {{ $event->created_at->diffForHumans() }}</small><br>
                    <small>Updated at: {{ $event->updated_at->diffForHumans() }}</small>
                    @endif
                    <hr>

                    <label for="" class="form-label">Featured Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="featured_image" value="{{ $event->featured_image ?? old('filepath') }}">
                    </div>
                    <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty($event->featured_image))
                        <img src="{{ $event->featured_image }}" alt="">
                        @endif
                    </div>

                    <label for="" class="form-label">Thumbnail</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="icon" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="icon" value="{{ $event->icon ?? old('icon') }}">
                    </div>
                    <div id="holder2" style="margin-top:5px;width:100%;">
                        @if(!empty($event->icon))
                        <a href="{{ $event->icon }}" alt="" target="_blank"><img class="img-fluid" src="{{ $event->icon }}" alt=""></a>
                        @endif
                    </div>

                     <hr>

                     <div class="mb-3">
                        <label for="description" class="form-label">Descripion</label>
                        <textarea name="description" id="description" class="form-control">{{ $event->description ?? old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="key_word" class="form-label">Meta Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $event ? $event->key_word : old('key_word') }}">
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
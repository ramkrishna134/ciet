@php
    $artical = $artical ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $artical ? "Edit Artical" : "Add New Artical" }}
@endsection

@section('content')

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

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

<form action="{{ $artical ? route('artical.update', $artical) : route('artical.store') }}" method="POST">

    @csrf
    @method( $artical ? 'put' : 'post')


    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Artical Title" value="{{ $artical->title ?? old('title') }}">
                    </div>
    
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @if(!empty($artical))
                                        <option value="newsletter" @if($artical->category === 'newsletter') selected @endif>Newsletter</option>
                                        <option value="journal" @if($artical->category === 'journal') selected @endif>Journal</option>           
                                    @else
                                    <option value="newsletter">Newsletter</option>
                                    <option value="journal">Journal</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $artical->date ?? old('date') }}">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label" for="month">Month</label>
                                <select name="month" id="month" class="form-control">
                                    <option value="">-- Select Month ---</option>
                                    @for($i=1; $i<=12; $i++): 
                                        @php $month = date('F', mktime(0, 0, 0, $i, 10));@endphp
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endfor
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label" for="year">Year</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">-- Select Year ---</option>
                                    @php
                                        $latest_year = date('Y');
                                        $earliest_year = 2015;
                                        foreach ( range( $latest_year, $earliest_year ) as $i ):
                                    @endphp
                                    <option value="{{ $i }}">{{ $i }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label" for="url">Artical URL</label>
                        <input type="url" class="form-control" name="url" id="url" value="{{ $artical->url ?? old('url') }}">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
    
                            @if(!empty($artical))
                                <option value="0" @if($artical->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($artical->status == 1) selected @endif>Published</option>           
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
    
                    <div class="mb-3">
                        <label for="lang" class="form-label">Language</label>
                        <select name="lang" id="lang" class="form-control">
                            @if(!empty($artical))
                                <option value="en" @if($artical->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($artical->lang === 'hi') selected @endif>Hindi</option>           
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
    
                    <button type="submit" class="btn btn-success">{{ $artical ? "Update" : "Create" }}</button>
    
                </div>
            </div>
    
            <div class="card">
                <div class="card-body">
                    <label for="" class="form-label">Icon</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fas fa-file-image"></i> Choose
                            </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="icon" value="{{ $artical->icon ?? old('icon') }}">
                        </div>
                        <div id="holder" style="margin-top:5px;width:100%;">
                            @if(!empty($artical->icon))
                            <a href="{{ $artical->icon }}" alt="" target="_blank"><img class="img-fluid" src="{{ $artical->icon }}" alt=""></a>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>

</form>

<script>


$(document).ready(function(){

    $('#lfm').filemanager('image');

});

</script>

@endsection
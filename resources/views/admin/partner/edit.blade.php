@php
    $partner = $partner ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $partner ? "Edit Partner" : "Add New Partner" }}
@endsection

@section('content')

<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            <a href="{{ route('partner.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View our Partners</a>
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

<form action="{{ $partner ? route('partner.update', $partner) : route('partner.store') }}" method="POST">

    @csrf
    @method( $partner ? 'put' : 'post')


    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Partner Name" value="{{ $partner->name ?? old('name') }}">
                    </div>
    
    
                    <div class="mb-3">
                        <label class="form-label" for="link">URL</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{ $partner->link ?? old('link') }}">
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
    
                            @if(!empty($partner))
                                <option value="0" @if($partner->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($partner->status == 1) selected @endif>Published</option>           
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
                            @if(!empty($partner))
                                <option value="en" @if($partner->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($partner->lang === 'hi') selected @endif>Hindi</option>           
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
    
                    <button type="submit" class="btn btn-success">{{ $partner ? "Update" : "Create" }}</button>
    
                </div>
            </div>
    
            <div class="card">
                <div class="card-body">
                    <label for="" class="form-label">Logo</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fas fa-file-image"></i> Choose
                            </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="logo" value="{{ $partner->logo ?? old('logo') }}">
                        </div>
                        <div id="holder" style="margin-top:5px;width:100%;">
                            @if(!empty($partner->logo))
                            <a href="{{ $partner->logo }}" alt="" target="_blank"><img class="img-fluid" src="{{ $partner->logo }}" alt=""></a>
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
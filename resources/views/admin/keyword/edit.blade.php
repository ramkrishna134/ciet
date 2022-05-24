@php
    $keyword = $keyword ?? null;
@endphp

@extends('layouts.sidebar')

@section('title')
{{ $keyword ? "Edit keyword" : "Add Keyword" }}
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<section class="hero-section">
    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('keyword.index') }}" class="btn btn-primary"><i class="fas fa-search-plus"></i> View All Keywords</a>
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


<form action="{{ $keyword ? route('keyword.update', $keyword) : route('keyword.store') }}" method="POST">

    @csrf
    @method( $keyword ? 'put' : 'post')

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="key_word" class="form-label">Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $keyword ? $keyword->key_word : old('key_word') }}">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $keyword ? $keyword->title : old('title') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ $keyword ? $keyword->slug : old('slug') }}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $keyword ? $keyword->description : old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success">{{ $keyword ? "Update" : "Create" }}</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
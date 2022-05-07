@php
    $page = $page ?? null;
@endphp

@extends('layouts.sidebar')

@section('title')
<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> All Pages</a>   {{ $page ? "Edit Page" : "Add New Page" }}
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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


<form action="{{ $page ? route('page.update', $page) : route('page.store') }}" method="POST">

    @csrf
    @method( $page ? 'put' : 'post')

    <input type="hidden" name="type" value="general">

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

                
        
                    <textarea name="content" id="content" class="form-control"></textarea>
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
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $page ? $page->key_word : old('key_word') }}">
                     </div>
                </div>
            </div>
        </div>
    </div>
   

    

</form>

<script>

    $(document).ready(function(){

        // Define function to open filemanager window
        var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
        };

    // Define LFM summernote button
        var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

            lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                lfmItems.forEach(function (lfmItem) {
                context.invoke('insertImage', lfmItem.url);
                });
            });

            }
        });
        return button.render();
        };


        $('#content').summernote({
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['popovers', ['lfm']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            buttons: {
                lfm: LFMButton
            }
        });

        $('#lfm').filemanager('image');
        
    })


    
</script>

@endsection
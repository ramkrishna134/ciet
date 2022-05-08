@extends('layouts.sidebar')

@section('title')
Add Your Custom CSS
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.css')}}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.js')}}"></script>
<script src="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/css/css.js')}}"></script>

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

<div class="row">
    <div class="col-sm-7">
        <p class="text-info"><i class="fas fa-exclamation-triangle text-warning me-1"></i>Here you can add custom CSS code in your website, please do it carefully.</p>
        <form action="{{ route('setting.store') }}" method="POST">
            @csrf
            @method('post')

            <div class="card border-white rounded mb-3">
                <div class="card-body shadow">
        
                    <textarea name="setting[custom_css]" id="custom_css" class="form-control">{{ setting('custom_css') ?? '' }}</textarea>
                    
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
        </form>
        
    </div>
</div>

<script>
   $(document).ready(function(){
        
    var myTextArea = document.getElementById("custom_css")
    

    CodeMirror.fromTextArea(document.getElementById("custom_css"), {
        lineNumbers: true,
        mode: "css"
    });
        
     })
</script>


@endsection
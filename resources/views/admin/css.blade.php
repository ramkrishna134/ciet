@extends('layouts.sidebar')

@section('title')
Add Your Custom CSS
@endsection

@section('content')

<link rel="stylesheet" href="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.css')}}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.js')}}"></script>
<script src="{{asset('vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/css/css.js')}}"></script>

<div class="row">
    <div class="col-sm-7">
        <div class="card border-white rounded mb-3">
            <div class="card-body shadow">
        
                <textarea name="custom_css" id="custom_css" class="form-control"></textarea>
                
            </div>
        </div>

        <a href="" class="btn btn-primary btn-lg">Save</a>
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
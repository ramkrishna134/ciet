@php
    $department = $department ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $department ? "Edit Department" : "Add New Department" }}
@endsection

@section('content')

<style>
    #holder img{
        height: auto !impotant;
        max-height: 150px;
        width: 100%;
    }
</style>


{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>


<form action="{{ $department ? route('department.update', $department) : route('department.store') }}" method="POST">

    @csrf
    @method( $department ? 'put' : 'post')

    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body shadow" id="dynamicAddRemove">
                    <div class="mb-3">
                        <label for="title" class="form-label">Department Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Department Title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><strong>slug: </strong> {{ env('APP_URL') }}/</span>
                        <input type="text" class="form-control" id="slug" name="slug" aria-describedby="basic-addon3">
                    </div>
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control summernote"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Field</button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-2">
                <div class="card-body shadow">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">

                            @if(!empty($department))
                                <option value="0" @if($department->status == 0) selected @endif>Darft</option>
                                <option value="1" @if($department->status == 1) selected @endif>Published</option>           
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
                            @if(!empty($department))
                                <option value="en" @if($department->lang === 'en') selected @endif>English</option>
                                <option value="hi" @if($department->lang === 'hi') selected @endif>Hindi</option>           
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

                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body shadow">
                    <label for="" class="form-label">Featured Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="featured_image" value="{{ $department->featured_image ?? old('featured_image') }}">
                    </div>
                    {{-- <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty($department->featured_image))
                        <img src="{{ $department->featured_image }}" alt="">
                        @endif
                    </div> --}}

                    <hr>

                    <label for="" class="form-label">Icon</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="icon" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="icon" value="{{ $department->icon ?? old('icon') }}">
                    </div>
                    {{-- <div id="holder2" style="margin-top:5px;width:100%;">
                        @if(!empty($department->icon))
                        <img src="{{ $department->icon }}" alt="">
                        @endif
                    </div> --}}

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


    $('.summernote').summernote({
      height: 300,
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

    $('#icon').filemanager('image');

    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<div class="custom-field"><div class="row"><div class="col-sm-10"><input class="form-control mb-2" type="text" id="meta' + i +'key" placeholder="Name" name=""></div> <div class="col-sm-2"><button type="button" class="btn btn-danger remove-input-field"><i class="fas fa-trash-alt"></i> Delete</button></div></div><textarea type="text" name="" placeholder="Enter subject" class="form-control summernote"> </textarea> <hr></div>'
            );

            $('.summernote').summernote({
            height: 300,
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

        $('#meta'+i+'key').keyup(function(){
            var value = $(this).val();
            $(this).attr('name', 'meta_key['+value+']');
            $(this).parents().children('.summernote').attr('name', 'meta_value['+value+']');
        })

    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('.custom-field').remove();
    });

    $('.custom-field ')
});

    
</script>

@endsection
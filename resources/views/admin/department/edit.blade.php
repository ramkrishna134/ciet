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

    .gallery{
        border: 1px solid gray;
        border-radius: 3px;
        padding: 5px;
    }

    .gallery img{
        margin: 5px;
    }
</style>


{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
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


<form action="{{ $department ? route('department.update', $department) : route('department.store') }}" method="POST">

    @csrf
    @method( $department ? 'put' : 'post')

    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body shadow" id="dynamicAddRemove">
                    <div class="mb-3">
                        <label for="title" class="form-label">Department Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Department Title" value="{{ $department->title ?? old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><strong>slug: </strong> {{ env('APP_URL') }}/</span>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $department->slug ?? old('slug') }}">
                        @if (!empty($department))
                            <div class="input-group-append">
                                <a href="/department/{{ $department->slug }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            </div>
                        @endif
                    </div>
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Gallery <small class="text-danger">(Please choose only 12 images.)</small></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm4" data-input="thumbnail4" data-preview="holder4" class="btn btn-primary text-white btn-sm">
                                <i class="fas fa-images"></i> Choose Multiple Images
                              </a>
                            </span>
                            <input id="thumbnail4" class="form-control d-none" type="text" name="gallery">
                        </div>

                        <div id="holder4" class="gallery" style="margin-top:5px;max-height:auto;">
                            @if(!empty($department->gallery))

                            @php
                            $gallery = json_decode($department->gallery);
                            // dd($gallery);
                            @endphp
                            @foreach($gallery as $item)
                            <img height="80px" width="80px" src="{{ $item }}" alt="">
                            @endforeach
                            @endif
                        </div>
                        
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control summernote">{!! $department->description ?? old('description') !!}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- If meta already added then update meta --}}

                    @if(!empty($metas))

                        <h4><strong class="text-primary">Sections</strong></h4>
                        <div class="added-fields" data-meta="{{ $metas->count() }}">
                        

                            @foreach($metas as $i=>$meta)
    
                            <div class="mb-3">

                                <div class="input-group">
                                    <input type="text" class="form-control mb-2" readonly  name="meta[{{ $meta->key }}]" value="{{ $meta->key }}">
                                    <div class="input-group-append">
                                        <a href="{{ route('meta.delete', $meta) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                                <textarea name="meta[{{ $meta->key }}]" class="form-control summernote">{!! $meta->value !!}</textarea>
                            </div>
                            <hr>
    
                            @endforeach
                        </div>
                    @endif
                    
                    

                    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Section</button>
                </div>
            </div>
        </div>



        {{-- Side bar --}}

        <div class="col-sm-3">
            <div class="card mb-2 sticky-top">
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

                    <button type="submit" class="btn btn-success">{{ $department ? "Update" : "Create" }}</button>
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
                    <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty($department->featured_image))
                        <a href="{{ $department->featured_image }}" alt="" target="_blank"><img src="{{ $department->featured_image }}" alt=""></a>
                        @endif
                    </div>

                    <hr>

                    <label for="" class="form-label">Icon</label>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="icon" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="icon" value="{{ $department->icon ?? old('icon') }}">
                    </div>
                    <div id="holder2" style="margin-top:5px;width:100%;">
                        @if(!empty($department->icon))
                        <a href="{{ $department->icon }}" alt="" target="_blank"><img class="img-fluid" src="{{ $department->icon }}" alt=""></a>
                        @endif
                    </div>

                    <label for="" class="form-label">Head Image</label>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="head" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail3" class="form-control" type="text" name="head_image" value="{{ $department->head_image ?? old('head_image') }}">
                    </div>
                    <div id="holder3" style="margin-top:5px;width:100%;">
                        @if(!empty($department->head_image))
                        <a href="{{ $department->head_image }}" alt="" target="_blank"><img class="img-fluid" src="{{ $department->head_image }}" alt=""></a>
                        @endif
                    </div>

                    <label for="head_message" class="form-label">Head Message</label>
                    <textarea name="head_message" id="head_message" class="form-control">{{ $department->head_message ?? old('head_message') }}</textarea>


                    <div class="mb-3">
                        <label for="key_word" class="form-label">Meta Keywords</label> <br>
                        <input type="key_word" data-role="tagsinput" name="key_word" id="key_word" value="{{ $department ? $department->key_word : old('key_word') }}">
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

    // $('#icon').filemanager('file');
    $('#icon').filemanager('image');

    $('#head').filemanager('image');

    $('#lfm4').filemanager('image');

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
            $(this).attr('name', 'meta['+value+']');
            $(this).parents().children('.summernote').attr('name', 'meta['+value+']');
        })

    });

    var meta = $('.added-fields').attr('data-meta');

    for(i=0; i<=meta; i++){
        $('#meta'+i+'field').keyup(function(){
            var value = $(this).val();
            $(this).attr('name', 'meta['+value+']');
            $(this).parents().children('.summernote').attr('name', 'meta['+value+']');
            $(this).parents().children('.meta_id').attr('name', 'meta['+value+']');
    })
    }

    

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('.custom-field').remove();
    });

});

    
</script>

@endsection
@extends('layouts.sidebar')

@section('title')
Slider Editor
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
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

<div class="card">
    <div class="card-body">
        <form action="{{ route('slider.store') }}" method="POST">
            @csrf
            @method('post')

            <div class="row align-items-center">
                <div class="col-sm-9 border-end">
                    <p><strong>Add New Slide</strong></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" placeholder="Title" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="alt" class="form-label">Alternate Text</label>
                                <input type="text" placeholder="Alt text" name="alt" id="alt" class="form-control @error('alt') is-invalid @enderror">
                                @error('alt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="order" class="form-label">Ordering No.</label>
                                <input type="number" placeholder="Order" name="order" id="order" class="form-control @error('order') is-invalid @enderror">
                                @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="url" class="form-label">Hit URL</label>
                                <input type="text" placeholder="Hit URL" name="url" id="url" class="form-control @error('url') is-invalid @enderror">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="default" class="form-label">Make this first</label>
                                <select name="default" id="default" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="lang" class="form-label">Language</label>
                                <select name="lang" id="lang" class="form-control">
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="col-sm-3">

                    <label class="form-label">Add Slide Image</label>

                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose Image
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image">
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div id="holder" style="margin-top:5px;width:100%;">
                    </div>

                    <button class="btn btn-success mt-2" type="submit"><i class="fas fa-plus"></i> Create Slide</button>
                </div>

                
            </div>
        </form>
    </div>
</div>

<hr>

<div class="card mt-3">
    <div class="card-body">
        @foreach($sliders as $slider)
        <div class="item p-2 border bg-light rounded mb-2 slide-item" data-id="{{ $slider->id }}">
            <div class="row align-items-center">
                <div class="col-sm-3 border-end">
                    <img class="img-fluid" style="width: 100%; height: 100px;" src="{{ $slider->image }}" alt="">
                </div>

                <div class="col-sm-3 border-end text-center">
                    <div class="title" data-title="{{ $slider->title }}">
                        <strong>{{ $slider->title }}</strong>
                    </div>
                    <div class="alt" data-alt="{{ $slider->alt }}">
                        <small>{{ $slider->alt }}</small>
                    </div>
                    <div class="url" data-url="{{ $slider->url }}">
                        <strong>Hit URL: </strong> <a href="{{ $slider->url }}">{{ $slider->url }}</a>
                    </div>
                </div>

                <div class="col-sm-2 border-end text-center lang" data-lang="{{ $slider->lang }}">
                    @if($slider->lang === 'en')
                    <span class="badge bg-secondary"><i class="fas fa-language"></i> English</span>
                    @elseif($slider->lang === 'hi')
                    <span class="badge bg-secondary"><i class="fas fa-language"></i> Hindi</span>
                    @endif

                    <hr class="mt-0 mb-0 status" data-status="{{ $slider->status }}">
                    @if($slider->status == 0)
                    <span class="badge bg-warning">Darft</span>
                    @elseif($slider->status == 1)
                    <span class="badge bg-primary">Published</span>
                    @endif

                    <hr class="mt-0 mb-0 default" data-default="{{ $slider->default }}">
                    @if($slider->default == 1)
                    <span class="badge bg-info">First Slide</span>
                    @endif

                </div>

                <div class="col-sm-2 text-center border-end">
                    Created by: {{ $slider->user->name }}
                    <hr class="mt-0 mb-0">
                    Created at: {{ $slider->created_at->diffForHumans() }}</td>
                    <hr class="mt-0 mb-0">
                    Updated at: {{ $slider->updated_at->diffForHumans() }}</td>
                </div>

                <div class="col-sm-2 text-center">
                    <a href="" data-bs-toggle="modal" data-bs-target="#sliderModal" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <hr class="mt-1 mb-1">
                    <a href="{{ route('slider.delete', $slider) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



{{-- Slider edit Modal --}}
<div class="modal fade" id="sliderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Slide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="" id="sliderModalForm" method="POST">
                @csrf
                @method('post')

                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" placeholder="Title" name="title" id="title" class="form-control">
                        </div>
                    </div>
      
                    <div class="col-sm-4">
                      <div class="mb-3">
                          <label for="alt" class="form-label">Alternate Text</label>
                          <input type="text" placeholder="Alt text" name="alt" id="alt" class="form-control">
                      </div>
                    </div>
      
                    <div class="col-sm-2">
                      <div class="mb-3">
                          <label for="order" class="form-label">Ordering No.</label>
                          <input type="number" placeholder="Order" name="order" id="order" class="form-control @error('order') is-invalid @enderror">
                          @error('order')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="col-sm-6">
                      <div class="mb-3">
                          <label for="url" class="form-label">Hit URL</label>
                          <input type="text" placeholder="Hit URL" name="url" id="url" class="form-control @error('url') is-invalid @enderror">
                          @error('url')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="col-sm-2">
                      <div class="mb-3">
                          <label for="default" class="form-label">Make this first</label>
                          <select name="default" id="default" class="form-control">
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                          </select>
                      </div>
                  </div>
      
                  <div class="col-sm-2">
                      <div class="mb-3">
                          <label for="lang" class="form-label">Language</label>
                          <select name="lang" id="lang" class="form-control">
                              <option value="en">English</option>
                              <option value="hi">Hindi</option>
                              <option value="ur">Urdu</option>
                          </select>
                      </div>
                  </div>
      
                  <div class="col-sm-2">
                      <div class="mb-3">
                          <label for="status" class="form-label">Status</label>
                          <select name="status" id="status" class="form-control">
                              <option value="0">Darft</option>
                              <option value="1">Published</option>
                          </select>
                      </div>
                  </div>
      
      
                  <div class="col-sm-5 text-center">
                      <div class="input-group mb-3">
                          <span class="input-group-btn">
                          <a id="image2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                              <i class="fas fa-file-image"></i> Choose Image
                          </a>
                          </span>
                          <input id="thumbnail2" class="form-control" type="text" name="image">
                      </div>
                      @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
          
                      <div id="holder2" style="margin-top:5px;width:100%;">
                          <img class="img img-fluid mb-2" src="" alt="">
                      </div>
      
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
      
                </div>
            </form>
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<script>
    $(document).ready(function(){

        $('#image').filemanager('image');
        $('#image2').filemanager('image');


        $('#sliderModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        // Get Values form menuItem
        var parent = button.parents('.slide-item');

        var id = parent.attr('data-id');

        var title = parent.find('.title').attr('data-title');

        var alt = parent.find('.alt').attr('data-alt');
        var url = parent.find('.url').attr('data-url');
        var default_value = parent.find('.default').attr('data-default');
        console.log(default_value);
        var depth = parent.children('.depth').html();
        var status = parent.find('.status').attr('data-status');
        var lang = parent.find('.lang').attr('data-lang');
        var img = parent.find('img').attr('src');
    
        


        // Set Values into the modal
        var modal = $('#sliderModal');

        $('#sliderModalForm').attr('action', '/admin/slider/'+id);

        modal.find('#title').val(title);
        modal.find('#alt').val(alt);
        modal.find('#url').val(url);
        modal.find('#default').val(default_value);
        modal.find('#status').val(status);
        modal.find('#lang').val(lang);
        modal.find('.img').attr('src', img);
        modal.find('#thumbnail2').val(img);

        
        })

    })
</script>

@endsection
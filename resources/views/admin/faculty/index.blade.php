@extends('layouts.sidebar')

@section('title')
Faculty Members
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

<div class="row">
    <div class="col-sm-9">
        <div class="card border-white rounded shadow">
            <div class="card-body">

                <div class="row mb-3">
                    @foreach ($faculties as $item)

                    <div class="col-sm-3 sticky-top">
                        <div class="faculty border">
                            <div class="id d-none">{{ $item->id }}</div>
                            <div class="image" data-image="{{ $item->image }}">
                                <img class="img-fluid" src="{{ $item->image }}" alt="">
                            </div>
                            <div class="name" data-name="{{ $item->name }}"><strong>{{ $item->name }}</strong></div>
                            <div class="post" data-post="{{ $item->post }}">{{ $item->post }}</div>
                            <div class="number" data-number="{{ $item->number }}"><strong>Extn.</strong>{{ $item->number }}</div>
                            <div class="subject" data-subject="{{ $item->subject }}">{{ $item->subject }}</div>
                            <div class="category" data-category="{{ $item->category }}">{{ $item->category }}</div>
                            <div class="department" data-department="{{ $item->department_id}}">{{ $item->department->title }}</div>
                            <div class="profile" data-profile="{{ $item->profile }}">
                                <a href="{{ $item->profile }}" target="_blank">Bio <i class="fas fa-eye"></i></a>
                            </div>
                            <div class="lang" data-lang="{{ $item->lang }}">
                                @if($item->lang === 'en')
                                <i class="fas fa-language"></i> English
                                @elseif($item->lang === 'hi')
                                <i class="fas fa-language"></i> Hindi
                                @endif
                            </div>
                            <div class="status" data-status="{{ $item->status }}">
                                @if($item->status == 0)
                                <span class="badge bg-warning">Darft</span>
                                @elseif($item->status == 1)
                                <span class="badge bg-primary">Published</span>
                                @endif
                            </div>
                            <div class="actions mt-2">
                                <a href="" data-bs-toggle="modal" data-bs-target="#editFacultyItem" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </div>
        
                        </div>
                    </div>
                
                    @endforeach
                </div>

                {!! $faculties->links() !!}

            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <form action="{{ route('faculty.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="card border-white rounded shadow">
                <div class="card-body text-center">
                    <h4>Add Faculty</h4>
                    <hr>
                    <label for="" class="form-label">Profile Image</label>

                    <div id="holder" style="margin-top:5px;width:100%;">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose Image
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image">
                    </div>
                    

                    <div class="mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="post" name="post" class="form-control" placeholder="Designation">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                    </div>

                    <div class="mb-3">
                        <input type="tel" id="number" name="number" class="form-control" placeholder="Extention Number">
                    </div>

                    <div class="mb-3">
                        <select name="category" id="category" class="form-control">
                            <option value="">-- Select Category ---</option>
                            <option value="Academic">Academic</option>
                            <option value="Administration">Administration</option>
                            <option value="Technical">Technical</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="">-- Select Department ---</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="" class="form-label">Biodata</label>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="profile" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose File
                        </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="profile">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="lang" id="lang" class="form-control">
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Faculty</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- Edit Menu Item Modal --}}

<div class="modal fade" id="editFacultyItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFacultyItem" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Faculty Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            {{-- Update Menu Item Form --}}

            <form action="" method="post" id="editFacultyForm">
                @csrf
                @method('put')

                <label for="" class="form-label">Profile Image</label>

                    <div id="holder3" style="margin-top:5px;width:100%;">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="image-url" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose Image
                        </a>
                        </span>
                        <input id="thumbnail3" class="form-control image-url" class="form-control" type="text" name="image">
                    </div>
                    

                    <div class="mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="post" name="post" class="form-control" placeholder="Designation">
                    </div>

                    <div class="mb-3">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                    </div>

                    <div class="mb-3">
                        <input type="tel" id="number" name="number" class="form-control" placeholder="Extention Number">
                    </div>

                    <div class="mb-3">
                        <select name="category" id="category" class="form-control">
                            <option value="">-- Select Category ---</option>
                            <option value="Academic">Academic</option>
                            <option value="Administration">Administration</option>
                            <option value="Technical">Technical</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="department_id" id="department_id" class="form-control">
                            <option value="">-- Select Department ---</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="" class="form-label">Biodata</label>
                    <div class="input-group mb-3">
                        <span class="input-group-btn">
                        <a id="profile-url" data-input="thumbnail4" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose File
                        </a>
                        </span>
                        <input id="thumbnail4" class="profile-url form-control" type="text" name="profile">
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Darft</option>
                                    <option value="1">Published</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="lang" id="lang" class="form-control">
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="ur">Urdu</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-success">Update Faculty</button>
                    </div>

            </form>
            
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        
        $('#image-url').filemanager('image');

        $('#profile-url').filemanager('file');

        $('#image').filemanager('image');

        $('#profile').filemanager('file');


        $('#editFacultyItem').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        // Get Values form menuItem
        var parent = button.parents('.faculty');

        var id = parent.children('.id').html()

        var image = parent.children('.image').attr('data-image');
        var name = parent.children('.name').attr('data-name');
        var post = parent.children('.post').attr('data-post');
        var subject = parent.children('.subject').attr('data-subject');
        var number = parent.children('.number').attr('data-number');
        var category = parent.children('.category').attr('data-category');
        var department = parent.children('.department').attr('data-department');
        var profile = parent.children('.profile').attr('data-profile');
        var status = parent.children('.status').attr('data-status');
        var lang = parent.children('.lang').attr('data-lang');
        var target = parent.children('.target').attr('data-target');
        
        console.log(name);

        // Set Values into the modal
        var modal = $('#editFacultyForm');

        $('#editFacultyForm').attr('action', '/admin/faculty/'+id);

        modal.find('.image-url').val(image);
        modal.find('#name').val(name);
        modal.find('#post').val(post);
        modal.find('#subject').val(subject);
        modal.find('#number').val(number);
        modal.find('#category').val(category);
        modal.find('#department_id').val(department);
        modal.find('.profile-url').val(profile);
        modal.find('#status').val(status);
        modal.find('#lang').val(lang);

        if(target == 1){
            modal.find('#up_target').prop('checked', true);
        }else{
            modal.find('#up_target').prop('checked', false);
        }
        
        
        })

        
    })


    
</script>

@endsection
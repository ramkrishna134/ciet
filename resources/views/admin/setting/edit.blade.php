@extends('layouts.sidebar')

@section('title')
Settings
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
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

{{-- @dd($settings[0]->key); --}}

<div class="card border-white rounded shadow">
    <div class="card-body">
        <form action="{{ route('setting.store') }}" method="POST">
            @csrf
            @method('post')
            
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="thumbnail" class="col-form-label">Logo English</label>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="english" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="setting[logo-english]" value="{{ setting('logo-english') }}">
                    </div>
                    <div id="holder" style="margin-top:5px;width:100%;">
                        @if(!empty(setting('logo-english')))
                        <img width="200px" height="100px" src="{{ setting('logo-english') }}" alt="">
                        @endif
                    </div>

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="thumbnail2" class="col-form-label">Logo Hindi</label>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="hindi" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail2" class="form-control" type="text" name="setting[logo-hindi]" value="{{ setting('logo-hindi') }}">
                    </div>
                    <div id="holder2" style="margin-top:5px;width:100%;">
                        @if(!empty(setting('logo-hindi')))
                        <img width="200px" height="100px" src="{{ setting('logo-hindi') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="thumbnail3" class="col-form-label">Logo Urdu</label>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="urdu" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary">
                            <i class="fas fa-file-image"></i> Choose
                        </a>
                        </span>
                        <input id="thumbnail3" class="form-control" type="text" name="setting[logo-urdu]" value="{{ setting('logo-urdu') }}">
                    </div>
                    <div id="holder3" style="margin-top:5px;width:100%;">
                        @if(!empty(setting('logo-urdu')))
                        <img width="200px" height="100px" src="{{ setting('logo-urdu') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[popup-status]" class="col-form-label">Homepage Popup</label>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <div class="form-check">
                            <label class="form-check-label" for="popupstatus1">Active</label>
                            <input class="form-check-input" type="radio" value="1" name="setting[popup-status]" id="popupstatus1" @if(setting('popup-status') == 1) checked @endif>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="popupstatus">Inactive</label>
                            <input class="form-check-input" type="radio" value="0" name="setting[popup-status]" id="popupstatus" @if(setting('popup-status') == 0) checked @endif>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="popup" data-input="thumbnail4" data-preview="holder4" class="btn btn-primary">
                                <i class="fas fa-file-image"></i> Image
                            </a>
                            </span>
                            <input id="thumbnail4" class="form-control" type="text" name="setting[popup-image]" value="{{ setting('popup-image') }}">
                        </div>
                        <div id="holder4" style="margin-top:5px;width:100%;">
                            @if(!empty(setting('popup-image')))
                            <img width="200px" height="100px" src="{{ setting('popup-image') }}" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="url" id="setting[popup-url]" class="form-control" name="setting[popup-url]" value="{{ setting('popup-url') }}" placeholder="Hit URL">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[admin-email]" class="col-form-label">Admin Email</label>
                </div>
                <div class="col-sm-4">
                    <input type="email" id="setting[admin-email]" class="form-control" name="setting[admin-email]" value="{{ setting('admin-email') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[contact-email]" class="col-form-label">Contact Email</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[contact-email]" class="form-control" name="setting[contact-email]" value="{{ setting('contact-email') }}">
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[contact-number1]" class="col-form-label">Contact Number 1</label>
                </div>
                <div class="col-sm-4">
                    <input type="tel" id="setting[contact-number1]" class="form-control" name="setting[contact-number1]" value="{{ setting('contact-number1') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[contact-number2]" class="col-form-label">Contact Number 2</label>
                </div>
                <div class="col-sm-4">
                    <input type="tel" id="setting[contact-number2]" class="form-control" name="setting[contact-number2]" value="{{ setting('contact-number2') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[contact-fax]" class="col-form-label">Fax</label>
                </div>
                <div class="col-sm-4">
                    <input type="tel" id="setting[contact-fax]" class="form-control" name="setting[contact-fax]" value="{{ setting('contact-fax') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[tollfree]" class="col-form-label">TollFree Number</label>
                </div>
                <div class="col-sm-4">
                    <input type="tel" id="setting[tollfree]" class="form-control" name="setting[tollfree]" value="{{ setting('tollfree') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[address]" class="col-form-label">Office Address</label>
                </div>
                <div class="col-sm-4">
                    <textarea name="setting[address]" id="setting[address]" class="form-control">{{ setting('address') }}</textarea>
                </div>
            </div>



            <hr>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[facebook]" class="col-form-label">Facebook Link</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[facebook]" class="form-control" name="setting[facebook]" value="{{ setting('facebook') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[twitter]" class="col-form-label">Twitter Link</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[twitter]" class="form-control" name="setting[twitter]" value="{{ setting('twitter') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[instagram]" class="col-form-label">Instagram Link</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[instagram]" class="form-control" name="setting[instagram]" value="{{ setting('instagram') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[youtube]" class="col-form-label">YouTube Link</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[youtube]" class="form-control" name="setting[youtube]" value="{{ setting('youtube') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="setting[linkedin]" class="col-form-label">LinkedIn Link</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="setting[linkedin]" class="form-control" name="setting[linkedin]" value="{{ setting('linkedin') }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Save</button>

        </form>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#english').filemanager('image');

        $('#hindi').filemanager('image');

        $('#urdu').filemanager('image');

        $('#popup').filemanager('image');

    });
</script>


@endsection
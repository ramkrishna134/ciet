@extends('layouts.sidebar')

@section('title')
Media Manager
@endsection

@section('content')



{{-- <section class="hero-section">
    <h3>Media Manager</h3>
</section>

<hr> --}}

<div class="card border-white rounded">
    <div class="card-body shadow">

        <ul class="nav nav-tabs media" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="true"><i class="fas fa-images"></i> <strong>Images</strong></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file" type="button" role="tab" aria-controls="file" aria-selected="false"><i class="fas fa-copy"></i> <strong>Files</strong></button>
            </li>
           
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                <iframe src="{{ url('laravel-filemanager') }}?type=image" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>
            </div>
            <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="file-tab">
                <iframe src="{{ url('laravel-filemanager') }}" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>
            </div>
          </div>

        
    </div>
</div>


{{-- <script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
</script> --}}


@endsection
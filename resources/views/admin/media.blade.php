@extends('layouts.sidebar')

@section('title')
Media Manager
@endsection

@section('content')



<section class="hero-section">
    <h3>Media Manager</h3>
</section>

<hr>

<div class="card border-white rounded">
    <div class="card-body shadow">
        <iframe src="{{ url('laravel-filemanager') }}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
    </div>
</div>


{{-- <script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
</script> --}}


@endsection
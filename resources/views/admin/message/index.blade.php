@extends('layouts.sidebar')

@section('title')
Your Requests
@endsection

@section('content')

<section class="hero-section">
    <div class="row">

        <div class="col-sm-4">
            <a href="{{ route('message.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Request</a>
        </div>
    </div>
</section>
<hr>

<div class="card">
    <div class="card-body border-white shadow">

    </div>
</div>

@endsection
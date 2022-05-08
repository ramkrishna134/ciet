@extends('layouts.sidebar')

@section('title')
Feedback Details
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="hero-section">
    <div class="row">

        <div class="col-sm-4">
            <a href="{{ route('feedback.index') }}" class="btn btn-primary">View All Feedback</a>
        </div>
    </div>
</section>
<hr>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body border-white shadow">

                <strong>Feedback By</strong>
                <p class="mb-0">{{ $feedback->name }}</p>
                <p class="mb-0"><a href="tel:{{ $feedback->phone }}">{{ $feedback->phone }}</a></p>
                <p class="mb-0"><a href="mailto:{{ $feedback->email }}">{{ $feedback->email }}</a></p>
                <p>Date: {{ date_format($feedback->created_at,"F m Y, H:i:s");  }}</p>

                <hr>


                <h4>{{ $feedback->subject }}</h4>
                <hr>

                {{ $feedback->message }}
            </div>
        </div>
    </div>
</div>

<script>


</script>

@endsection
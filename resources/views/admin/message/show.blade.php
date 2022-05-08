@extends('layouts.sidebar')

@section('title')
View Request
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
            <a href="{{ route('message.index') }}" class="btn btn-primary">View All Request</a>
        </div>
    </div>
</section>
<hr>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body border-white shadow">

                <strong>Request By</strong>
                <p class="mb-0">{{ $message->user->name }} ({{ $message->user->role }})</p>
                <p class="mb-0">{{ $message->user->email }}</p>
                <p>Date: {{ $message->created_at->diffForHumans() }}</p>

                <hr>


                <h4>{{ $message->title }}</h4>
                <hr>

                {!! $message->message !!}

                @if(Auth::user()->role === 'Admin')

                @if($message->status == 0)
                <form action="{{ route('message.update', $message) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-success me-2">Accept</button>
                </form>

                <form action="{{ route('message.update', $message) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="2">
                    <button type="submit" class="btn btn-danger">Decline</button>
                </form>
                @endif


                @if($message->status == 2)
                <form action="{{ route('message.update', $message) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-success me-2">Accept</button>
                </form>
                @endif

                @endif
            </div>
        </div>
    </div>
</div>

<script>


</script>

@endsection
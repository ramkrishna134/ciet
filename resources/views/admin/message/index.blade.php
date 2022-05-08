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

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="card">
    <div class="card-body border-white shadow">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($messages as $message)
                    <tr>
                        <th>{{ $message->id }}</th>
                        <td>{{ $message->title }}</td>
                        <td>@if($message->status == 0)
                            <span class="badge bg-warning">Pending</span>
                            @elseif($message->status == 1)
                            <span class="badge bg-primary">Approved</span>
                            @elseif($message->status == 2)
                            <span class="badge bg-danger">Declined</span>
                            @endif
                        </td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>{{ $message->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('message.show', $message) }}" class="btn btn-primary btn btn-sm">View</a>
                            @if(Auth::user()->role === 'Admin')
                            <a href="{{ route('message.destroy', $message) }}" class="btn btn-danger btn btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
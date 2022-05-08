@extends('layouts.sidebar')

@section('title')
All Feedbacks
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        {{-- <div class="col-sm-8">
            <h3>All Pages</h3>
        </div> --}}
        {{-- <div class="col-sm-4">
            <a href="{{ route('initiative.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New initiative</a>
        </div> --}}
    </div>
</section>
<hr>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach($feedbacks as $item)
        
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('feedback.show', $item) }}" class="btn btn-primary btn-sm">View Details</a></td>
                        </tr>
        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.sidebar')

@section('title')
Audios
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('audio.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Audio</a>
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

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Book</th>
                    <th width=100>Created at</th>
                    <th width=120>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($audios as $audio)
                <tr>
                    <th>{{ $audio->id }}</th>
                    <td>{{ $audio->name }}</td>
                    <td>{{ $audio->book->name }}</td>
                    
                    <td>{{ $audio->created_at->diffForHumans() }}</td>
                    <td>{{ $audio->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('audio.edit', $audio) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('audio.destroy', $audio) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
@extends('layouts.sidebar')

@section('title')
Articals
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('artical.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Artical</a>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>URL</th>
                    <th>Author</th>
                    <th>Language</th>
                    <th>Status</th>
                    <th width=100>Created at</th>
                    <th width=120>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($articals as $artical)
                <tr>
                    <th>{{ $artical->id }}</th>
                    <td>{{ $artical->title }}</td>
                    <td>{{ $artical->category }}</td>
                    <td><a href="{{ $artical->url }}" target="_blank"><i class="fas fa-eye"></i></a></td>
                    <td>{{ $artical->user->name }}</td>
                    <td>
                        @if($artical->lang === 'en')
                        <i class="fas fa-language"></i> English
                        @elseif($artical->lang === 'hi')
                        <i class="fas fa-language"></i> Hindi
                        @endif
                    </td>
                    <td>
                        @if($artical->status == 0)
                        <span class="badge bg-warning">Darft</span>
                        @elseif($artical->status == 1)
                        <span class="badge bg-primary">Published</span>
                        @endif
                    </td>
                    <td>{{ $artical->created_at->diffForHumans() }}</td>
                    <td>{{ $artical->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('artical.edit', $artical) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('artical.destroy', $artical) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
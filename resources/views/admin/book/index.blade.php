@extends('layouts.sidebar')

@section('title')
Books
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('book.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Book</a>
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
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Language</th>
                    <th>Status</th>
                    <th width=100>Created at</th>
                    <th width=120>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                <tr>
                    <th>{{ $book->id }}</th>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->subject }}</td>
                    <td>{{ $book->class }}</td>
                    <td>
                        @if($book->lang === 'en')
                        <i class="fas fa-language"></i> English
                        @elseif($book->lang === 'hi')
                        <i class="fas fa-language"></i> Hindi
                        @elseif($book->lang === 'ur')
                        <i class="fas fa-language"></i> Urdu
                        @endif
                    </td>
                    <td>
                        @if($book->status == 0)
                        <span class="badge bg-warning">Darft</span>
                        @elseif($book->status == 1)
                        <span class="badge bg-primary">Published</span>
                        @endif
                    </td>
                    <td>{{ $book->created_at->diffForHumans() }}</td>
                    <td>{{ $book->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('book.edit', $book) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('book.destroy', $book) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
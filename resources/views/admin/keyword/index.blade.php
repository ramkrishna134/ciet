@extends('layouts.sidebar')

@section('title')
All Keywords
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        <div class="col-sm-6">
            <a href="{{ route('keyword.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Keyword</a>
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

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Keyword</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach($keywords as $item)
        
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->key_word }}</td>
                            <td><a href="{{ $item->slug }}" target="_blank">{{ $item->slug }}</a></td>
                            <td>
                                <a href="{{ route('keyword.edit', $item) }}" class="btn btn-primary btn-sm">Edit</a> 
                                <a href="{{ route('keyword.destroy', $item) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a></td>
                        </tr>
        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.sidebar')

@section('title')
Permissions
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        <div class="col-sm-8">
            <h3>All Pages</h3>
        </div>
        <div class="col-sm-4 text-end">
            <a href="{{ route('page.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Page</a>
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

<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body border-white rounded">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Language</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <th>{{ $page->id }}</th>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->user_id }}</td>
                                <td>{{ $page->status }}</td>
                                <td>{{ $page->lang }}</td>
                                <td>{{ $page->created_at->diffForHumans() }}</td>
                                <td>{{ $page->updated_at->diffForHumans() }}</td>
                                <td><a href="{{ route('page.edit', $page) }}" class="btn btn-info btn-sm">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $pages->links() !!}
    </div>
</div>

@endsection
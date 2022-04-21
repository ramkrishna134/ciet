@extends('layouts.sidebar')

@section('title')
All Pages
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        {{-- <div class="col-sm-8">
            <h3>All Pages</h3>
        </div> --}}
        <div class="col-sm-8">
            <a href="{{ route('page.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Custom Page</a>

            <a href="{{ route('page.create.general') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New General Page</a>
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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body border-white rounded">
                <div class="table-responsive">
                    <table class="table index-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width=350>Title</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Author</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th width=100>Created at</th>
                                <th width=120>Updated at</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <th>{{ $page->id }}</th>
                                <td>
                                    <strong><a href="{{ route('page.edit', $page) }}">{{ $page->title }}</a></strong>
                                    <div class="actions">
                                        <a href="{{ route('page.edit', $page) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="{{ url($page->slug, $page->lang) }}" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> View</a>
                                        <a href="{{ route('page.destroy', $page) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </td>
                                <td>{{ $page->slug }}</td>
                                <td>
                                    @if($page->type === 'custom')
                                    Custom
                                    @elseif($page->type === 'general')
                                    General
                                    @endif
                                </td>
                                <td>{{ $page->user->name }}</td>
                                <td>
                                    @if($page->lang === 'en')
                                    <i class="fas fa-language"></i> English
                                    @elseif($page->lang === 'hi')
                                    <i class="fas fa-language"></i> Hindi
                                    @endif
                                </td>
                                <td>
                                    @if($page->status == 0)
                                    <span class="badge bg-warning">Darft</span>
                                    @elseif($page->status == 1)
                                    <span class="badge bg-primary">Published</span>
                                    @endif
                                </td>
                                <td>{{ $page->created_at->diffForHumans() }}</td>
                                <td>{{ $page->updated_at->diffForHumans() }}</td>
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
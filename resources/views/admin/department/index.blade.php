@extends('layouts.sidebar')

@section('title')
Departments
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('department.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Department</a>
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
                                <th>Author</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th width=100>Created at</th>
                                <th width=120>Updated at</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($departments as $department)
                            <tr>
                                <th>{{ $department->id }}</th>
                                <td>
                                    <strong><a href="{{ route('department.edit', $department) }}">{{ $department->title }}</a></strong>
                                    <div class="actions">
                                        <a href="{{ route('page.edit', $department) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {{-- <a href="{{ url($page->slug, $page->lang) }}" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> View</a> --}}
                                        <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </td>
                                <td>{{ $department->slug }}</td>
                                <td>{{ $department->user->name }}</td>
                                <td>
                                    @if($department->lang === 'en')
                                    <i class="fas fa-language"></i> English
                                    @elseif($department->lang === 'hi')
                                    <i class="fas fa-language"></i> Hindi
                                    @endif
                                </td>
                                <td>
                                    @if($department->status == 0)
                                    <span class="badge bg-warning">Darft</span>
                                    @elseif($department->status == 1)
                                    <span class="badge bg-primary">Published</span>
                                    @endif
                                </td>
                                <td>{{ $department->created_at->diffForHumans() }}</td>
                                <td>{{ $department->updated_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $departments->links() !!}
    </div>
</div>

@endsection
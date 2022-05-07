@extends('layouts.sidebar')

@section('title')
All Initiative
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        {{-- <div class="col-sm-8">
            <h3>All Pages</h3>
        </div> --}}
        <div class="col-sm-4">
            <a href="{{ route('initiative.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New initiative</a>
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
                            <th>Icon</th>
                            <th>Url</th>
                            <th>Author</th>
                            <th>Language</th>
                            <th>Status</th>
                            <th width=100>Created at</th>
                            <th width=120>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach($initiatives as $item)
        
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ $item->icon }}" target="_blank"><img class="img-fluid" width="100px" src="{{ $item->icon }}" alt=""></a></td>
                            <td><a href="{{ $item->web_link }}" target="_blank">{{ $item->web_link }}</a></td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                @if($item->lang === 'en')
                                <i class="fas fa-language"></i> English
                                @elseif($item->lang === 'hi')
                                <i class="fas fa-language"></i> Hindi
                                @endif
                            </td>
                            <td>
                                @if($item->status == 0)
                                <span class="badge bg-warning">Darft</span>
                                @elseif($item->status == 1)
                                <span class="badge bg-success">Published</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route('initiative.edit', $item) }}" class="btn btn-primary btn-sm">Edit</a> <a href="{{ route('initiative.destroy', $item) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a></td>
                        </tr>
        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
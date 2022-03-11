@extends('layouts.sidebar')

@section('title')
Trainings
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('training.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Training</a>
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
                                <th width=250>Title</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Author</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th width=100>Created at</th>
                                <th width=120>Updated at</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($trainings as $training)
                            <tr>
                                <th>{{ $training->id }}</th>
                                <td>
                                    <strong><a href="{{ route('training.edit', $training) }}">{{ $training->title }}</a></strong>
                                    <div class="actions">
                                        <a href="{{ route('training.edit', $training) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="{{ url($training->slug, $training->lang) }}" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> View</a>
                                        <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </td>
                                <td>{{ $training->start_date }}</td>
                                <td>{{ $training->end_date }}</td>
                                <td>{{ $training->user->name }}</td>
                                <td>
                                    @if($training->lang === 'en')
                                    <i class="fas fa-language"></i> English
                                    @elseif($training->lang === 'hi')
                                    <i class="fas fa-language"></i> Hindi
                                    @endif
                                </td>
                                <td>
                                    @if($training->status == 0)
                                    <span class="badge bg-warning">Darft</span>
                                    @elseif($training->status == 1)
                                    <span class="badge bg-primary">Published</span>
                                    @endif
                                </td>
                                <td>{{ $training->created_at->diffForHumans() }}</td>
                                <td>{{ $training->updated_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $trainings->links() !!}
    </div>
</div>

@endsection
@extends('layouts.sidebar')

@section('title')
Events
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        
        <div class="col-sm-4">
            <a href="{{ route('event.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Event</a>
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
                            @foreach($events as $event)
                            <tr>
                                <th>{{ $event->id }}</th>
                                <td>
                                    <strong><a href="{{ route('event.edit', $event) }}">{{ $event->title }}</a></strong>
                                    <div class="actions">
                                        <a href="{{ route('event.edit', $event) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="{{ url($event->slug, $event->lang) }}" class="btn btn-primary" target="_blank"><i class="fas fa-eye"></i> View</a>
                                        <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </td>
                                <td>{{ $event->start_date }}</td>
                                <td>{{ $event->end_date }}</td>
                                <td>{{ $event->user->name }}</td>
                                <td>
                                    @if($event->lang === 'en')
                                    <i class="fas fa-language"></i> English
                                    @elseif($event->lang === 'hi')
                                    <i class="fas fa-language"></i> Hindi
                                    @endif
                                </td>
                                <td>
                                    @if($event->status == 0)
                                    <span class="badge bg-warning">Darft</span>
                                    @elseif($event->status == 1)
                                    <span class="badge bg-primary">Published</span>
                                    @endif
                                </td>
                                <td>{{ $event->created_at->diffForHumans() }}</td>
                                <td>{{ $event->updated_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $events->links() !!}
    </div>
</div>

@endsection
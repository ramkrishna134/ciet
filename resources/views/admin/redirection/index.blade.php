@extends('layouts.sidebar')

@section('title')
Redirection Manager
@endsection

@section('content')

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
        <strong>Add new Redirection Rule</strong>

        <form action="{{ route('redirection.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <input type="text" name="form_url" id="form-url" class="form-control" placeholder="From URL">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <input type="text" name="to_url" id="to-url" class="form-control" placeholder="To URL">
                    </div>
                </div>
    
                <div class="col-sm-4">
                    <div class="mb-3">
                        <select name="method" id="method" class="form-control">
                            <option value="">-- Select Method ---</option>
                            <option value="301">301</option>
                            <option value="302">302</option>
                        </select>
                    </div>
                </div>
    
                <div class="col-sm-4">
                    <div class="mb-3">
                        <select name="status" id="status" class="form-control">
                            <option value="">-- Select Status --</option>
            
                            {{-- @if(!empty($params['status']))
                            <option @if($params['status'] == '0') selected @endif value="0">Darft</option>
                            <option @if($params['status'] == '1') selected @endif value="1">Published</option>
                            @else --}}
                            <option value="0">Darft</option>
                            <option value="1">Published</option>
                            {{-- @endif --}}
                        </select>
                    </div>
                </div>
    
                <div class="col-sm-4">
                    <div class="mb-3">
                        <button class="btn btn-primary form-control">Add Rule</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-body">
        <strong>Your Redirection Rules</strong>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>From URL</th>
                    <th>To URL</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection
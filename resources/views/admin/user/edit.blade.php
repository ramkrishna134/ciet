@php
    $user = $user ?? null;
@endphp


@extends('layouts.sidebar')

@section('title')
{{ $user ? "Edit User" : "Add New User" }}
@endsection

@section('content')

<section class="hero-section">
    <div class="row">
        {{-- <div class="col-sm-8">
            <h3>{{ $user ? "Edit User" : "Add New User" }}</h3>
        </div> --}}
        <div class="col-sm-4">
            <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fas fa-user-friends"></i> View Users</a>
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
    <div class="col-sm-8">
        <div class="card border border-white rounded shadow">
            <div class="card-body">
                <form action="{{ $user ? route('user.update', $user) : route('user.store') }}" method="post">
                    @csrf
                    @method( $user ? 'put' : 'post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Full Name" value="{{ $user->name ?? old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email ID</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" {{ $user ? "readonly" : "" }} name="email" id="email" placeholder="Email ID"  value="{{ $user->email ?? old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @if(!empty($user))
                                <small class="text-primary">If you don't want to change password please leave it blank.</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" placeholder="Retype Password">
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $user ? "Update" : "Create" }}</button>
                </form>
            </div>
        </div>
    </div>

    @if(!empty($user))
    <div class="col-sm-4">
        <div class="card border border-white rounded shadow">
            <div class="card-body">
                <h4>Assign Role</h3>

                    <form action="{{ route('user.assign', $user) }}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>

                            <select name="role_id" id="role" class="form-control">
                                @if(!empty($user))
                                <option value="">-- Select Role ---</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($user->role===$role->display_name) selected @endif>{{ $role->display_name }}</option>
                                @endforeach
                                        
                                @else

                                <option value="">-- Select Role ---</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
            </div>
        </div>
    </div>
    @endif
    
</div>

@endsection
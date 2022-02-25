@extends('layouts.sidebar')

@section('title')
Permissions to Roles
@endsection

@section('content')

<section class="hero-section">
    <h3>Permissions to Roles</h3>
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
        <div class="card border border-white rounded">
            <div class="card-body shadow">
            
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Permission</th>
                                <th>Description</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($role_permissions as $item)
                            <tr>
                                <td>{{ $item['permission'] }}</td>
                                <td><small>{{ $item['description'] }}</small></td>
                                <td><span class="badge bg-primary">{{ $item['role'] }}</span></td>
                                <td>
                                    {{-- <a href="{{ route('permission.edit', $permission) }}" class="btn btn-info btn-sm text-light"><i class="fas fa-edit"></i> Edit</a> --}}
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card sticky-top">
            <div class="card-body shadow">

                <h4>Attache Permissions to Roles</h4>

                <form action="{{ route('permission.attachRole') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="permission_id" class="form-label">Permisson</label>
                        <select class="form-control" name="permission_id" id="permission_id">
                            <option value="">-- Select Permission --</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                            @endforeach
                        </select>

                        @error('permission_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            <option value="">-- Select Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                        </select>

                        @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Attach</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.sidebar')

@section('title')
Dashboard
@endsection

@section('content')

{{-- <section class="hero-section">
    <h3>Dashboard</h3>
</section> --}}

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-sm-3">
        <div class="card-body shadow py-0 px-2 rounded welcome">
            <div class="row align-items-center text-primary">
                <div class="col-6">
                    <h5>Welcome Back, <br> {{ Auth::user()->name }} !</h5>

                    <p class="mb-0">CIET 2.0 Dashbaord</p>

                    
                </div>
                <div class="col-6">
                    <img class="img-fluid" src="/images/customer-support.png" alt="Welcome Image">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card-body shadow rounded">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>5</h2>
                    <h5 class="mb-0">Total Activities</h5>
                    <small><a href=""><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-calendar"></i></span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card-body shadow rounded">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>5</h2>
                    <h5 class="mb-0">Total Webinars</h5>
                    <small><a href=""><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-chalkboard"></i></span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card-body shadow rounded">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>5</h2>
                    <h5 class="mb-0">Total Users</h5>
                    <small><a href=""><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-user"></i></span></h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
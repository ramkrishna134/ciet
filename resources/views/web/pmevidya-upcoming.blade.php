@php
    $programms = $data['message'];
@endphp

@extends('layouts.app')

@section('title')PMeVidya|Channel -{{ $channel }} | {{ $category }} Programms |@endsection

@section('content')

<section class="hero-section count-height" style="background-image: url('/images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Class-{{$class}} {{ ucfirst($category) }} Programms</h1>
            <h5 class="text-light fw-bold">Channel-{{ $channel }}</h5>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pmevidya') }}">PMeVidya</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Class-{{$class}} {{ ucfirst($category) }} Programms</li>
                </ol>
            </nav>
        </div>

    </div>
</section>


<section class="page-content programm-schedule">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <div class="schedule-button d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-primary @if($category === 'current') active @endif">Current</button>
                        <button type="button" class="btn btn-outline-primary @if($category === 'upcoming') active @endif">Upcoming</button>
                        <button type="button" class="btn btn-outline-primary @if($category === 'archive') active @endif">Archive</button>
                    </div>
                </div>
                
                <div class="card shadow rounded">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="sheduleTable">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Topic</th>
                                    <th>Language</th>
                                    <th>Subject</th>
                                    <th>Telecast Date</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach($programms as $item)
                                <tr>
                                    <th>{{ $item['No'] }}</th>
                                    <td>{{ $item['Topic'] }}</td>
                                    <td>{{ $item['Language'] }}</td>
                                    <td>{{ $item['Subject'] }}</td>
                                    <td>{{ $item['Telecast Date'] }}</td>
                                    <td>{{ $item['Day'] }}</td>
                                    <td>{{ $item['Time'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
        
        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}

<script>
    // $(document).ready( function () {
        
    // } );
</script>

@endsection



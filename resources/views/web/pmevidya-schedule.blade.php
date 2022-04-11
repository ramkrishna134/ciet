@php
    $programms = $data['message'];
    // dd($programms);
@endphp

@extends('layouts.app')

@section('title')PMeVidya | Channel -{{ $channel }} | {{ ucfirst($category) }} Programms | @endsection

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
                        <a href="{{ route('pmevidya.schedule', ['class'=> $class,'channel' => $channel, 'category' => 'current']) }}" class="btn btn-outline-primary @if($category === 'current') active @endif">Current</a>
                        <a href="{{ route('pmevidya.schedule', ['class'=> $class,'channel' => $channel, 'category' => 'upcoming']) }}" class="btn btn-outline-primary @if($category === 'upcoming') active @endif">Upcoming</a>
                        <a href="{{ route('pmevidya.schedule', ['class'=> $class,'channel' => $channel, 'category' => 'archive']) }}" class="btn btn-outline-primary @if($category === 'archive') active @endif">Archive</a>
                    </div>
                </div>
                
                <div class="card shadow rounded">
                    <div class="card-body">
                        <table class="table table-striped" id="sheduleTable">
                            <thead>
                                <tr>
                                    <th width="100px">Sl. No.</th>
                                    @if($category === 'archive')
                                    <th>Course</th>
                                    @endif

                                    <th>Topic</th>
                                    
                                    @if($category != 'archive')
                                    <th>Language</th>
                                    @endif
                                    <th>Subject</th>

                                    @if($category != 'archive')
                                    <th width="150px">Telecast Date</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    @else
                                    <th>Content Link</th>
                                    @endif
                                    
                                    
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach($programms as $item)
                                <tr>
                                    <th>{{ $item['No'] }}</th>
                                    @if($category === 'archive')
                                    <td>{{ $item['Course'] }}</td> 
                                    @endif
                                    
                                    <td>{{ $item['Topic'] }}</td>
                                    @if($category != 'archive')
                                    <td>{{ ucfirst($item['Language']) }}</td>
                                    @endif
                                    
                                    <td>{{ $item['Subject'] }}</td>

                                    @if($category != 'archive')
                                    <td>{{ $item['Telecast Date'] }}</td>
                                    <td>{{ $item['Day'] }}</td>
                                    <td>{{ $item['Time'] }}</td>
                                    @else
                                    <td class="text-center">
                                        <a href="{{ $item['YouTube Link'] }}" target="_blank"><i class="fas fa-video"></i></a>
                                    </td>
                                    @endif
                                    
                                    
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



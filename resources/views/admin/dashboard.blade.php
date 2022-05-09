@php
  $freeSpace = round(disk_free_space('/')/1048576);
  $totalSpace = round(disk_total_space('/')/1048576);
  $used = $totalSpace - $freeSpace;
  $Percentage = cal_percentage($used, $totalSpace);

  $totalByte = disk_total_space("/");
  $freeByte = disk_free_space('/');
  $usedByte = $totalByte - $freeByte;

  $events = DB::table('events')->get();
  $webinars = DB::table('webinars')->get();
  $users = DB::table('users')->get();
@endphp

@extends('layouts.sidebar')

@section('title')
Dashboard
@endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
<script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/js/evo-calendar.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.midnight-blue.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.orange-coral.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.royal-navy.min.css"> --}}

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
        <div class="card-body shadow rounded bg-white">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>{{ count($events) }}</h2>
                    <h5 class="mb-0">Total Activities</h5>
                    <small><a href="{{ route('event.index') }}"><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-calendar"></i></span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card-body shadow rounded bg-white">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>{{ count($webinars) }}</h2>
                    <h5 class="mb-0">Total Webinars</h5>
                    <small><a href="{{ route('webinar.index') }}"><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-chalkboard"></i></span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="card-body shadow rounded bg-white">
            <div class="row row align-items-center">
                <div class="col-8">
                    <h2>{{ count($users) }}</h2>
                    <h5 class="mb-0">Total Users</h5>
                    <small><a href="{{ route('user.index') }}"><strong><i class="fas fa-eye"></i> View</strong></a></small>
                </div>
                <div class="col-4">
                    <h2 class="mb-0"><span class="badge bg-primary"><i class="fas fa-user"></i></span></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-sm-3">
        <div class="card mt-4 shadow border-white">
            <div class="card-body">
                <div id="color-calendar"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="card mt-4 shadow border-white">
            <div class="card-header bg-white">
                <h5 class="mb-0 text-center text-primary"><i class="fas fa-chart-pie"></i> Disk Analyzer</h5>
            </div>
            <div class="card-body disk" data-free="{{ $freeSpace }}" data-used="{{ $Percentage }}">

                <div id="piechart" style="width: 100%; height: 270px;"></div>

            </div>

            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-6">
                        <strong>Total Space: </strong> {{ formatBytes($totalByte) }} <br>
                        <strong>Free Space: </strong>  {{ formatBytes($freeByte) }}
                    </div>
                    <div class="col-6">
                        <strong>Total Usage: </strong> {{ formatBytes($usedByte) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            new Calendar({
                id: '#color-calendar',
                primaryColor: '#D46142',
            })

        })

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var totalUsage = $('.disk').data('used');
        var freeSpace = 100 - totalUsage;

        var data = google.visualization.arrayToDataTable([
          ['Tag', 'Space in GB'],
          ['Free Space',      freeSpace],
          ['Total Usage',    totalUsage],
        ]);

        var options = {
          title: 'Disk Analyzer'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


      
    </script>

@endsection
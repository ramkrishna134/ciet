@extends('layouts.sidebar')

@section('title')
Visitor Manager
@endsection

@section('content')



<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header">
                Total Unique visitor: {{ $totalVisitor }} <br>
                Total Page Hits ({{ date('d/m/y') }}): {{ $todayPageHit }}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>IP</th>
                                <th>URI</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->date }}</td>
                                <td>{{ $visitor->ip }}</td>
                                <td><a href="{{ $visitor->url }}" target="_blank">{{ $visitor->url }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    


@endsection
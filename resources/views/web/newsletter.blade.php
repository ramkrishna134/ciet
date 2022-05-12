@extends('layouts.app')

@section('title')Newsletter | @endsection
@section('description')@endsection
{{-- @section('image'){{ $page->featured_icon }}@endsection
@section('keyword'){{ json_decode($page->key_word) }}@endsection --}}

@section('content')


<section class="hero-section count-height" style="background-image: url('images/web/hero.png')">
    <div class="container">
        <div class="content">
            <h1 class="title">Newsletter</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                </ol>
            </nav>
        </div>

    </div>
</section>

<section class="page-content" id="main-content">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <form action="">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <select name="month" id="month" class="form-control">
                                                <option value="">-- Select Month ---</option>
                                                @for($i=1; $i<=12; $i++): 
                                                    @php $month = date('F', mktime(0, 0, 0, $i, 10));@endphp
                                                    <option value="">{{ $month }}</option>
                                                @endfor
                                                
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="year" id="year" class="form-control">
                                                <option value="">-- Select Year ---</option>
                                                @php
                                                    $latest_year = date('Y');
                                                    $earliest_year = 2015;
                                                    foreach ( range( $latest_year, $earliest_year ) as $i ):
                                                @endphp
                                                <option value="{{ $i }}">{{ $i }}</option>
        
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fas fa-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="newsletter-wrap mt-4">
                    <div class="row justify-content-center">

                        @foreach($articals as $artical)

                        <div class="col-sm-3">
                            <div class="newsletter shadow">

                                @if($artical->latest == 1)
                                <div class="latest">Latest</div>
                                @endif

                                <div class="image">
                                    <img class="img-fluid" src="{{ $artical->icon }}" alt="{{ $artical->name }} Image">
                                </div>
                                <div class="title">{{ $artical->name }}</div>
                                @php
                                      $date = new DateTime($artical->date);
                                    @endphp
                                <div class="date"><i class="fas fa-calendar-day"></i> {{ $date->format('d F Y') }}</div>
                                <a href="{{ $artical->url }}" class="button"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>

                        @endforeach


                        
                    </div>

                    {!! $articals->links() !!}
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
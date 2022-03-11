@php
$url='https://swayamprabha.gov.in/index.php/Api_data?channel_no=26&category=current';
$data = json_decode(file_get_contents($url), true);
@endphp


@extends('layouts.sidebar')

@section('title')
Demo API Testing
@endsection

@section('content')

@dd($data);

@endsection
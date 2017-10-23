@extends('layouts.default')

@section('title'){{ $destinationInfo['seo_title'] }}{{ $seoSuffix }}@endsection
@section('description'){{ $destinationInfo['description'] }}@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-camera"></span> 旅行 <small>Travel</small></h1>
    </div>

    <nav>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('index.travel') }}">Travel</a></li>
            <li class="active"><a href="{{ route('travel.destination', [$destinationInfo['slug']]) }}">{{ $destinationInfo['destination'] }}</a>
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            @include('travel.lists')
        </div>
    </div>
</div>
@endsection

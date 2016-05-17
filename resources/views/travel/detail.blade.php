@extends('layouts.default')

@section('title'){{ $detail->seo_title }}{{ $seoSuffix }}@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-picture"></span> 旅行
                <small>Travel</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('travel.index') }}">Travel</a></li>
                    <li class="active"><a href="{{ route('travel.destination', [$destination]) }}">Hong Kong</a></li>
                </ol>
                <h1>{{ $detail->title }}</h1>
                <div class="content">
                    {{ $detail->content }}
                </div>
            </div>
        </div>
    </div>
@endsection

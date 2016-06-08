@extends('layouts.default')

@section('title'){{ $seoTitle }}{{ $seoSuffix }}@endsection
@section('description'){{ $description }}@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-picture"></span> 旅行 <small>Travel</small></h1>
    </div>

    <nav>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('index.travel') }}">Travel</a></li>
            <li class="active"><a href="{{ route('travel.destination', [$destinationSlug]) }}">{{ $destination }}</a>
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            @foreach($lists as $item)
            <div class="media">
                <div class="media-left">
                    <a href="{{ $item->url }}">
                        <img class="media-object" src="{{ $item->cover_image }}" alt="{{ $item->title }}" width="80" height="80">
                    </a>
                </div>
                <div class="media-body">
                    <a href="{{ $item->url }}"><h4 class="media-heading">{{ $item->title }}</h4></a>
                    <p>{{ $item->begin_date->diffForHumans() }}</p>
                    {{ $item->description }}<a href="{{ $item->url }}">[瞧瞧]</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

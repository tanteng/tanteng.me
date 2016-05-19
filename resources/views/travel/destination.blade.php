@extends('layouts.default')

@section('title'){{ $seoTitle }}{{ $seoSuffix }}@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-picture"></span> 旅行 <small>Travel</small></h1>
    </div>

    <nav>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('travel.index') }}">Travel</a></li>
            <li class="active"><a href="{{ route('travel.destination', [$destinationSlug]) }}">{{ $destination }}</a>
            </li>
        </ol>
    </nav>

    <div class="row">
        @foreach($lists as $list)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="{{ $list->url }}"><img class="img-responsive" src="{{ $list->cover_image  }}" alt="{{ $list->title }}"></a>
                <div class="caption">
                    <h3><a href="{{ $list->url }}">{{ $list->description }}</a></h3>
                    <p><a href="{{ $list->url }}">{{ $list->description }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

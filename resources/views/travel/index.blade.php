@extends('layouts.default')

@section('title', 'Travel - tanteng.me')

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-picture"></span> 旅行 <small>Travel</small></h1>
    </div>

    <div class="es-filter">
        <ul class="nav nav-sort clearfix">
            <li><a class="active" href="">最新</a></li>
            <li><a class="" href="">最爱</a></li>
        </ul>
    </div>

    <div class="row">
        @foreach($lists as $list)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="{{ $list->url }}" target="_blank"><img class="img-responsive" src="{{ $list->cover_image }}" alt="{{ $list->destination }}"></a>
                <div class="caption">
                    <h3><a href="{{ $list->url }}" target="_blank">{{ $list->destination }}</a><span class="pull-right badge">{{ $list->total }}</span></h3>
                    <p><a href="{{ $list->url }}" target="_blank">{{ $list->description }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

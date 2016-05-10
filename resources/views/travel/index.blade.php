@extends('layouts.default')

@section('title', 'Travel - tanteng.me')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>旅行的意义</h1>
        <p>Comming soon!</p>
    </div>

    <div class="es-filter">
        <ul class="nav nav-sort clearfix">
            <li><a class="" href="">最新</a></li>
            <li><a class="" href="">最爱</a></li>
        </ul>
    </div>

    <div class="row">
        @foreach($lists as $list)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img class="img-responsive" src="{{ $list->cover_image }}" alt="{{ $list->destination }}">
                <div class="caption">
                    <h3>{{ $list->destination }}</h3>
                    <p>{{ $list->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

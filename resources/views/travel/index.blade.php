@extends('layouts.default')

@section('title', 'Travel - tanteng.me')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>旅行的意义</h1>
        <p>Comming soon!</p>
    </div>

    <div class="row">
        @foreach($lists as $list)
        <div class="col-sm-12 col-md-6">
            <div class="thumbnail">
                <img src="{{ $list->cover_image }}" alt="{{ $list->destination }}" style="height:252px; width: 100%;">
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

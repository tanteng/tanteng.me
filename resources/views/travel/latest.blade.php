@extends('layouts.default')

@section('title')全部游记_谈腾的旅行游记{{ $seoSuffix }}@endsection
@section('description')该页显示全部游记，按照出行时间倒序排列，目的地香港，澳门，深圳，广州，北京，张家界，桂林等，每页显示20条，分页显示。@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-camera"></span> 旅行 <small>Travel</small></h1>
    </div>

    <nav>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('index.travel') }}">Travel</a></li>
            <li class="active"><a href="{{ route('travel.latest') }}">全部游记</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            @include('travel.lists')
            {{ $travelList->render() }}
        </div>
    </div>
</div>
@endsection

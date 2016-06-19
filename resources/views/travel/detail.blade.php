@extends('layouts.default')

@section('title'){{ $detail->seo_title }}{{ $seoSuffix }}@endsection
@section('description'){{ $detail->description }}@endsection
@section('meta')<meta name="author" content="谈腾">
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class=" glyphicon glyphicon-camera"></span> 旅行
                <small>Travel</small>
            </h1>
        </div>

        <div class="row">
            <nav class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('index.travel') }}">Travel</a></li>
                    <li class="active"><a href="{{ route('travel.destination', [$destinationInfo->slug]) }}">{{ $destinationInfo->destination }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <main class="col-md-10 col-md-offset-1">
                <article class="main-content">
                    <header>
                        <h1>{{ $detail->title }}</h1>
                        <section class="post-meta">
                            <time title="{{ $detail->begin_date->format('Y-m-d') }}" datetime="{{ $detail->begin_date }}" class="post-date"><span class="glyphicon glyphicon-calendar"></span> {{ $detail->begin_date->format('Y-m-d') }}</time>
                        </section>
                    </header>
                    <section class="post-content">
                        {!! $detail->content !!}
                    </section>
                </article>
            </main>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="widget">
                <h4 class="title">目的地</h4>
                <div class="content tag-cloud">
                    @foreach($destinationList as $item)
                        <a href="{{ route('travel.destination', [$item->slug]) }}">{{ $item->destination }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(".post-content img").addClass('img-responsive center-block');
    </script>
@endsection


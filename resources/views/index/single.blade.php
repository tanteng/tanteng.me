@extends('layouts.default')

@section('title', $content['seo_title'] . '_tanteng.me')
@section('description', $content['description'])

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-file"></span> 页面
            <small>Page</small>
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <section class="nav">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">页面</li>
                </ol>
            </section>

            <section class="header">
                <h1 class="page-header">{{ $content['title'] }}</h1>
            </section>

            <section class="content">
                {!! $content['content'] !!}
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        $image = $(".content img");
        $image.parent('p').addClass('img-width');
        $image.addClass('img-responsive center-block');
    </script>
@endsection
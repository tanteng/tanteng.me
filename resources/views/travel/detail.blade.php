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
            <main class="col-md-8 main-content">
                <nav>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('travel.index') }}">Travel</a></li>
                        <li class="active"><a href="{{ route('travel.destination', [$destinationSlug]) }}">{{ $destination }}</a>
                        </li>
                    </ol>
                </nav>
                <article>
                    <header>
                        <h1>{{ $detail->title }}</h1>
                        <section class="post-meta">
                            <time title="{{ $detail->updated_at }}" datetime="{{ $detail->updated_at }}" class="post-date">{{ $detail->updated_at }}</time>
                        </section>
                    </header>
                    <section class="post-content">
                        {{ $detail->content }}
                    </section>
                    <section class="comment">
                        <!--高速版-->
                        <div id="SOHUCS" sid="{{ $sid }}"></div>
                        <script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
                        <script type="text/javascript">
                            window.changyan.api.config({
                                appid: 'cysoRvh1E',
                                conf: 'prod_89a607ba09618e8e8b657d93d4ca1f96'
                            });
                        </script>
                    </section>
                </article>
            </main>
            <aside class="col-md-4">
                <div class="widget">
                    <h4 class="title">目的地</h4>
                    <div class="content tag-cloud">
                        @foreach($destinationList as $item)
                        <a href="{{ route('travel.destination', [$item->slug]) }}">{{ $item->destination }}</a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection

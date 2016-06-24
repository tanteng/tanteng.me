@extends('layouts.default')

@section('title', 'Travel - tanteng.me')
@section('description')这里有香港，广州，深圳，厦门，澳门，庐山，桂林，张家界等许多地方的游记，旅行可以看到不同的世界，每到一个地方，都会充满新鲜感和好奇心，你会感受到不同地方的文化，或看到神奇的大自然的力量，或体验不同的生活，不仅可以增长见识，也可以从中学习成长。回忆每一次的旅行，记录走过的路。@endsection
@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-camera"></span> 旅行
                <small>Travel</small>
            </h1>
        </div>


        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#destination" aria-controls="destination" role="tab" data-toggle="tab">目的地</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">最新游记</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active margin-top15" id="destination">
                        @foreach($destinationList as $list)
                            <div class="col-sm-6 col-md-4 box">
                                <div class="thumbnail">
                                    <a href="{{ $list->url }}"><img class="img-responsive" src="{{ $list->cover_image }}" alt="{{ $list->destination }}"></a>
                                    <div class="caption">
                                        <h3><a href="{{ route('travel.destination', [$list->slug]) }}">{{ $list->destination }}</a><span class="pull-right badge">{{ $list->total }}篇</span></h3>
                                        <p><a href="{{ $list->url }}">{{ str_limit($list->description, 122) }}</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div role="tabpanel" class="tab-pane fade margin-top15" id="profile">
                        @include('travel.lists')
                        <div class="text-xs-center">
                            <a role="button" href="{{ route('travel.latest') }}" class="btn2 btn-secondary-outline m-b-1"><span class="glyphicon glyphicon-pencil"></span>全部游记</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div style="margin-top:16px;"></div>

        <div class="row">
            <div class="col-md-12 aside">
                <h3 class="title">Coding</h3>
                <p>如果你是一名Developer，或者学习Laravel框架，可以参考“Travel”相关代码，Github仓库：</p>
                <ul>
                    <li><a href="https://github.com/tanteng/tanteng.me/blob/master/app/Http/routes.php" target="_blank"><code>routes.php</code>路由</a></li>
                    <li><a href="https://github.com/tanteng/tanteng.me/blob/master/app/Http/Controllers/TravelController.php" target="_blank"><code>TravelController.php</code>控制器</a></li>
                    <li><a href="https://github.com/tanteng/tanteng.me/blob/master/app/Models/Destination.php" target="_blank"><code>Destination.php</code>目的地模型</a></li>
                    <li><a href="https://github.com/tanteng/tanteng.me/blob/master/app/Models/Travel.php" target="_blank"><code>Travel.php</code>游记模型</a></li>
                    <li><a href="https://github.com/tanteng/tanteng.me/tree/master/resources/views/travel" target="_blank"><code>View</code>视图</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

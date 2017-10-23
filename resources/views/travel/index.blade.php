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
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li role="presentation" class="active"><a href="#destination" tabIndex="1"  aria-controls="destination" role="tab">目的地</a></li>
                    <li role="presentation"><a href="#travelNotes" tabIndex="2"  aria-controls="profile" role="tab">最新游记</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active margin-top15" id="destination">
                        @foreach($destinationList as $list)
                            <div class="col-sm-6 col-md-4 box">
                                <div class="thumbnail">
                                    <a href="{{ $list['url'] }}"><img class="img-responsive" src="{{ $list['cover_image'] }}" alt="{{ $list['destination'] }}"></a>
                                    <div class="caption">
                                        <h3><a href="{{ route('travel.destination', $list['slug']) }}">{{ $list['destination'] }}</a><span class="pull-right badge">@if (isset($travelNums[$list['id']])) {{ $travelNums[$list['id']] }} @else 0 @endif 篇</span></h3>
                                        <p><a href="{{ $list['url'] }}">{{ str_limit($list['description'], 122) }}</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div role="tabpanel" class="tab-pane fade margin-top15" id="travelNotes">
                        @include('travel.lists')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script type="text/javascript">
        (function () {
            $myTabs = $("#myTabs");
            $myTabs.find("a").click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $myTabs.find("a").on("shown.bs.tab", function (e) {
                tabIndex = $(e.target).attr("tabIndex");
                $.cookie('tabIndex', tabIndex, {expire: 10});
            });

            var tabIndex = $.cookie('tabIndex');
            if (tabIndex) {
                $myTabs.find("li").eq(tabIndex - 1).find("a").tab('show')
            }
        })(jQuery)
    </script>
@endsection

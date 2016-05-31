@extends('layouts.default')

@section('title', 'Travel - tanteng.me')
@section('description')这里有香港，广州，深圳，厦门，澳门，庐山，桂林，张家界等许多地方的游记，旅行可以看到不同的世界，每到一个地方，都会充满新鲜感和好奇心，你会感受到不同地方的文化，或看到神奇的大自然的力量，或体验不同的生活，不仅可以增长见识，也可以从中学习成长。回忆每一次的旅行，记录走过的路。@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-picture"></span> 旅行 <small>Travel</small></h1>
    </div>

    <div class="row">
        @foreach($lists as $list)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="{{ $list->url }}"><img class="img-responsive" src="{{ $list->cover_image }}" alt="{{ $list->destination }}"></a>
                <div class="caption">
                    <h3><a href="{{ route('travel.destination', [$list->slug]) }}" target="_blank">{{ $list->destination }}</a><span class="pull-right badge">{{ $list->total }}</span></h3>
                    <p><a href="{{ $list->url }}">{{ str_limit($list->description, 122) }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('title', '目的地管理 - 旅行')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">目的地管理 - 旅行</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">添加目的地</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{ url('/destination') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="destination">目的地名称</label>
                                    <input class="form-control" type="text" name="destination" id="destination">
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">Slug</label>
                                    <input class="form-control" type="text" name="slug" id="slug">
                                </div>
                                <div class="form-group">
                                    <label for="title">标题</label>
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">SEO标题</label>
                                    <input class="form-control" type="text" name="seo_title" id="seo_title">
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <textarea class="form-control" name="description" id="description" rows="5" cols="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="year">年份</label>
                                    <input class="form-control" type="text" name="year" id="year">
                                    <p class="help-block">多个年份可用,隔开，如"2014,2016"</p>
                                </div>
                                <div class="form-group">
                                    <label for="cover_image">封面图片</label>
                                    <input class="form-control" type="text" name="cover_image" id="cover_image">
                                </div>
                                <div class="form-group">
                                    <label for="latest">最后来访时间</label>
                                    <input class="form-control" type="text" name="latest" id="latest">
                                </div>
                                <div class="form-group">
                                    <label for="score">评分</label>
                                    <input class="form-control" type="text" name="score" id="score">
                                </div>
                                <input type="hidden" name="isEdit" value="0">
                                <button class="btn btn-default" type="submit">发布</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">所有目的地</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($destination as $item)
                                    <li class="list-group-item">
                                        <span class="pull-right"><a href="/destination/{{ $item->id }}/edit">编辑</a></span>{{ $item['destination'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
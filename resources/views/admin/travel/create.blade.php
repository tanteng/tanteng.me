@extends('layouts.admin')
@section('title', '添加 - 旅行记录')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">添加 - 旅行记录</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">添加游记</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="POST" action="{{ url('/travel/post-new') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="destination">目的地</label>
                                    <select class="form-control" name="destination_id" id="destination">
                                        @foreach($destination as $item)
                                            <option value="{{ $item->id }}">{{ $item->destination }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input class="form-control" type="text" name="slug" id="slug" value="">
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">标题</label>
                                    <input class="form-control" type="text" name="title" id="title" value="">
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">SEO标题</label>
                                    <input class="form-control" type="text" name="seo_title" id="seo_title" value="">
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <input class="form-control" type="text" name="description" id="description" value="">
                                </div>
                                <div class="form-group">
                                    <label for="img_cover">封面图片</label>
                                    <input class="form-control" type="text" name="img_cover" id="img_cover" value="">
                                </div>
                                <div class="form-group">
                                    <label for="begin_date">开始时间</label>
                                    <input class="form-control" type="text" name="begin_date" id="begin_date" value="">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">结束时间</label>
                                    <input class="form-control" type="text" name="end_date" id="end_date" value="">
                                </div>
                                <div class="form-group">
                                    <label for="content">正文</label>
                                    <textarea class="form-control" rows="10" cols="40" name="content" id="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="score">排序</label>
                                    <input class="form-control" type="text" name="score" id="score" value="">
                                </div>
                                <input type="hidden" name="isEdit" value="0">
                                <button class="btn btn-default" type="submit">发布</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
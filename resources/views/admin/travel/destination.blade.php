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
        <div class="col-lg-8 col-md-10">
            <h3>添加目的地</h3>
            <form role="form" method="POST" action="{{ url('/travel/destination/add') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="destination">目的地名称</label>
                    <input class="form-control" type="text" name="destination" id="destination">
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
                    <label for="cover">封面图片</label>
                    <input class="form-control" type="text" name="cover_image_url" id="cover">
                </div>
                <button class="btn btn-default" type="submit">发布</button>
            </form>
        </div>
    </div>
</div>
@endsection
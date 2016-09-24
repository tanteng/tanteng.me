@extends('layouts.admin')
@section('title', '添加 - 内容管理')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">添加 - 内容管理</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">添加内容</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <form role="form" method="POST" action="{{ url('/content') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">标题</label>
                                        <input class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_title">SEO标题</label>
                                        <input class="form-control" name="seo_title" id="seo_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input class="form-control" name="slug" id="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">分类</label>
                                        <select class="form-control" name="class_id" id="class_id">
                                            <option value="1">PHP技术分享</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">标签</label>
                                        <input class="form-control" name="tag_id" id="tag_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">内容</label>
                                        <textarea class="form-control" rows="10" cols="40" name="content" id="content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">发布形式</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="1">页面</option>
                                            <option value="2">文章</option>
                                        </select>
                                    </div>
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
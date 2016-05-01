@extends('layouts.admin')
@section('title', '添加 - 英语怎么说')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">添加 - 英文怎么说</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8 col-md-10">
            <form role="form" method="POST" action="{{ url('/english/post-new') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug">
                </div>
                <div class="form-group">
                    <label for="phrase">单词或句子</label>
                    <input class="form-control" type="text" name="phrase" id="phrase">
                </div>
                <div class="form-group">
                    <label for="content">正文</label>
                    <textarea class="form-control" rows="10" cols="40" name="content" id="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="seo_title">SEO标题</label>
                    <input class="form-control" type="text" name="seo_title" id="seo_title" value="英文怎么说">
                </div>
                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea class="form-control" rows="4" cols="40" name="description" id="description"></textarea>
                </div>
                <button class="btn btn-default" type="submit">发布</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection
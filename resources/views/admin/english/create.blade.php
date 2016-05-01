@extends('layouts.admin')
@section('title')@if($isEdit)编辑@else添加@endif - 英文怎么说@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@if($isEdit)编辑@else添加@endif - 英文怎么说</h1>
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
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $detail->slug }}">
                </div>
                <div class="form-group">
                    <label for="phrase">单词或句子</label>
                    <input class="form-control" type="text" name="phrase" id="phrase" value="{{ $detail->phrase }}">
                </div>
                <div class="form-group">
                    <label for="content">正文</label>
                    <textarea class="form-control" rows="10" cols="40" name="content" id="content">{{ $detail->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="seo_title">SEO标题</label>
                    <input class="form-control" type="text" name="seo_title" id="seo_title" value="{{ $detail->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea class="form-control" rows="4" cols="40" name="description" id="description">{{ $detail->description }}</textarea>
                </div>
                <input type="hidden" name="isEdit" value="{{ $isEdit }}">
                <input type="hidden" name="id" value="{{ $detail->id }}">
                <button class="btn btn-default" type="submit">发布</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection
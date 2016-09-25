@extends('layouts.admin')
@section('title', '编辑 - 内容管理')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">编辑 - 内容管理</h1>
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
                                <form role="form" method="POST" action="{{ route('content.update', $content->id) }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="title">标题</label>
                                        <input class="form-control" name="title" id="title" value="{{ $content->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_title">SEO标题</label>
                                        <input class="form-control" name="seo_title" id="seo_title" value="{{ $content->seo_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input class="form-control" name="slug" id="slug" value="{{ $content->slug }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">描述</label>
                                        <textarea class="form-control" rows="3" cols="40" name="description" id="description">{{ $content->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">分类</label>
                                        <select class="form-control" name="class_id" id="class_id">
                                            <option value="1" @if($content->class_id == 1) selected @endif>PHP技术分享</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">标签</label>
                                        <input class="form-control" name="tag_id" id="tag_id" value="{{ $content->tag_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">内容</label>
                                        <textarea class="form-control" rows="10" cols="40" name="content" id="content">{{ $content->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">发布形式</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="1" @if($content->type == 1) selected @endif>页面</option>
                                            <option value="2" @if($content->type == 2) selected @endif>文章</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
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

@section('js')
    <script type="text/javascript">
        (function(){
            $('.detail').autosize();
        })(jQuery)
    </script>
@endsection
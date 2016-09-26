@extends('layouts.admin')
@section('title', '内容管理')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">内容列表</h1>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped .table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>SEO标题</th>
                    <th>添加时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->title }}</td>
                        <td>{{ $list->seo_title }}</td>
                        <td>{{ $list->created_at }}</td>
                        <td>{{ $list->updated_at }}</td>
                        <td><a href="{{ route('index.page', $list->slug) }}" target="_blank">查看</a> <a href="{{ route('content.edit', $list->id) }}">编辑</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
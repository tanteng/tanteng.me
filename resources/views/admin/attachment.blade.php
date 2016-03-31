@extends('layouts.admin')
@section('title', '媒体管理')

@section('content')
<div class="container">
    <h2><span class="glyphicon glyphicon-plus"></span> 文件上传</h2>
    <div class="row">
        @if(session('error'))
            <p class="text-warning">{{ session('error') }}</p>
        @endif
        <form method="post" action="{{ url('/admin/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">请选择文件</label>
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </form>
    </div>

    <h2><span class="glyphicon glyphicon-camera"></span> 媒体库</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped .table-hover">
                <thead>
                <tr>
                    <th>文件名</th>
                    <th>文件url</th>
                    <th>文件类型</th>
                    <th>文件大小</th>
                    <th>最后更新</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                <tr>
                    <td>{{ $list->key }}</td>
                    <td><a href="{{ $list->url }}" target="_blank">{{ $list->url }}</a></td>
                    <td>{{ $list->type }}</td>
                    <td>{{ $list->size }}</td>
                    <td>{{ $list->updated_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
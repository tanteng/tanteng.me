@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>媒体文件</h2>
    <p><a class="btn btn-default" href="{{ url('admin/upload') }}" role="button">上传文件</a></p>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
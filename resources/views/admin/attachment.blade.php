@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>媒体文件</h2>
    <div class="row">
        @if(session('error'))
            <p class="text-warning">{{ session('error') }}</p>
        @endif
        <form method="post" action="{{ url('/admin/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="file">
            <input type="submit">
        </form>
    </div>

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
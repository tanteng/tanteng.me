@extends('layouts.admin')
@section('title', '媒体管理')

@section('content')
<div class="container">
    <h2><span class="glyphicon glyphicon-plus"></span> 文件上传</h2>
    <div class="row">
        @if(session('error'))
            <p class="bg-danger">{{ session('error') }}</p>
        @endif

        @if(session('tip'))
            <p class="bg-success">{{ session('tip') }}</p>
        @endif
        <p class="bg-danger" style="display: none;" id="error_tip"></p>
        <form method="post" action="{{ url('/admin/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">请选择文件</label>
                <input type="file" name="file" onchange="checkFileSize(this)">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default" id="btn_submit">提交</button>
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
                    <th>预览</th>
                    <th>文件类型</th>
                    <th>文件大小</th>
                    <th>最后更新</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                <tr>
                    <td>{{ $list->key }}</td>
                    <td><a href="{{ $list->url }}" target="_blank">{{ $list->url }}</a></td>
                    <td>@if($list->isimg) <img src="{{ $list->url }}" title="图片预览" width="30" height="30"> @endif</td>
                    <td>{{ $list->type }}</td>
                    <td>{{ $list->size }}</td>
                    <td>{{ $list->updated_at }}</td>
                    <td><span class="glyphicon glyphicon-trash del_file"></span> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    function checkFileSize(obj) {
        var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
        if (isIE && !obj.files) {
            var filePath = obj.value;
            var fileSystem = new ActiveXObject("Scripting.FileSystemObject");
            var file = fileSystem.GetFile(filePath);
            fileSize = file.Size;
        } else {
            fileSize = obj.files[0].size;
        }

        fileSize = Math.round(fileSize / 1024 * 100) / 100; //单位为KB
        if (fileSize >= 5000) {
            $("#error_tip").html('文件大小不能超过5M！').show();
            $("#btn_submit").attr("disabled","disabled");
            return false;
        }else{
            $("#error_tip").hide();
            $("#btn_submit").attr("disabled", false);
        }
    }
</script>
@endsection
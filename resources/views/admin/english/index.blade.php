@extends('layouts.admin')
@section('title', '英文怎么说')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">英文怎么说</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped .table-hover">
                <thead>
                <tr>
                    <th>短语</th>
                    <th>URL</th>
                    <th>TITLE</th>
                    <th>tag</th>
                    <th>最后更新</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <td>{{ $list->phrase }}</td>
                        <td>http://english.tanteng.me/how-to-say/{{ $list->slug }}</td>
                        <td>{{ $list->seo_title }}</td>
                        <td>{{ $list->tag }}</td>
                        <td>{{ $list->updated_at }}</td>
                        <td>
                            <a href="{{ route('how-to-say.detail', ['slug'=>$list->slug]) }}" target="_blank">查看</a>
                            <a href="/english/edit/{{ $list->id }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav>
                {{ $lists->render() }}
            </nav>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection
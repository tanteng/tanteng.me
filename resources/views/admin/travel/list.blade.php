@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>游记列表
                <a class="btn btn-default" href="{{ url('admin/travel/create') }}"><i class="fa fa-plus"></i> 写游记</a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">游记列表</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if (session('info'))
                        <div class="callout callout-success">
                            <h4>提示</h4>
                            <p>{{ session('info') }}</p>
                        </div>
                    @endif
                    <div class="subnav">
                        <ul class="subsubsub">
                            <li class="all"><a href="{{ route('travel.index') }}" class="current">全部<span class="count">（{{ $count['all'] }}）</span></a> |</li>
                            <li class="publish"><a href="">已发布<span class="count">（{{ $count['all'] }}）</span></a> |</li>
                            <li class="draft"><a href="">草稿<span class="count">（0）</span></a></li>
                        </ul>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">游记列表</h3>
                        </div>
                        <div class="box-body">
                            <table id="user-list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>目的地</th>
                                        <th>slug</th>
                                        <th>标题</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($travels as $travel)
                                <tr id="item-{{ $travel->id }}">
                                    <td>{{ $travel->id }}</td>
                                    <td>{{ isset($destinationList[$travel->destination_id]) ? $destinationList[$travel->destination_id] : '' }}</td>
                                    <td>{{ $travel->slug }}</td>
                                    <td>{{ $travel->title }}</td>
                                    <td>{{ $travel->created_at }}</td>
                                    <td>{{ $travel->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('travel.edit', $travel->id) }}">编辑</a>
                                        <a class="btn btn-danger btn-xs delete" href="javascript:;" data-id="{{ $travel->id }}">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <a class="btn btn-default pull-right" href="{{ url('admin/travel/create') }}"><i class="fa fa-plus"></i> 新建游记</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        var fn = (function () {
            var _token = '{{ csrf_token() }}';
            var delItem = function (id) {
                $.post('{{ url('admin/travel') }}/' + id, {'_token': _token, '_method': 'DELETE'}, function (data) {
                    if (data.result == 0) {
                        $("#item-" + id).fadeOut('normal', function () {
                            $(this).remove();
                        });
                    }
                }, 'json');
            };
            return {delItem: delItem};
        })();

        $(".delete").click(function () {
            if (confirm('确认操作吗?')) {
                fn.delItem($(this).data('id'));
            }
        });
    </script>
@endsection
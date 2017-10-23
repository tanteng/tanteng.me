@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>权限列表
                <small>Permission List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">权限列表</li>
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
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">权限列表</h3>
                        </div>
                        <div class="box-body">
                            <table id="user-list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>权限名称</th>
                                        <th>权限中文名</th>
                                        <th>描述</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <td>操作</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                <tr id="item-{{ $permission->id }}">
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->display_name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>{{ $permission->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('permission.edit', $permission->id) }}">编辑</a>
                                        <a class="btn btn-danger btn-xs delete" href="javascript:;" data-id="{{ $permission->id }}">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <a class="btn btn-default pull-right" href="{{ url('admin/permission/create') }}"><i class="fa fa-plus"></i> 新建权限</a>
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
                $.post('{{ url('admin/permission') }}/' + id, {'_token': _token, '_method': 'DELETE'}, function (data) {
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
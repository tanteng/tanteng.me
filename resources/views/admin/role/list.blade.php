@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>角色列表
                <small>Role List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">角色列表</li>
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
                            <h3 class="box-title">角色列表</h3>
                        </div>
                        <div class="box-body">
                            <table id="user-list" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>英文名称</th>
                                        <th width="12%">中文名称</th>
                                        <th width="20%">角色描述</th>
                                        <td width="20%">权限</td>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                <tr id="item-{{ $role->id }}">
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->permissionDisplayNames }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ route('role.edit', $role->id) }}">编辑</a>
                                        <a class="btn btn-danger btn-xs delete" href="javascript:;" data-id="{{ $role->id }}">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <a class="btn btn-default pull-right" href="{{ url('admin/role/create') }}"><i class="fa fa-plus"></i> 新建角色</a>
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
                $.post('{{ url('admin/role') }}/' + id, {'_token': _token, '_method': 'DELETE'}, function (data) {
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
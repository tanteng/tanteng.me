@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>编辑角色<small>Edit Role</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">编辑角色</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if (session('info'))
                        <div class="callout callout-success">
                            <h4>提示</h4>
                            <p>{{ session('info') }}</p>
                        </div>
                    @endif

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑角色</h3>
                        </div>
                        <form role="form" action="{{ route('role.update', $role->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="roleName">英文名称</label>
                                    <input class="form-control" name="name" id="roleName" placeholder="角色英文名称" value="{{ $role->name }}" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                    <label for="roleDisplayName">中文名称</label>
                                    <input class="form-control" name="display_name" id="roleDisplayName" value="{{ $role->display_name }}" placeholder="角色中文名称" type="text">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <input class="form-control" name="description" id="description" placeholder="角色描述" value="{{ $role->description }}" type="text">
                                    <p class="help-block">该角色的描述说明。</p>
                                </div>
                                <div class="form-group">
                                    <label>角色权限</label>
                                    <div class="checkbox">
                                        @foreach($permissions as $permission)
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}" @if (in_array($permission->id, $hasPermissions)) checked @endif>
                                                {{ $permission->display_name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                            <input type="hidden" name="_method" value="PUT">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
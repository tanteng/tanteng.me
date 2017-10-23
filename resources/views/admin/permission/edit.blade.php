@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>编辑权限<small>Edit Permission</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">编辑权限</li>
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
                            <h3 class="box-title">编辑权限</h3>
                        </div>
                        <form role="form" action="{{ route('permission.update', $permission->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="permissionName">英文名称</label>
                                    <input class="form-control" name="name" id="permissionName" placeholder="权限英文名称" value="{{ $permission->name }}" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                    <label for="permissionDisplayName">中文名称</label>
                                    <input class="form-control" name="display_name" id="permissionDisplayName" value="{{ $permission->display_name }}" placeholder="权限中文名称" type="text">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <input class="form-control" name="description" id="description" placeholder="角色描述" value="{{ $permission->description }}" type="text">
                                    <p class="help-block">该权限的描述说明。</p>
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
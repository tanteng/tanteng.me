@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>编辑用户<small>Edit User</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">编辑用户</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="callout callout-success">
                            <h4>提示</h4>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑用户</h3>
                        </div>
                        <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">用户名</label>
                                    <input class="form-control" name="name" id="name" placeholder="用户名" value="{{ $user->name }}" type="text">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" name="email" id="email" placeholder="E-mail" value="{{ $user->email }}" type="text">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>用户角色</label>
                                    <div class="checkbox">
                                        @foreach($roles as $role)
                                            <label>
                                                <input type="checkbox" name="role[]" value="{{ $role->id }}" @if (in_array($role->id, $hasRoles)) checked @endif>
                                                {{ $role->display_name }}
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
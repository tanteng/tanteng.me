@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>修改配置<small>Edit Setting</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">修改配置</li>
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
                            <h3 class="box-title">修改配置</h3>
                        </div>
                        <form role="form" action="{{ route('settings.update', $setting->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                    <label for="displayName">设置项名称</label>
                                    <input class="form-control" name="display_name" id="displayName" placeholder="设置项名称" value="{{ $setting->display_name }}" type="text">
                                    @if ($errors->has('display_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                                    <label for="key">Key</label>
                                    <input class="form-control" name="key" id="key" placeholder="设置项Key" value="{{ $setting->key }}" type="text">
                                    @if ($errors->has('key'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('key') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                    <label for="value">Value</label>
                                    <input class="form-control" name="value" id="value" placeholder="设置项value" value="{{ $setting->value }}" type="text">
                                    @if ($errors->has('value'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('value') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                    <label for="order">排序</label>
                                    <input class="form-control" name="order" id="order" placeholder="排序按从小到大" value="{{ $setting->order }}" type="text">
                                    @if ($errors->has('order'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('order') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
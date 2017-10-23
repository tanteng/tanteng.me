@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>网站设置
                <small>Settings</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">网站设置</li>
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-7" style="margin-bottom: 30px;">
                    <form role="form" method="post" action="{{ route('settings.updateAll') }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @foreach($settings as $setting)
                        <div class="panel panel-default item-{{ $setting->id }}">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $setting->display_name }}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">Value</label>
                                    <input class="form-control" id="{{ $setting->key }}" name="key[{{ $setting->key }}]" value="{{ $setting->value }}" type="{{ $setting->type }}">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="{{ route('settings.edit', $setting->id) }}">编辑</a> |
                                <a href="javascript:;" class="text-danger delSetting" data-id="{{ $setting->id }}">删除</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加设置</h3>
                        </div>
                        <form role="form" method="post" action="{{ route('settings.store') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="displayName">名称</label>
                                    <input class="form-control" id="displayName" name="display_name" placeholder="请输入设置项名称" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="key">Key</label>
                                    <input class="form-control" id="key" name="key" placeholder="请填写设置项Key" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input class="form-control" id="value" name="value" placeholder="请填写设置项的值" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="order">排序</label>
                                    <input class="form-control" id="order" name="order" placeholder="排序从小到大" type="text">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        var fn = (function () {
            var _token = '{{ csrf_token() }}';
            var delSetting = function (id) {
                $.post('{{ url('admin/settings') }}/' + id, {'_token': _token, '_method': 'DELETE'}, function (data) {
                    if (data.result == 0) {
                        $(".item-" + id).fadeOut('normal', function () {
                            $(this).remove();
                        });
                    }
                }, 'json');
            };
            return {delSetting: delSetting};
        })();

        $(".delSetting").click(function () {
            if (confirm('确认操作吗?')) {
                fn.delSetting($(this).data('id'));
            }
        });
    </script>
@endsection

@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>我的简历<small>Edit Resume</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">我的简历</li>
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
                            <h3 class="box-title">我的简历</h3>
                        </div>
                        <form role="form" action="{{ route('resume.update', $resume->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug">标题</label>
                                    <input class="form-control" name="title" id="title" placeholder="请输入标题" value="{{ $resume->title }}" type="text">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="desc">简要描述</label>
                                    <textarea class="form-control" name="desc" id="desc" placeholder="请输入一段话简要描述" rows="3">{{ $resume->desc }}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content">简历内容</label>
                                    <textarea name="content" id="content">{{ $resume->content }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>简历状态</label>
                                    <div class="radio form-inline">
                                        <label>
                                            <input name="status" id="status1" value="1" @if ($resume->status == 1) checked="checked" @endif type="radio">
                                            正常
                                        </label>
                                    </div>
                                    <div class="radio form-inline">
                                        <label>
                                            <input name="status" id="status2" value="2" @if ($resume->status == 2) checked="checked" @endif type="radio">
                                            废弃
                                        </label>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('version') ? ' has-error' : '' }}">
                                    <label for="version">版本</label>
                                    <input class="form-control" name="version" id="version" placeholder="简历版本" value="{{ $resume->version }}" type="text" readonly>
                                    @if ($errors->has('version'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('version') }}</strong>
                                        </span>
                                    @endif
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

@section('js')
    <script>
        var formHasChanged = false;
        var submitted = false;

        $(document).on('change', 'input, select, textarea', function (e) {
            formHasChanged = true;
        });

        (function () {
            window.onbeforeunload = function (e) {
                if (formHasChanged && !submitted) {
                    var message = "You have not saved your changes.", e = e || window.event;
                    if (e) {
                        e.returnValue = message;
                    }
                    return message;
                }
            }
            $("form").submit(function() {
                submitted = true;
            });
        })(jQuery);

        tinymce.init({
            selector: '#content',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code link image',
        });
    </script>
@endsection

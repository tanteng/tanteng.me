@extends('admin.admin')
@section('main_content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>编辑游记<small>Edit Travel Notes</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">编辑游记</li>
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
                            <h3 class="box-title">编辑游记</h3>
                        </div>
                        <form role="form" action="{{ route('travel.update', $travel->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('destination_id') ? ' has-error' : '' }}">
                                    <label for="destination_id">目的地</label>
                                    <select class="form-control" name="destination_id" id="destination_id">
                                        @foreach($destinationList as $id=>$des)
                                            <option value="{{ $id }}" {{ $travel->destination_id == $id ? 'selected' : '' }}>{{ $des }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('destination_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('destination_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug">Slug</label>
                                    <input class="form-control" name="slug" id="slug" placeholder="slug" value="{{ $travel->slug }}" type="text">
                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="permissionName">标题</label>
                                    <input class="form-control" name="title" id="title" placeholder="标题" value="{{ $travel->title }}" type="text">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO标题</label>
                                    <input class="form-control" name="seo_title" id="seo_title" placeholder="SEO标题" value="{{ $travel->seo_title }}" type="text">
                                    @if ($errors->has('seo_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('seo_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">描述</label>
                                    <textarea class="form-control" rows="3" name="description" id="description">{{ $travel->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
                                    <label for="cover_image">封面图</label>
                                    <input class="form-control" name="cover_image" id="cover_image" placeholder="封面图" value="{{ $travel->cover_image }}" type="text">
                                    @if ($errors->has('cover_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('begin_date') ? ' has-error' : '' }}">
                                    <label for="begin_date">开始时间</label>
                                    <input class="form-control" name="begin_date" id="begin_date" placeholder="开始时间" value="{{ $travel->begin_date }}" type="text">
                                    @if ($errors->has('begin_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('begin_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                    <label for="end_date">结束时间</label>
                                    <input class="form-control" name="end_date" id="end_date" placeholder="结束时间" value="{{ $travel->end_date }}" type="text">
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content">游记内容</label>
                                    <textarea name="content" id="content">{{ $travel->content }}</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('score') ? ' has-error' : '' }}">
                                    <label for="score">评分</label>
                                    <input class="form-control" name="score" id="score" placeholder="评分" value="{{ $travel->score }}" type="text">
                                    @if ($errors->has('score'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('score') }}</strong>
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

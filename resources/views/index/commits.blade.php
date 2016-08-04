@extends('layouts.default')

@section('title', '更新版本历史记录 - tanteng.me')
@section('description', '网站代码托管于 Github 上，本地开发测试完 git push 提交到 Github，服务器端用 git pull 拉取，本页面通过 Github API 请求提交的版本历史记录并展示。')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-cloud-upload"></span> 版本<small>Commit</small></h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>网站代码托管于 Github 上，本地开发测试完<code>git push</code>提交到 Github，服务器端用<code>git pull</code>拉取，本页面通过 Github API 请求提交的版本历史记录并展示。</p>
                <p>Github:<a href="https://github.com/tanteng/tanteng.me">https://github.com/tanteng/tanteng.me</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="loading text-center">
                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="history">
                    <h2>版本提交历史：<small>（60分钟更新一次）</small></h2>
                    <ul class="commit-history">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var T = {
            ajaxSetup: function () {
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
            },
            getCommit: function () {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('git.history') }}',
                    dataType: 'json',
                    beforeSend: function () {
                        $('.history').hide();
                    }
                }).done(function (data) {
                    $('.loading').hide();
                    $('.history').show();
                    if (data.result == 0) {
                        $.each(data.data, function (index, item) {
                            $('.commit-history').append('<li>' + item.message + ' ' + item.datetime + '</li>');
                        })
                    } else {
                        $('.commit-history').append('<p class="text-center">' + item.message + '</p>"');
                    }
                })
            }
        };

        (function () {
            T.ajaxSetup();
            T.getCommit();
        })(jQuery)
    </script>
@endsection
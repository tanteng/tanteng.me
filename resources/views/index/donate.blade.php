@extends('layouts.default')

@section('title', '捐赠 - tanteng.me')
@section('description', '如果你喜欢本站，可以小额捐赠哦！')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-cloud-upload"></span> 捐赠 <small>Donate</small></h1>
        </div>

        <div class="row">
            <nav class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('donate') }}">捐赠</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>如果你喜欢本站，可以小额捐赠哦！</p>
                <p>Github:<a href="https://github.com/tanteng/tanteng.me">https://github.com/tanteng/tanteng.me</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#1yuan" aria-controls="1yuan" role="tab" data-toggle="tab">￥1</a></li>
                    <li role="presentation"><a href="#2yuan" aria-controls="2yuan" role="tab" data-toggle="tab">￥2</a></li>
                    <li role="presentation"><a href="#10yuan" aria-controls="10yuan" role="tab" data-toggle="tab">￥10</a></li>
                    <li role="presentation"><a href="#50yuan" aria-controls="50yuan" role="tab" data-toggle="tab">￥50</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="1yuan">
                        <div class="row">
                            <img src="{{ cdn('/dist/image/wechat-pay-1yuan.jpg') }}" class="img-responsive">
                        </div>
                        <div class="row">
                            <img src="{{ cdn('/dist/image/zhifubao-1yuan.jpg') }}" class="img-responsive">
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="2yuan">
                        <div class="row">
                            <img src="{{ cdn('/dist/image/wechat-pay-2yuan.jpg') }}">
                        </div>
                        <div class="row">
                            <img src="{{ cdn('/dist/image/zhifubao-2yuan.jpg') }}">
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="10yuan">
                        <div class="row">
                            <img src="{{ cdn('/dist/image/wechat-pay-10yuan.jpg') }}">
                        </div>
                        <div class="row">
                            <img src="{{ cdn('/dist/image/zhifubao-10yuan.jpg') }}">
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="50yuan">
                        <div class="row">
                            <img src="{{ cdn('/dist/image/wechat-pay-50yuan.jpg') }}">
                        </div>
                        <div class="row">
                            <img src="{{ cdn('/dist/image/zhifubao-50yuan.jpg') }}">
                        </div>
                    </div>
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
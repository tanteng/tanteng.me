@extends('layouts.admin')
@section('title')封面自我介绍设置@endsection

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">封面自我介绍</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">设置</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="POST" action="{{ url('/settings/cover') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="introduce">自我简介</label>
                                        <textarea rows="10" name="introduce" id="introduce" class="form-control">{{ $introduce }}</textarea>
                                    </div>
                                    <button class="btn btn-default" type="submit">更新</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@extends('layouts.default')

@section('title', $resume['title'].' - tanteng.me')
@section('description', $resume['desc'])
@section('content')
    <div class="container">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-file"></span> 简历
                <small>Resume</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! $resume['content'] !!}
            </div>
        </div>
    </div>
@endsection

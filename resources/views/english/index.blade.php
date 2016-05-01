@extends('layouts.english')

@section('title', '英文怎么说_英语_tanteng.me')
@section('description'){{ $seo['description'] }}@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('how-to-say.index') }}">英文怎么说</a></li>
        </ol>

        <div class="row" id="english">
            <div class="col-lg-12 col-md-12">
                <div class="list-group">
                    @foreach($latest as $list)
                        <a href="{{ route('how-to-say.detail', ['slug'=>$list->slug]) }}"
                           class="list-group-item">{{ $list->seo_title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

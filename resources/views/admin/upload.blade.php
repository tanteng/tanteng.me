@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @if(session('error'))
            <p class="text-warning">{{ session('error') }}</p>
        @endif
        <form method="post" action="{{ url('/admin/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="file">
            <input type="submit">
        </form>
    </div>
</div>
@endsection
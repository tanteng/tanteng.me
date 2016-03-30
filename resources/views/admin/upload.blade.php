@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <form method="post" action="{{ url('/admin/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="file">
            <input type="submit">
        </form>
    </div>
</div>
@endsection
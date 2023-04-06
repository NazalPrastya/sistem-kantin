@extends('user.layout.template')
@section('content')
<div class="container">
    <h1>{{ Auth::guard('user')->user()->name }}</h1>
</div>
@endsection
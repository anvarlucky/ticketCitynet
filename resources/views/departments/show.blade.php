
@extends('layouts')
@section('content')
<style type="text/css">
    .uper{
        margin-top: 60px;
    }
</style>
<div class="uper">
        @foreach($users as $user)
        <p>{{$user->name}}@if($user->role_id==2)-Началник отдела @else {{""}} @endif</p>
        @endforeach
</div>
@endsection
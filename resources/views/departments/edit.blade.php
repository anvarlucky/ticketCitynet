
@extends('layouts')
@section('content')
<div class="card upper">
        <div class="card-header my-5">
            Изменить Отдел
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{route('departments.update', $departments->id)}}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Отдел:</label>
                    <input type="text" class="form-control" name="name" value="{{$departments->name}}" />
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
@endsection
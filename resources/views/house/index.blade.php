
@extends('layouts')
@section('content')

<style type="text/css">
    .uper{
        margin-top: 60px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div><br/>
    @endif
<div class="container">
    @if(Auth::check())
            <h1>Все доступные заявки</h1>
                <table class ="table table-sm my-2">
                            <thead class="thead-dark">
            <tr>
                <td><b>№</b></td>
                <td><b>Номер заявки</b></td>
                <td><b>Задача</b></td>
                <td><b>Ответственный</b></td>
                <td><b>Статус</b></td>
                <td colspan="3"><b>Действия</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr @if($task->status_id==3) class="table-success" @endif @if($task->status_id==2) class="table-info" @endif>
                <td>{{($tasks->currentpage()-1) * $tasks->perpage() + $loop->index + 1}}</td>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->users()->pluck('name')->implode(', ')}}</td>
                <td>{{$task->status->type}}</td>
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.show',$task->id)}}" class="btn btn-warning"><i class="fas fa-show"></i>Показать</a></div></td>
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
                <td>
                    <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$task->title}}')">Удалить</button></div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

    </div>
</div>
{{$tasks->links()}}
 @endif
@endsection()
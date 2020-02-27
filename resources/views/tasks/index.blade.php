
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
    @if(Auth::check())
    @if(Auth::user()->role_id ==1)
        <a href="{{route('tasks.create')}}" class="col-md-12 btn btn-success ">Создать Тикет</a>
    @else

    <table class="table table-sm my-2">
		<thead class="thead-dark">
			<tr>
				<td><b>№</td>
                <td><b>Номер заявки</b></td>
				<td><b>Тема</b></td>
				<td><b>Объект</b></td>
				<!--
				<td>Контакты</td>
				-->
				<td><b>Дата создание</b></td>
				<!--<td>Ответсвенное лицо</td> -->
				<!--
				<td>Тип заявки</td>
				-->
				<td><b>Статус</b></td>
				<td><b>Приоритет</b></td>
				<td colspan="3"><b>Действия</b></td>
			</tr>
		</thead>
		<tbody>
		    <!--
            @if(Auth::user()->role_id ==1)
            @foreach($tasks as $task)
            <tr>

				<td>1</td>
				<td>{{$task->title}}</td>
				<td>2</td>

				<td>{{$task->created_at}}</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.show',$task->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>Показать</a></div></td>
				<td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
				<td>
					<form action="{{route('tasks.destroy', $task->id)}}" method="post">
						@csrf
						@method('DELETE')
						<div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$task->title}}?')">Удалить</button></div>
					</form>
				</td>
			</tr>
            @endforeach

            @else
            -->

			@foreach($anvars as $anvar)
			<tr>
                <td>{{($tasks->currentpage()-1) * $tasks->perpage() + $loop->index + 1}}</td>
                <td>{{$anvar->id}}</td>
				<td>{{$anvar->title}}</td>
				<td>{{$anvar->organization->name}}</td>
				<td>{{$anvar->created_at->format('d/m/Y H:i')}}</td>
				<td>{{$anvar->status->type}}</td>
				<td>{{$anvar->priority->type}}</td>
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.show',$anvar->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>Показать</a></div></td>
                @if(Auth::user()->role_id ==1)
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('tasks.edit',$anvar->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
				<td>
					<form action="{{route('tasks.destroy', $anvar->id)}}" method="post">
						@csrf
						@method('DELETE')
						<div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$anvar->title}}?')">Удалить</button></div>
					</form>
				</td>
                @endif
			</tr>
			@endforeach
		</tbody>
	</table>
    @endif
	<hr/>
</div>
@endif
@endif
@endsection

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
    <a href="{{route('users.create')}}" class="col-md-12 btn btn-success ">Добавить Пользователя</a>
	<!--
	<a href="{{'register'}}" class="btn btn-primary">Добавить Пользователь</a>
	-->
<table class="table table-sm my-2">
	<thead class="thead-dark"> 
		<tr>
			<td>№</td>
			<td>Имя</td>
			<td>E-mail</td>
			<td>Отдел</td>
            <td>Должность</td>
			<td colspan="2">Действия</td>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{($users->currentpage()-1) * $users->perpage() + $loop->index+1}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->department->name}}</td>
            <td>{{$user->role->name}}</td>
			<td><div class="btn-group btn-group-sm" role="group"><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Редактировать</a></div></td>
			<td><form action="{{route('users.destroy', $user->id)}}" method="post">
				@csrf
				@method('DELETE')
				<div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Удалить</button></div>
			</form></td>
		</tr>
		@endforeach
	</tbody>
	
</table>

{{$users->links()}}

@endsection
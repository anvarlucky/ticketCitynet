
@extends('layouts')
@section('content')
<style type="text/css">
	.uper{
		margin-top: 60px;
	}
</style>
<div class="uper">
	     <!--
            https://itsolutionstuff.com/post/implement-flash-message-with-laravel-57example.html
         -->
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{session()->get('success')}}
	</div><br/>
	@endif
        <a href="{{route('works.create')}}" class="col-md-12 btn btn-success">Добавить типы работ</a>
	<table class="table table-sm my-2" >
		<thead class="thead-dark">
			<tr>
				<td>№</td>
				<td>Тип работы</td>
				<td colspan="2">Действия</td>
			</tr>
		</thead>
		<tbody>
			<p></p>
			@foreach($works as $work)
			<tr>
				<td>{{($works->currentpage()-1) * $works->perpage() + $loop->index + 1}}</td>
				<td>{{$work->type}}</td>
				<td><div class="btn-group btn-group-sm" role="group"><a href="{{route('works.edit',$work->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
				<td>
					<form action="{{route('works.destroy', $work->id)}}" method="post">
						@csrf
						@method('DELETE')
						<div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$work->type}}')">Удалить</button></div>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
</table>
</div>
@endsection
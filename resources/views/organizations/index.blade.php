
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
    <a href="{{route('organizations.create')}}" class="col-md-12 btn btn-success">Добавить Организацию</a>
	<table class="table table-sm my-2" >
		<thead class="thead-dark">
			<tr>
				<td>№</td>
				<td>Организация</td>
				<td colspan="2">Действия</td>
			</tr>
		</thead>
		<tbody>
			<p></p>
			@foreach($organizations as $organization)
			<tr>
				<td>{{($organizations->currentpage()-1) * $organizations->perpage() + $loop->index + 1}}</td>
				<td>{{$organization->name}}</td>
				<td>
				    <div class="btn-group btn-group-sm" role="group"><a href="{{route('organizations.edit',$organization->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
				<td>
					<form action="{{route('organizations.destroy', $organization->id)}}" method="post">
						@csrf
						@method('DELETE')
						<div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$organization->name}}')">Удалить</button></div>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
</table>
</div>
		{{$organizations->links()}}
@endsection
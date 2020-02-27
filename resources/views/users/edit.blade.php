
@extends('layouts')
@section('content')
<div class="card upper">
		<div class="card-header my-5">
			Изменить
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
			<form method="post" action="{{route('users.update', $users->id)}}">
				<div class="form-group">
					@csrf
					@method('PATCH')
					<label for="user">Имя</label>
					<input type="text" class="form-control" name="name" value="{{$users->name}}" />
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" name="email" value="{{$users->email}}" />
				</div>
				<div class="form-group">
					<label for="username">Логин</label>
					<input type="text" class="form-control" name="username" value="{{$users->username}}" />
				</div>
                <div class="form-group">
					<label for="user_type">Тип</label>
					<input type="text" class="form-control" name="user_type" value="{{$users->user_type}}" />
				</div>

				<button type="submit" class="btn btn-primary">Сохранить</button>

			</form>

@endsection
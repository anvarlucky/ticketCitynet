
@extends('layouts')
@section('content')
<div class="card upper">
		<div class="card-header my-5">
			Изменить Тикет
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
			<form method="post" action="{{route('tasks.update', $tasks->id)}}">

            <div class="form-group">
					<label for="status">Статус:</label>
					<select name="is_active" class="form-control">
					<option value="1" @if($tasks->is_active == 1) selected = 'selected' @endif>Active</option>
                    <option value="0" @if($tasks->is_active == 0) selected = 'selected' @endif>Not Active</option>
                    </select>
				</div>
				<div class="form-group">
					@csrf
					@method('PATCH')
					<label for="name">Тема:</label>
					<input type="text" class="form-control" name="title" value="{{$tasks->title}}" />
				</div>
				<div class="form-group">
					<label for="description">Описание задачи:</label>
					<textarea class="form-control" name="description" >{{$tasks->description}}</textarea>
				</div>
				<div class="form-group">
					<label for="organization_id">Выберите объект:</label>
					<select name="organization_id" class="form-control">
					@foreach($organizations as $organization)
					<option value="{{$organization->id}}" @if($organization->id == $tasks->organization_id) selected = 'selected' @endif>{{$organization->name}}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="otvetstvenniy otdel">Выберите Отдел</label>
					@foreach($departments as $department)
					<input type="checkbox" name="departments[]" value="{{$department->id}}">{{$department->name}}
					@endforeach
				</div>
				<div class="form-group">
					<label for="otvetstvenniy">Выберите ответственного</label>
					@foreach($users as $user)
					<input type="checkbox" name="users[]" value="{{$user->id}}" @if($user->id==2) checked @endif>{{$user->name}}
					@endforeach
				</div>

				<div class="form-group">
					<label for="contacts">Контакты заявителя(Ф.И.О-Тел №):</label>
					<textarea class="form-control" name="contacts">
						{{$tasks->contacts}}
					</textarea>
				</div>
				<div class="form-group">
					<label for="type_ticket">Выберите тип работ:</label>
					<select name="work_id" class="form-control">
					@foreach($works as $work)
					<option value="{{$work->id}}" @if($work->id == $tasks->work_id) selected='selected' @endif>{{$work->type}}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="priority">Выберите приоритет:</label>
					<select name="priority_id" class="form-control">
					@foreach($priorities as $priority)
					<option value="{{$priority->id}}" @if($priority->id==$tasks->priority_id) selected='selected' @endif>{{$priority->type}}</option>
					@endforeach
					</select>
				</div>				
				<div class="form-group">
					<label for="status">Выберите status:</label>
					<select name="status_id" class="form-control">
					@foreach($statuses as $status)
					<option value="{{$status->id}}"@if($status->id==$tasks->status_id) selected='selected' @endif>{{$status->type}}</option>
					@endforeach
					</select>
				</div>
                <div class="form-group">
					<label for="data">Дедлайн:</label>
					<input type="date" name="deadline" class="form-control" value="{{$tasks->deadline}}">
		        </div>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form>
@endsection
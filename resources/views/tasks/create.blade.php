
@extends('layouts')
@section('content')

	<div class="card upper">
		<div class="card-header my-5">
			Добавить Тикет
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
			<form method="post" action="{{route('tasks.store')}}">
				<div class="form-group">
					@csrf
					<label for="title">Тема:</label>
					<input type="text" class="form-control" name="title"/>
				</div>
				<div class="form-group">
					<label for="description">Описание задачи:</label>
					<textarea class="form-control" name="description" rows="5" placeholder="Пожалуйста, напишите примечание клиента"></textarea>
				</div>
				<div class="form-group">
					<label for="organization_id">Выберите объект:</label>
					<select name="organization_id" class="form-control">
					@foreach($organizations as $organization)
					<option value="{{$organization->id}}">{{$organization->name}}</option>
					@endforeach
					</select>
				</div>
                {{--
          		<div class="form-group">
					<label for="department_id">Выберите отдел:</label>
					<select name="department_id" class="form-control">
					@foreach($departments as $department)
					<option value="{{$department->id}}">{{$department->name}}</option>
					@endforeach
					</select>
				</div>
                --}}
				<div class="form-group">
					<label for="otdel">Выберите отдел:</label>
				<select name="departments[]" class="form-control">
					@foreach($departments as $department)
						<option value="{{$department->id}}">{{$department->name}}</option>
					@endforeach
				</select>
				</div>

				<div class="form-group">
					<label for="otdel">Выберите ответственного началника:</label>
					<select name="users[]" class="form-control">
						@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
						@endforeach
					</select>
				</div>
{{--       		<div class="form-group">
			<label for="otdel">Выберите отдел:</label>

			@foreach($departments as $department)
			<input type="checkbox" name="departments[]" value="{{$department->id}}">{{$department->name}}
			@endforeach

		    </div>--}}
            {{--
				<div class="form-group">
					<label for="user_id">Выберите ответсвенного началника:</label>
					<select name="user_id" class="form-control">
					@foreach($users as $user)
					<option value="{{$user->id}}">{{$user->name}}{{-$user->department_id}}</option>
					@endforeach
					</select>
				</div>
            --}}
{{--            <div class="form-group">
			<label for="otdel">Выберите ответственного началника:</label>
			@foreach($users as $user)
			<input type="checkbox" name="users[]" value="{{$user->id}}">{{$user->name}}-<b>{{$user->department->name}}</b>
			@endforeach
		    </div>--}}
				<h1></h1>

				<div class="form-group">
					<label for="contacts">Контакты заявителя(Ф.И.О-Тел №):</label>
					<textarea class="form-control" name="contacts" placeholder="Контакты"></textarea>
				</div>
				<div class="form-group">
					<label for="type_ticket">Выберите тип работ:</label>
					<select name="work_id" class="form-control">
					@foreach($works as $work)
					<option value="{{$work->id}}">{{$work->type}}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="priority">Выберите приоритет:</label>
					<select name="priority_id" class="form-control">
					@foreach($priorities as $priority)
					<option value="{{$priority->id}}">{{$priority->type}}</option>
					@endforeach
					</select>
				</div>				
				<div class="form-group">
					<label for="status">Выберите status:</label>
					<select name="status_id" class="form-control">
					@foreach($statuses as $status)
					<option value="{{$status->id}}">{{$status->type}}</option>
					@endforeach
					</select>
				</div>
                <div class="form-group">
					<label for="data">Дедлайн:</label>
					<input type="date" name="deadline" value="<?php echo date('Y-m-d') ?>" class="form-control">
		        </div>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</form>
		</div>
	</div>
	@endsection
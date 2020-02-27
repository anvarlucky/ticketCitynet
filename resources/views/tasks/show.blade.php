
@extends('layouts')
@section('content')
<hr class="my-5">
   	@if(session()->get('success'))
	<div class="alert alert-success">
		{{session()->get('success')}}
	</div><br/>
	@endif
    <h2>{{ucfirst($tasks->title)}}</h2>
    <p>{{$tasks->description}}</p>
    <p><b>Создан : </b>{{$tasks->created_at->format('d/m/Y H:i')}} <b>Контакт Заявителя : </b>{{$tasks->contacts}}</p>
    <p><b>Срок выполнения : </b>{{Carbon\Carbon::parse($tasks->deadline)->format('d/m/Y')}}</p>  
    <p><b>Обьект : </b>{{$tasks->organization->name}}</p>
    <p><b>Статус : </b>{{$tasks->status->type}}</p>
    <p><b>Ответсвенный : </b>@foreach($tasks2 as $task2){{$task2->users()->pluck('name')->implode(', ')}} @endforeach</p>
    <p><b>Отдел : </b>@foreach($tasks2 as $task2){{$task2->departments()->pluck('name')->implode(', ')}} @endforeach</p>
    @if($user_auth->role_id==2)
    <form method="post" action="{{route('tasks.update', $tasks->id)}}">
    	<div class="form-group">
    		@csrf
    		@method('PATCH')
            <input type="hidden" name="title" value="{{$tasks->title}}" />
            <input type="hidden" name="description" value="{{$tasks->description}}" />
            <input type="hidden" name="contacts" value="{{$tasks->contacts}}" />
            <input type="hidden" name="organization_id" value="{{$tasks->organization_id}}" />
            <input type="hidden" name="departments[]" value="{{$tasks->department_id}}" />
            <input type="hidden" name="work_id" value="{{$tasks->work_id}}" />
            <input type="hidden" name="priority_id" value="{{$tasks->priority_id}}" />
			<label for="status">Статус:</label>
			<select class="form-control" name="status_id">
				@foreach($statuses as $status)
				<option value="{{$status->id}}" @if($status->id == $tasks->status_id) selected = 'selected' @endif">{{$status->type}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="otvetstvenniy">Выберите Ответсвенный</label>
			@foreach($users as $user)
			<input type="checkbox" name="users[]" value="{{$user->id}}" @if($user->role_id==2)checked @endif>{{$user->name}}
			@endforeach
		</div>
		<button type="submit" class="btn btn-danger">Редирект</button>
    </form>
    <form method="post" action = "{{route('comments.store')}}">
    	<div class="form-group">
			@csrf
			 <input type="hidden" name="task_id" value="{{$tasks->id}}" />
             <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />

			<label for="comments">Комментария задачи:</label>
			<textarea class="form-control" name="content" rows="5"></textarea>
		</div>

		<button type="submit" class="btn btn-success">Отправить</button>
    </form>
 @elseif($user_auth->role_id==1 or $user_auth->role_id==3)
    <form method="post" action = "{{route('comments.store')}}">
    	<div class="form-group">
			@csrf
			 <input type="hidden" name="task_id" value="{{$tasks->id}}" />
             <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />

			<label for="comments">Комментария задачи:</label>
			<textarea class="form-control" name="content" rows="5"></textarea>
		</div>

		<button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endif
<hr/>    
    @foreach($comments as $comment)
    <p><b>Закомментировал : </b>{{$comment->user->name}} | {{$comment->created_at->format('d/m/Y H:i')}}</p>
    <p>{{$comment->content}}</p>
    <p></p>
    @endforeach
<hr/>    
@endsection
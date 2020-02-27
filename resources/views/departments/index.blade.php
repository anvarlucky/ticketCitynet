
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
    <a href="{{route('departments.create')}}" class="col-md-12 btn btn-success">Добавить отдел</a>
    <table class="table table-sm my-2" >
        <thead class="thead-dark">
            <tr>
                <td>№</td>
                <td>Отделы</td>
                <td>Количество</td>
                <td colspan="3">Действия</td>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <!--
            <p>{{$department->id}}/{{$department->tasks()->pluck('title')->implode(', ')}}</p>    -->

            <tr>
                <td>{{($departments->currentpage()-1) * $departments->perpage() + $loop->index+1}}</td>
                <td>{{$department->name}}</td>
                <td>{{$users->where('department_id','=', $department->id)->count()}}</td>

                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('departments.show',$department->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i>Показать</a></div></td>
                <td><div class="btn-group btn-group-sm" role="group"><a href="{{route('departments.edit',$department->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Редактировать</a></div></td>
                <td>
                    <form action="{{route('departments.destroy', $department->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete {{$department->name}}')">Удалить</button></div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
@endsection
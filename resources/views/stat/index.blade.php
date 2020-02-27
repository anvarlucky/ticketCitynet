
@extends('layouts')
@section('content')
 <style type="text/css">
    .uper{
        margin-top: 70px;
    }
</style>
<div class="uper">
<div class="container">
<p><b>Открытие Тикеты : </b>{{$tasks->where('status_id',1)->count()}}</p>
<p><b>Тикеты в процессе : </b>{{$tasks->where('status_id',2)->count()}}</p>
<p><b>Закрытие Тикеты : </b>{{$tasks->where('status_id',3)->count()}}</p>
</div>
</div>
@endsection


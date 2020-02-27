<!DOCTYPE html>
<html>
<head>
	<title>CITYNET</title>

	    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/ticket.css')}}">
   {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/">CITYNET</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    @if (Auth::check())
    @if (Auth::user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link" href="/">Главная <!-- <span class="sr-only">(current)</span>--></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="/organizations">Организация</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/works">Типы работ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/departments">Отделы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">Пользователи</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/stat">Статистика</a>
      </li>
      @endif
        <li class="nav-item">
        <a class="nav-link" href="/tasks">Тикет</a>
        </li>
        @endif
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Справочники</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    -->
      @guest
      <li class="nav-item">
      	<a class="nav-link" href="{{ route('login') }}">{{ __('Логин') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
      	<a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
       </li>
        @endif
        @else
       <li class="nav-item dropdown">
       		<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                <span class="caret"></span>
            </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        </li>
        @endguest
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
		@yield('content')
	<script src="{{ asset('vendor/jquery/jquery.js') }}" type="text/js"></script>
</div>
</body>
</html>
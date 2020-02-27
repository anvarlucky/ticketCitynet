<!DOCTYPE html>
<html>
<head>
    <title>Task</title>
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Обьекты</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Пользователи</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="tasks">Тикет</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Справочники</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
<div class="row-full"><a href="?mod=addnewtiket" class="btn btn-info" role="button">Создать тикет</a><br><br><h2>Существующие тикеты</h2><table class="table table-bordered table-sm"><thead><tr><td>ID тикета</td><td>Тема</td><td>Описание</td><td>Объект</td><td>Контакты</td><td>Дата создание</td><td>Ответсвенное лицо</td><td>Тип заявки</td><td>Статус</td><td>Приоритет</td><td>Действия</td></tr></thead><tbody><tr>
                <td>1</td>
                <td>Проект Дом 2 видеонаблюдение</td>
                <td></td>
                <td>Урикзор теплица</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>В процессе</td>
                <td>Средний</td>
                <td><a href="?mod=edit&amp;id=1"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=1" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr><tr>
                <td>4</td>
                <td>Строительство и запуск всех слаботочных систем в объекте Октепа дома шоурум</td>
                <td></td>
                <td>Ашхабад парк</td>
                <td>Абдулазиз Камилов, тел.: +998990009900 </td>
                <td></td>
                <td></td>
                <td></td>
                <td>Открыто</td>
                <td>Высокий</td>
                <td><a href="?mod=edit&amp;id=4"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=4" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr><tr>
                <td>7</td>
                <td>dsadsad</td>
                <td>saddasdsad</td>
                <td>Джами 1</td>
                <td>3333445</td>
                <td>2019-04-08 00:00:00</td>
                <td>Шамукимов Нуриддин Нуруллаевич</td>
                <td>Профилактика</td>
                <td>Открыто</td>
                <td>Низкий</td>
                <td><a href="?mod=edit&amp;id=7"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=7" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr><tr>
                <td>8</td>
                <td>dsadasd</td>
                <td>sadsadasd</td>
                <td>KFC Ганга</td>
                <td>dsadasd</td>
                <td>2019-04-07 02:02:00</td>
                <td>Безбабнов Тимофей Александрович</td>
                <td>Демонтаж</td>
                <td>Открыто</td>
                <td>Средний</td>
                <td><a href="?mod=edit&amp;id=8"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=8" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr><tr>
                <td>9</td>
                <td>sadsad</td>
                <td></td>
                <td>Беруний Akfa Medline </td>
                <td>saddsad</td>
                <td>2019-04-08 21:37:50</td>
                <td>admin (Тест ўчирманг)</td>
                <td>Ремонт</td>
                <td>Открыто</td>
                <td>Низкий</td>
                <td><a href="?mod=edit&amp;id=9"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=9" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr><tr>
                <td>10</td>
                <td>asdsad</td>
                <td>sadasd</td>
                <td>Беруний Akfa Medline </td>
                <td>sadsads</td>
                <td>2019-04-08 21:37:59</td>
                <td>Насрулаев Баходир Эргашевич</td>
                <td>Ремонт</td>
                <td>Открыто</td>
                <td>Низкий</td>
                <td><a href="?mod=edit&amp;id=10"><i class="fas fa-edit"></i></a> <a href="?mod=delete&amp;id=10" onclick="return confirm('Точно удалить?');"><i class="fas fa-trash"></i></a></td>
              </tr></tbody></table></div>        </div>
    </div>
</div>
<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
</html>
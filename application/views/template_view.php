<!DOCTYPE html>
<html lang="ru">
<head>
	<link rel="icon" type="image/png" href="/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<!--<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>Приложение</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	  <li class="nav-item">
        <a class="nav-link" href="/">Список пользователей</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/register">Регистрация</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="/login">Авторизация</a>
      </li>
	  <?php if (isset($data['is_login']) && $data['is_login'] == true) {?>
	  <li class="nav-item">
        <a class="nav-link" href="/logout">Выйти</a>
      </li>
	  <?php }?>
    </ul>
  </div>
</nav>
	<div class="container">
		<?php include 'application/views/'.$content_view; ?>
	</div>
</body>
</html>
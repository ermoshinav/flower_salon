<?
/**
  * Страница авторизации пользователей. Предполагается, 
  * что в вашей базе данных присутствует таблица users,
  * в которой существуют поля id, login и password
  */
// Подлючаем файл с пользовательскими функциями
require_once('functions.php');
// Заранее инициализируем переменную авторизации, присвоив ей ложное значение
$auth = false;
// Если была нажата кнопка авторизации
if(isset($_POST['submit'])) {
	// Делаем массив сообщений об ошибках пустым
	$errors['login'] = $errors['password'] = $errors['password_again'] = '';
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	// Авторизуем пользователя
	// Вызываем функцию регистрации, её результат записываем в переменную
	$auth = authorization_admin($login, $password);
	// Если авторизация прошла успешно, сообщаем об этом пользователю
	// И создаем заголовок страницы, который выполнит переадресацию на защищенную
	// от общего доступа страницу
	if($auth === true) {
		$ref=$_SERVER['QUERY_STRING'];
 if ($ref!='') $ref='?'.$ref;
 header('HTTP/1.1 301 Moved Permanently');
 header('Location:admin_k.php '.$ref);
 exit();
	}
	// Иначе сообщаем пользователю об ошибке
	else {
		$errors['full_error'] = $auth;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Авторизация контент-менеджера</title>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="world of flowers, flowers, bootstrap web" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->
</head>
<body>
<!--header-->
<div class="header">
<div class="container">
		<div class="head">
			<div class=" logo">
			<img src="images/7.png" </a>	 
			</div>
		</div>
	</div>
            <div class="header-top">
            <div class="col-md-2">
            </div>
	<div class="col-sm-9 col-md-offset-2  header-login">
	<ul>
						<li><a href="index.php">Войти</a></li>
						
					</ul></div> 
				<div class="clearfix"> </div>
		</div>
		</div>
		<br></br>
<div class="banner-top">
	<div class="container">
		<h1>Авторизация контент-менеджера</h1>
		<em></em>
	</div>
</div>
	<script>
		window.onload = function() {
			document.getElementById('login').ontextInput = function() {
				alert(this.data);
			},
			focus = function() {
				alert("ok");
			}
			;
		};
	</script>
</head>
<body>
<div class="container">

<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">

<?
// Если запущен процесс авторизации, но она не была успешной,
// или же авторизация еще не запущена, отображаем форму авторизации
if($auth !== true) {
?>
	<!-- Блок для вывода сообщений об ошибках -->
	<div id="full_error" class="error" style="display:
	<?
	echo $errors['full_error'] ? 'inline-block' : 'none';
	?>
	;">
	<?
	// Выводим сообщение об ошибке, если оно есть
	echo $errors['full_error'] ? $errors['full_error'] : '';
	?>
	</div>
	<br></br>
	<form action="" method="post">
	
	<br></br>
		<div class="row">
			<label for="login">Ваш логин:</label>
			<input type="text" class="form-control" name="login" id="login" />
		</div> <br></br>
		<div class="row">
			<label for="password">Ваш пароль:</label>
			<input type="password" class="form-control" name="password" id="password" />
		</div><br></br>
		<div class="row">
			<input type="submit" name="submit"  class="btn btn-success" id="btn-submit" value="Авторизоваться" />
		</div><br></br>
	</form>
	</div><br></br>
    <div class="col-md-2">
</div>
	</div>
    </div>
    <br></br><br></br>  <br></br>  <br></br>  <br></br>
<?
}	// Закрывающая фигурная скобка условного оператора проверки успешной авторизации
// Иначе выводим сообщение об успешной авторизации
else {
	print $message;
}
/**
  * Если всё правильно, будет выведено сообщение об успешной авторизации,
  * пользователь будет переадресован на защищенную страницу
  */
?>
</body>
</html>
<?require_once 'include/footer.php';?>
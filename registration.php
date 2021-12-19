<?
/**
  * registration.php
  * Страница регистрации пользователей. Предполагается, что в вашей
  * базе данных присутствует таблица пользователей users, в которой
  * есть поля id, login, password, reg_date
  */
  
// Подключаем файл с пользовательскими функциями
require_once('functions.php');

// Инициализируем переменные для введенных значений и возможных ошибок
$errors = array();
$fields = array();

// Заранее инициализируем переменную регистрации, присваивая ей ложное значение
$reg = false;

// Если была нажата кнопка регистрации
if(isset($_POST['submit'])) {
	// Делаем массив сообщений об ошибках пустым
	$errors['login'] = $errors['password'] = $errors['password_again'] = '';
	
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	$fields['login'] = trim($_POST['login']);
	$password = trim($_POST['password']);
	$password_again = trim($_POST['password_again']);
	
	// Если логин не пройдет проверку, будет сообщение об ошибке
	$errors['login'] = checkLogin($fields['login']) === true ? '' : checkLogin($fields['login']);
	
	// Если пароль не пройдет проверку, будет сообщение об ошибке
	$errors['password'] = checkPassword($password) === true ? '' : checkPassword($password);
	
	// Если пароль введен верно, но пароли не идентичны, будет сообщение об ошибке
	$errors['password_again'] = (checkPassword($password) === true && $password === $password_again) ? '' : 'Введенные пароли не совпадают';
	
	// Если ошибок нет, нам нужно добавить информацию о пользователе в БД
	if($errors['login'] == '' && $errors['password'] == '' && $errors['password_again'] == '') {
		// Вызываем функцию регистрации, её результат записываем в переменную
		$reg = registration($fields['login'], $password);
		
		// Если регистрация прошла успешно, сообщаем об этом пользователю
		// И создаем заголовок страницы, который выполнит переадресацию к форме авторизации
		if($reg === true) {
	$message = '<p>Вы успешно зарегистрировались в системе. Сейчас вы будете переадресованы к странице авторизации. Если это не произошло, перейдите на неё по <a href="login.php">прямой&nbsp;ссылке</a>.</p>';
			header('Refresh: 5; URL = login.php');
		}
		// Иначе сообщаем пользователю об ошибке
		else {
			$errors['full_error'] = $reg;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Регистрация пользователей</title>
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
			 <a href="index.html"><img src="images/7.png" </a>	 
			</div>
		</div>
	</div>
            <div class="header-top">
            <div class="col-md-2">
            </div>
	<div class="col-sm-9 col-md-offset-2  header-login">
	<ul>
						<li><a href="login.php">Войти</a></li>
						<li><a href="registration.php">Регистрация</a></li>
					</ul></div> 
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top">
		 <div class="col-sm-12 col-md-offset-2 h_menu4">
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
            <li><a class="color" href="index.php">Главная</a></li>
			<li><a href="bukets1.php">Букеты</a></li>
			<li><a  href="uslygi.php">Услуги</a></li>
			<li><a  href="dostavka.php">Доставка/Оплата</a></li>
			<li><a  href="otzivi.php">Отзывы</a><li>
			 <li ><a  href="contact.php">Контакты</a></li> 
        </ul>
     </div><!-- /.navbar-collapse -->
</nav>
			</div>
			
			<div class="clearfix"></div>
			
	</div>	
</div>
	<div class="banner-top">
	<div class="container">
		<h1>Регистрация</h1>
		<em></em>
	</div>
</div>
	
	<div class="container">
   <div class="col-md-2">
</div>
<div class="col-md-8">
<?
// Показываем форму только если пользователь еще не запустил процесс регистрации, 
// и если регистрация не была успешной
if($reg !== true) {
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
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<h1 align="center"><strong>Регистрация пользователя</h1></strong>
	<br></br>
		<div class="row">
			<label for="login">Укажите ваш логин:</label>
			<input type="text" class="form-control" name="login" id="login" value="<?=$fields['login'];?>" />
			<div class="error" id="login-error"><?=$errors['login'];?></div>
			<div class="instruction" id="login-instruction">В имени пользователя могут быть только символы латинского алфавита, цифры, символы '_', '-', '.'. Длина имени пользователя должна быть не короче 4 символов и не длиннее 16 символов</div>
		</div><br></br>
		<div class="row">
			<label for="password">Напишите ваш пароль:</label>
			<input type="password" class="form-control" name="password" id="password" value="" />
			<div class="error" id="password-error"><?=$errors['password'];?></div>
			<div class="instruction" id="password-instruction">В пароле вы можете использовать только символы латинского алфавита, цифры, символы '_', '!', '(', ')'. Пароль должен быть не короче 6 символов и не длиннее 16 символов</div>
		</div><br></br>
		<div class="row">
			<label for="password_again">Повторите введенный пароль:</label>
			<input type="password" class="form-control" name="password_again" id="password_again" value="" />
			<div class="error" id="password_again-error"><?=$errors['password_again'];?></div>
			<div class="instruction" id="password_again-instruction">Повторите введенный ранее пароль</div>
		</div><br></br>
		<div class="row">
			<!-- Кнопка отправки данных формы -->
			<input type="submit" name="submit" class="btn btn-success" id="btn-submit" value="Зарегистрироваться" />
			
			<!-- Кнопка сброса полей формы к исходному состоянию -->
			<input type="reset" name="reset" id="btn-reset"  class="btn btn-secondary" value="Очистить" /><br></br></br></br></br>
		</div>
		
	</form>
	</div>
     <div class="col-md-2">
</div>
	</div>
    </div>
<?
}	// закрывающая фигурная скобка условия проверки запущенного процесса регистрации
// Если регистрация прошла успешно, сообщаем об этом
else {
	print $message;
}
/**
  * Если всё пройдет как положено, вы сможете попробовать 
  * зарегистрировать такого же точно пользователя. Скрипт 
  * должен будет сообщить об ошибке
  */
?>
</body>
</html>
<?require_once 'include/footer.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Салон "Мир цветов"</title>
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
<link href="css/jqcart.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jqcart.js"></script>
<script>
$(function(){
	'use strict';	
	// инициализация плагина
	$.jqCart({
			buttons: '.add_item',
			cartLabel: '.label-place',
			visibleLabel: true,
			openByAdding: false,
	});	
	// Пример с дополнительными методами
	$('#open').click(function(){
		$.jqCart('openCart'); // открыть корзину
	});
	$('#clear').click(function(){
		$.jqCart('clearCart'); // очистить корзину
	});	
});
</script>
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
    <nav class="navbar nav_bottom" role="navigation">
 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   </div> 
   <!-- Collect the nav links, forms, and other content for toggling -->
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
</nav><!-- /.navbar-collapse -->
            <!--cart box_1 -->
						<div class="cart box_1">
						<a id="open">	<img src="images/cart.png" alt=""/></a>
						<p><a id="clear" class="simpleCart_empty">Очистить</a></p>
</div>					
	</div><!-- h_menu4 -->		
			<div class="clearfix"></div>
	</div>	
</div>
<?
// Подключаем файл с пользовательскими функциями
require_once('functions.php');
 connect(); 
  ?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Цветочная витрина</h1>
		<em></em>
	</div>
</div>
	<!--content-->
			<div class="product">
			<div class="container">
					<div class="row">
			<div class="col-md-12">
<p > <center> Жизнь состоит из череды событий,&nbsp;сменяющих друг друга. И для наиболее важных и запоминающихся нужен свой акцент - букет цветов!&nbsp;</center></p>
<p><center>В зависимости от специфики события в нашем портфолио имеется широкий выбор букетов для&nbsp; торжеств, начиная от букета для любимого актера, до букета невесты!</center></p>
<p><center> Вашему желанию наши флористы сотворят букет на заказ, выполненный исключительно по Вашим пожеланиям.</center></p>
<p><br></p>
</div></div>
<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12">
			<?php
         $count = 8;//Кол-во материалов на странице
         
$p = isset($_GET["p"]) ? (int) $_GET["p"] : 0;
// Узнаем количество всех доступных записей
// Если значение page= не является числом, то показываем
// пользователю первую страницу
if(!is_numeric($p)) $p=1; 	
  $result=mysql_query("SELECT * FROM bukets") or die("Ошибка выборки букетов"); 
$num = mysql_num_rows($result);
// Вычисляем количество страниц, чтобы знать сколько ссылок выводить
$len =  $num/ $count;//floor-функция для округления в меньшую сторону
// Здесь мы увеличиваем число страниц на единицу чтобы начальное значение было
// равно единице, а не нулю. Значение = будет
// совпадать с цифрой в ссылке, которую будут видеть посетители

 $len++; //увеличиваем количество страниц на 1 
if ($p>$p) $p = 1;// Если значение page= больше числа страниц, то выводим первую страницу
if (!isset($list)) $list=0; // Переменная $list указывает с какой записи начинать выводить данные.
// Чтобы у нас значение p= в адресе ссылки совпадало с номером
// страницы мы будем его увеличивать на единицу при выводе ссылок, а
// здесь наоборот уменьшаем чтобы ничего не нарушить.
$list=--$p*$count;
// Делаем запрос подставляя значения переменных $count и $list
$result = mysql_query("SELECT * FROM bukets  LIMIT $count OFFSET $list");
// Считаем количество полученных записей
$num_result = mysql_num_rows($result);
// Выводим все записи текущей страницы
for ($i = 0; $i<$num_result; $i++){
    $row=mysql_fetch_array($result);
  ?>	
					<div class="col-md-3">
					<div class=" mid-pop">
					<div class="pro-img">
						<img src="<?echo $row['img'];?>" class="img-responsive"   alt=" ">
						<div class="zoom-icon ">
						<a class="picture" href="<?echo $row["img"];?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
						</div>
						</div>
						<div class="clearfix"></div>
						<div class="mid-1">
						<div class="women">
						<div class="women-top">
							<h6> <?echo $row["name_buket"];?></h6>
							</div>	
							<div class="img item_add">
 <button class="add_item" data-id="<?echo $row["id_buket"];?>" data-title="<?echo $row["name_buket"];?>" data-price="<?echo $row["price"];?>" data-img="<?echo $row["img"];?>">В корзину</button>
							</div>
							</div><div class="clearfix"></div>
							<div class="mid-1">
								<p><em class="item_price"><?echo $row["price"].'руб';?></em></p>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>    <!--pop-->
					</div> <?}?>   <!--Item-->
					</div><!--col-md-12-->
	<? 				
?>
	<nav>
  <ul class  ="pagination" >
  <? for($i = 1; $i <=$len; $i++){ ?>
    <li><a href="?p=<?= $i ?>"><?= $i ?> </a></li>
  <? } ?>
  </ul>
</nav>
				</div>
				</div>
				</div>
	</body>
	</html>
<?
include ('include/footer.php');?> 
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
			<li><a href="bukets.php">Букеты</a></li>
			<li><a  href="uslygi.php">Услуги</a></li>
			<li><a  href="dostavka.php">Доставка/Оплата</a></li>
			<li><a  href="otzivi.php">Отзывы</a><li>
			 <li ><a  href="contact.php">Контакты</a></li> 
        </ul>
             </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar-collapse -->
</nav>
			</div>
            <!--cart box_1 -->
			<div class="clearfix"></div>
	</div>	
</div>
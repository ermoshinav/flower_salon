<?include ('include/header.php');
// Подключаем файл с пользовательскими функциями
require_once('functions.php');
connect();
 $sql="SELECT * from uslugi";
  $result1=mysql_query($sql) or die("Ошибка выборки услуг"); 
        ?>
		<div class="banner-top">
	<div class="container">
		<h1>Услуги</h1>
		<em></em>
	</div>
</div>
	<!--content-->
			<div class="container">
					<div class="row">
			<div class="col-md-12">		
			 <hr> </hr>
			<p>Всем, кто заинтересован во флористических услугах профессионального уровня, салон "Мир цветов" предлагает необходимый «набор услуг». У нас можно заказать услуги флориста на свадьбу, а также оформление торжеств, помещений, наряду с сопутствующими услугами доставки цветов. Что бы Вам не потребовалось, Вы можете рассчитывать на профессионализм наших сотрудников, ответственность службы доставки, улыбчивость и умение работать с людьми. Услуги  салон "Мир цветов"– это возможность сделать жизнь своих родных и близких ярче, а торжество – ещё более незабываемым!</p><br><br>
           <? while($row=mysql_fetch_array($result1))
{?>
	   <div class="content__text mt-2">
        <div class="page-image page-image--right"><img src="<?echo $row["img"];?>" alt="Доставка цветов и букетов" class="img-responsive" width = "180px" height = "180px">
        </div>
        <h3 class="title title--xs title--page mt-0"><?echo $row["name"];?></h3>
        <p><?echo $row["descr"];?> </p>
       
      </div><?}?> 
	  <hr> </hr>
	        
      </div>
	   </div> 
	 </div>
<?
include ('include/footer.php');?>
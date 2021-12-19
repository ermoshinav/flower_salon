<?include ('include/header.php');?>
        <div class="banner-top">
	<div class="container">
		<h1>Отзывы</h1>
		<em></em>
	</div>
</div>
<br>
<div class="container">
   <div class="col-md-2">
</div>
<div class="col-md-8">
    <h2 align="center">Написать отзыв</h2>
    <div class="review-form" id="review-form">
        <form id="review-add-form" method="post" enctype="multipart/form-data">
            <div class="review-form-fields">
                                                <div class="provider-fields">
												<div class="form-group">
                        <label class="control-label">Дата</label>
                        <input class="form-control" type="date" name="date" id="review-name" value="">
                                            </div>
                    <div class="form-group">
                        <label class="control-label">Ваше имя</label>
                        <input class="form-control" type="text" name="fio" id="review-name" value="">
                                            </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="text" name="email" id="review-email" value="">
                                            </div>
                                    </div>
                                                <div class="form-group">
                    <label class="control-label" for="review-text">Отзыв</label>
                    <textarea id="review-text" class="form-control" name="text" rows="10" cols="45"></textarea>
                </div>
                                        <input type="submit" class="button button--primary" value="Добавить отзыв">
                    <span class="review-add-form-status ajax-status" style="display: none;">
                        <i class="icon16 loading"><!--icon --></i>
                    </span>
                </div>
                            </div>
        </form><hr></hr>
        <div class="col-md-2">
</div>
		</div>
		</div>
        <?
        // Подключаем файл с пользовательскими функциями
require_once('functions.php');
 connect(); 
 $date=$_POST['date'];
$fio=$_POST['fio'];
$email=$_POST['email'];
$text=$_POST['text']; 
  if ($_POST) {
$result=mysql_query("insert into otzivi(date,fio,email,text) 
value('$date','$fio','$email','$text')")  or die("Ошибка добавления ");
}
/* $row['post_data'] -> format("Y-m-d"); */
 $result="select DATE_FORMAT(date,'%d.%m.%Y') AS date,fio, email,text from otzivi";  //-date_format-функция вывода даты в  нужном формате
 $result1=mysql_query($result) or die("Ошибка выборки отзывов");    
while($row=mysql_fetch_array($result1))
{  
        ?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
           <ul class="menu-v with-icons reviews-branch">
                            <li class="reviews-list__item">
        <p><b><?print $row["fio"];?></b></p>
		  <p><em><?print $row['date'];?></em></p>
		  <p><em><?print $row["text"];?></em></p>
              </li>
                        </ul>
</div>						 
</div>    
	</div>
	  <hr></hr>
<?}
include ('include/footer.php');?>
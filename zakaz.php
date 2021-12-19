<? 
include ('include/header_admin.php');
// Подключаем файл с пользовательскими функциями
require_once('functions.php'); ?>
<div class="banner-top">
	<div class="container">
		<h1> Выполнение заказов</h1>
		<em></em>
	</div>
</div><br></br>
<div class="container">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="form-group">
 <form action="zakaz.php"  method='POST'>
  <label class="control-label">№ заказа</label><br><br>
         <select class="form-control"  name='id'><br><br>
        <?
		connect();
		$sql=mysql_query("select * from zakaz"); 
        while ($result=mysql_fetch_array($sql)) {
            echo '<option value="'.$result['id'].'">'.$result['id'].'</option>';}?>
            </select><br><br>
                        <label class="control-label">Дата выполнения</label>
                        <input class="form-control" type="date" name="fakt_data" value=""><br></br>
                                         <input type="submit" class="button button--primary" value="Изменить">   
</form>
                                         </div>
                                             <div class="col-md-3">
</div></div>
	</div>
    </div><br></br><br></br>
	<?
	// Подлючаем файл с пользовательскими функциями
require_once('functions.php');
	connect();
$fakt_data=$_POST['fakt_data'];
$id=$_POST['id'];	
if ($_POST['fakt_data']) {
/* $result=mysql_query("update zakaz set fakt_data=".$fakt_data.", status=1 where id=".$id) or die ("Ошибка выполнения заказа");} */
$result=mysql_query("update zakaz set fakt_data='$fakt_data', status=1 where id='$id'") or die ("Ошибка выполнения заказа");}
$sql="SELECT zakaz.id, data, bukets.name_buket, kolvo, bukets.price, fakt_data FROM zakaz, bukets,users WHERE bukets.id_buket=zakaz.id_buket and users.id=zakaz.id_user"; 
		$result = mysql_query($sql) or die ("Ошибка выборки");
		
			?>
		
<!--заказы-->
<hr></hr>
<br>
	 <h3 align="center">Заказы</h3> 
     
<table class="table table-hover" align="center">
	<tr class="success">
		<th>№ заказа</th>
		 <th>Дата заказа</th>
	   <th>Букет</th>
	   <th>Количество</th>
	     <th>Цена букета</th>
		<th>Дата выполнения заказа</th>
		</tr>
		<?
while ($rows = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$rows['id'].'</td><td>'.$rows['data'].'</td><td>'.$rows['name_buket'].'</td><td>'.$rows['kolvo'].'</td><td>'.$rows['price'].'</td><td>'.$rows['fakt_data'].'</td>';
echo '</tr>';
echo '<tr>';
echo '</tr>';
}
echo'</table>';
echo'<br></br>';
include ('include/footer.php')?>
<?
include ('include/header_user.php');
// Подключаем файл с пользовательскими функциями
require_once('functions.php'); 
 connect();
 
 if (isset($_SESSION["id"])){
 $id_user=$_SESSION["id"];     

/* $login=$_SESSION["login"]; 
$id=$_SESSION["id"];
$sql = "SELECT id FROM users WHERE login='".$login."'"; 
$result1=mysql_query($sql)    or die("Не могу выполнить запрос!"); 
 $row=mysql_fetch_array($result1);
// пользователь с таким логином и паролем найден ? 
if($id= $row['id'])   */

?>
<html>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Личный кабинет</h1>
		<em></em>
	</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<br /><br />
 <h2 align="center">Оформить заказ</h2>  <br>
    <div class="review-form" id="review-form">
        <form action="" method="POST">
<div class="form-group">
                        <label class="control-label">Дата заказа</label>
                        <input  type="date" name="data">
                                            </div>
                                              <label class="control-label">Название букета</label><br><br>
         <select  class="form-control"  name='buket[]' multiple ><br><br>
        <?
        $sql=mysql_query("select * from bukets"); 
        while ($result=mysql_fetch_array($sql)) {
			
            echo '<option value="'.$result['id_buket'].'">'.$result['name_buket'].'</option>';}?>
            </select><br><br>
            <div class="form-group">
                        <label class="control-label">Количество</label>
                        <input class="form-control" type="text" name="kolvo">
                                            </div>
                    <div class="form-group">
                        <label class="control-label">ФИО</label> <br />
                        <input class="form-control" type="text" name="fio" id="review-email" value="">
                                            </div>
											<div class="form-group">
                        <label class="control-label">Телефон</label> <br />
                        <input class="form-control" type="text" name="tel" id="review-email" value="">
                                            </div>
                                    <div class="form-group">
                    <label class="control-label" for="review-text">Адрес</label> <br />
                    <textarea id="review-text" class="form-control" name="adres" rows="5" cols="10" ></textarea>
                </div>
								 <label class="control-label" name="dostavka">Способ доставки</label> <br />
                    <div class="radio">
                        <label><input type="radio"   name="dostavka"  value="Самовывоз" checked>Самовывоз (бесплатно)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"  name="dostavka" value="Курьер">Курьер (300 руб)<label>
                    </div>
                    <br />
                </div>
           <label class="control-label" >Вид оплаты</label>
           <select class="form-control" name="oplata">
				<option >Наличные</option>
				<option>Банковская карта</option>
				<option>Яндекс.Деньги</option>
				<option>WebMoney</option>
				</select>
                    <br />
			                                             <div class="form-group">
                    <label class="control-label" for="review-text">Ваши комментарии к заказу</label> <br />
                    <textarea id="review-text" class="form-control" name="message" rows="5" cols="10"></textarea>
                </div>
                                        <input type="submit" class="btn-btn success" value="Добавить заказ"><br><br>
           </form>    <hr> 
       <!-- <h2 align="center">Оформленные заказы</h2>  <br>                
<table class="table table-bordered table-condensed" align="center">
	<tr class="success">
		<th>Дата заказа</th>
		<th>Букет</th>
        <th>Количество</th>
        	<th>Цена</th>
         <th>Cумма</th>
		<th>Адрес</th>
		</tr>    
           </div>
         </div>
         <div class="col-md-2">
</div>
        <br> -->
    <?
   $id_user=$_SESSION["id"];    
 $data=$_POST['data'];
$buket=$_POST['buket'];
$kolvo=$_POST['kolvo'];
$fio=$_POST['fio'];
$tel=$_POST['tel'];
$adres=$_POST['adres']; 
$dostavka=$_POST['dostavka'];
$oplata=$_POST['oplata'];
$message=$_POST['message']; 
 if (!isset($_POST["submit"])){
foreach($_POST["buket"] as $s){	 
	 
$result=mysql_query("insert into zakaz(data,id_buket,kolvo,id_user,fio,tel, adres,dostavka,oplata,message) 
value( '".$data."','" .$s. "','".$kolvo."', '".$id_user."','".$fio."','".$tel."','".$adres."','".$dostavka."','".$oplata."','".$message."')")  or die("Ошибка оформления заказа");
 } } 
/* $result="select DATE_FORMAT(data,'%d.%m.%Y') AS data,name_buket, kolvo, bukets.price, kolvo*bukets.price as sum, id_user, fio,tel,adres from zakaz,users, bukets where zakaz.id_buket=bukets.id_buket and zakaz.id_user=users.id and zakaz.id_user=".$_SESSION["id"];  //-date_format-функция вывода даты в  нужном формате
 $result1=mysql_query($result) or die("Ошибка выборки  ваших заказов"); 
while($row=mysql_fetch_array($result1))
{
echo '<tr>'; 
echo '<td>'.$row['data'].'</td>';
echo '<td>'.$row['name_buket'].'</td>';
echo '<td>'.$row['kolvo'].'</td>';
echo '<td>'.$row['price'].'</td>';
echo '<td>'.$row['sum'].'</td>';
echo '<td>'.$row['adres'].'</td>';
echo '</tr>'; 
 }    
echo '</table>';         */
  ?>  <hr></hr></div></div></div> 
   
<?}?>   

<tr><td> 
<h2>Ваши заказы</h2></td></tr>
<? 
$strSQL1="SELECT  id, data FROM zakaz WHERE  zakaz.id_user=".$_SESSION['id']." Group BY  id_user  DESC"; 
$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос1!"); 
while($row1=mysql_fetch_array($result1)) 
{ 
  $order=$row1["id"];
  $strSQL2="SELECT name_buket, kolvo, bukets.price from zakaz,users, bukets where zakaz.id_buket=bukets.id_buket and zakaz.id_user= ".$_SESSION['id']." Group BY  id_user" ; 

//var_dump($strSQL2);
  $result2=mysql_query($strSQL2) or die("Не могу выполнить запрос2!"); 
  ?> 
  <tr><td> 
  <hr> 
  <b>Заказ от <?=$row1["data"]?></td></tr>
<br></b> 

  <table class="table table-striped table-bordered" align="center" >
  <tr><td align="center" ><i>Наименование букета: </i></td> 
<td align="center" ><i>Количество: </i></td> 
<td align="center"><i>Цена: </i></td> 
  </tr> 
<? 


/*   $nSelection = count($buket); */
  $sum=0; 

 
  ?>
    <tr> 
     <td align="center"><?  /* for($i=0; $i < $nSelection; $i++)
   {$nbuket = $buket[$i]; */
echo $row2["name_buket"];
?>
</td> 
     <td align="center"><b>
<?print $row2["kolvo"];?>
</b></td> 
     <td align="center">
   <?print $row2["price"];
   ?>
</td> 
   </tr> 
    <? $sum=$sum+$row2["price"]*$row2["kolvo"]; 
  

 while($row2=mysql_fetch_array($result2))   
  ?>
  <tr><td></td><td align="right"><i>ИТОГО: </i></td> 
  <td>
<? print $sum;  
/* header('Location: /cabinet.php'); //отправляем куда надо */
    exit;

  ?>
</td> 
  </tr> 
  </table> 


  <? 
} 
?> </div>
</html>
<?
include ('include/footer.php');?>

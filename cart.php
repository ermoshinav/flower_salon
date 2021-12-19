<?$id_cart=$_COOKIE["id_cart"];

include ('include/header.php');

print_r('id_s',$id_cart);
// Подключаем файл с пользовательскими функциями
require_once('functions.php'); 
?>
<div class="banner-top">
	<div class="container">
		<h1>Ваша корзина</h1>
		<em></em>
	</div>
</div>
<?
connect();
$result="SELECT COUNT(*) as count FROM cart AND id_cart='".$id_cart."'"; 
$result1=mysql_query($result)  or die("Ошибка подсчета корзин!"); 
$row=mysql_fetch_array($result1); 
if($row["count"]==0) 
{ 
?> 
 <tr><td bgcolor='#ff9999' align='center'> 
        <b>Ваша корзина пуста!</b></td></tr> 
<?
}
else
{
$sql="SELECT  bukets.id_buket, bukets.name_buket, kolvo_cart, bukets.price FROM cart, bukets WHERE cart.id_buket=bukets.id_buket AND id_cart='".$id_cart."'"; 
$result = mysql_query($sql) or die ("Ошибка выборки из корзин");
?>
<tr><td>
<table border="1" width="100%" align="right" >
<tr><td align="right"><i>Букет: </i></td>
<td align="right"><i>Количество: </i></td>
<td align="right"><i>Цена: </i></td>
<td align="right"><i>Действие: </i></td>
<?
$sum=0;
while($row=mysql_fetch_array($result))
{
?>
<tr>
<td><b><?print $row["name_buket"];?></b></td>
<td><?print $row["price"];?></td>
<td><?print $row["kolvo_cart"];?>
<a href="docart.php?type=1&id_buket=
<?print $row["id_buket"];?>" title="Добавить">[ + ]</a>
<a href="docart.php?type=2&id_buket=
<?print $row["id_buket"];?>" title="Уменьшить">[ - ]</a>
</td>
<td> <a href="docart.php?type=3&id_buket=<?print $row["id_buket"];?>">Удалить</a></td>
</tr>
<?
$sum=$sum+$row["price"]*$row["kolvo_cart"];
}?>
<tr><td align="right"></td><td align="right"><i>Итого:</i></td><td align="right"><?print $sum;?></td><td align="right"></td></tr>
</table>
<tr><td><center><a href=docart.php?type=4><b>Очистить корзину</b></a></center></td></tr>
<tr><td><center><a href="cabinet.php"><b>Оформить заказ</b></a></center></td></tr>
<?                       
}
include("include/footer.php");
?>
<? 
include ('include/header_admin.php');
// Подлючаем файл с пользовательскими функциями
require_once('functions.php');
connect();?>
<div class="banner-top">
	<div class="container">
		<h1> Добавление/удаление букетов</h1>
		<em></em>
	</div>
</div><br></br><br></br>
<div class="container">
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
      <div class="form-group">
      <form action="" enctype='multipart/form-data'  method='POST'>
                        <label class="control-label">Название букета</label>
                        <input class="form-control" type="text" name="name" id="review-name" value=""><br></br>
                                            </div>
											  <div class="form-group">
                        <label class="control-label">Цена</label>
                        <input class="form-control" type="text" name="price" id="review-name" value=""><br></br>
                                            </div>
                                            <p>
  <label class="control-label">Фото</label>
<label class="label">Выберите картинку</label><br>
<input type="file" name="myfile" id="myfile" class="input">
</p>
 <input type="submit" class="button button--primary" value="Добавить">	
</form> 

<form action=""  method='POST'>
<hr></hr>
           <form action=""  method="post"> <h2 align="center">Удаление букета</h3> <br></br>
                        <label class="control-label">Название букета</label>
	
	<div class="styled-select">	
	
 <select class="form-control"  name='buket[]' multiple><br><br>
 <?
		connect();
						$sql=mysql_query("select * from bukets"); 
        while ($result=mysql_fetch_array($sql)) {
						
           echo '<option  value="'.$result['id_buket'].'" >'.$result['name_buket'].'</option>';} ?>
			</select>	
			
			</div> 
			
<br></br>            
 <input type="submit" class="button button--primary"  name="ok" value="Удалить">	
</form> 
 </div>
    <div class="col-md-2">
</div>
</div>	
  </div> 
  <?
  if ( isset ( $_POST['buket'] ) )
{
  $ids = implode( ',', $_POST['buket'] );
  $query = 'DELETE FROM `bukets` WHERE `id_buket` IN ('.$ids.')';
  mysql_query( $query );?>
<meta http-equiv='Refresh' content='3; url=add_buket.php />;
<? exit;
}
   if ($query == 'true') {
   echo " <strong><allign='center'>Букет удален</strong>";}
  ?>
  

		<?
$name=$_POST['name'];
$price=$_POST['price'];
/* $img=$_POST['myfile']; */
if (isset($_POST['img']))
//добавление картинки в базу
$maxwidth = "1024"; // максимальная ширина картинок на превью
$foto_dir = "admin/images/"; // Директория для фотографий товаров
$foto_name = $foto_dir.time()."_".basename($_FILES['myfile']['name']); // Полное имя файла вместе с путем
$foto_light_name = time()."_".basename($_FILES['myfile']['name']); // Имя файла исключая путь
$foto_tag = "<img src=\"$foto_name\" border=\"0\">"; // Готовый тэг для вставки картинки на страницу
$foto_tag_preview = "<img src=\"$foto_name\" border=\"0\" width=\"$maxwidth\">"; // Тот же тэг, но для превью
// Текст ошибок
$error_by_mysql = "<label class=\"label\">Ошибка при добавлении данных в базу</span>";
$error_by_file = "<label class=\"label\">Невозможно загрузить файл в директорию. Возможно её не  существует</span>";
// Начало
if(isset($_FILES["myfile"]))
{
$myfile = $_FILES["myfile"]["tmp_name"];
$myfile_name = $_FILES["myfile"]["name"];
$myfile_size = $_FILES["myfile"]["size"];
$myfile_type = $_FILES["myfile"]["type"];
$error_flag = $_FILES["myfile"]["error"];
// Если ошибок не было
if($error_flag == 0)
{
$DOCUMENT_ROOT = $_SERVER['DOCMENT_ROOT'];
$upfile = getcwd()."/images/" . time()."_".basename($_FILES["myfile"]["name"]);
if ($_FILES['myfile']['tmp_name'])
{
//Если не удалось загрузить файл
if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $upfile))
{
echo "$error_by_file";
exit;
}
}
else
{
    echo 'Проблема: возможна атака через загрузку файла. ';
    echo $_FILES['myfile']['name'];
    exit;
}
$query  = mysql_query("INSERT INTO bukets (name_buket,img,price) VALUES ('$name','".$foto_name."', '$price')") or die("Ошибка добавления букетов");
if ($query == 'true') {
echo " <strong><font-size='4'>Букет добавлен</font></strong>";
}
// В противном случае, выводим ошибку при добавлении в базу данных
else {
echo "$error_by_mysql";
}
}}?>
<br></br> <br></br><br><br>
<?include ('include/footer.php')?>
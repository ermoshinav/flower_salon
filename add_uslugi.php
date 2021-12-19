<? 
include ('include/header_admin.php');
// Подлючаем файл с пользовательскими функциями
require_once('functions.php');
connect();?>
<div class="banner-top">
	<div class="container">
		<h1> Добавление/удаление услуг</h1>
		<em></em>
	</div>
</div><br></br><br></br>
<div class="container">
   <div class="col-md-2">
</div>
<div class="col-md-8">
    
    <div class="review-form" id="review-form">
        <form action=""  method="post" enctype="multipart/form-data">
            <div class="review-form-fields">
                                                <div class="provider-fields">
					
                    <div class="form-group">
                        <label class="control-label">Название услуги</label>
                        <input class="form-control" type="text" name="name" id="review-name" value="">
                                            </div><br></br>
                    <label class="control-label">Фото</label>
<label class="label">Выберите картинку</label><br>
<input type="file" name="myfile" id="myfile" class="input">
                                    </div><br></br>
                                                <div class="form-group">
                    <label class="control-label" for="review-text">Описание услуги</label>
                    <textarea id="review-text" class="form-control" name="text" rows="10" cols="45"></textarea>
                </div><br></br>
                                        <input type="submit" class="button button--primary" value="Добавить услугу">
                    <span class="review-add-form-status ajax-status" style="display: none;">
                        <i class="icon16 loading"><!--icon --></i>
                    </span>
                </div>
                            </div>
        </form><hr></hr>
           <form action=""  method="post"> <h2 align="center">Удаление услуг</h3> 
           <label class="control-label">Название услуги</label><br><br>
         <select class="form-control"  name='uslugi'><br><br>
        <?
		$sql=mysql_query("select * from uslugi"); 
        while ($result=mysql_fetch_array($sql)) {
         
         echo '<option value="'.$result['id'].'">'.$result['name'].'</option>';}?>
            </select><br><br>
              <input type="submit" class="button button--primary" value="Удалить  услугу">
         </form>
      <br></br>
        <div class="col-md-2">
</div>
		</div>
		</div>
	<?
    $uslugi=$_POST['uslugi'];
  
     if (!empty($_POST)){
     $result=mysql_query("delete  from uslugi where id=".$uslugi) or die("Ошибка удаления  услуг");}
     if ($result == 'true') {
echo " <strong><allign='center'>Услуга удалена</strong>";
}
    ?>	
		
		<?
$name=$_POST['name'];
$text=$_POST['text'];
if (isset($_POST['img']))
//добавление картинки в базу
$maxwidth = "1024"; // максимальная ширина картинок на превью
$foto_dir = "images/"; // Директория для фотографий товаров
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
$query  = mysql_query("INSERT INTO uslugi (name,img,descr) VALUES ('$name','".$foto_name."', '$text')") or die("Ошибка добавления услуг");
if ($query == 'true') {
echo " <strong><allign='center'>Услуга добавлена</strong>";
}
// В противном случае, выводим ошибку при добавлении в базу данных
else {
echo "$error_by_mysql";
}
}}?>
<? 
include ('include/footer.php');?>
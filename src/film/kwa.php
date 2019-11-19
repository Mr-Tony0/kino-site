<?php 
$conect = mysqli_connect('localhost','root','','films');
$sql = mysqli_query($conect, 'SELECT `name` FROM `film` ORDER BY id DESC LIMIT 1');
$result = mysqli_fetch_array($sql);
$name = $result['name'];



    //Проверка директории (поставь свою директорию!!! (Если у тебя локалка то лучше делать так, по другому будет ошибка))
    $files = scandir('C:\Users\ROOT\Downloads\OSPanel\domains\kino-site\src\film');
    //sort($files);
    //Файловая кнопка (Если тебе нужны названия просто пиши 'echo $file')
    foreach($files as $file){
       //echo $file;
	   $namee = pathinfo($file);
	   $blocke = $namee['filename'];
	   $fullName = str_replace('.', '', $blocke);
	//echo $fullName;
	  
    }


$block = "./film/".$name.".php";
$content = file_get_contents('./link.php');
$save = fopen($block,"w+"); 
fwrite($save,$content); // Записать содержимое в дескриптор
fclose($save); // Закрыть файл
$name_block = pathinfo($_SERVER['SCRIPT_NAME']);
$nameFile_block = $name_block['filename'];
$link = mysqli_query($conect, "SELECT `link` FROM `film` WHERE `name`= '$fullName'");
//$resultLink =mysqli_fetch_array($link);
//echo $resultLink['link'];
while ($resultLink =mysqli_fetch_array($link)) {
	//echo $resultLink['link'];
	$namer = $resultLink['link'];
}
//echo $namer;
//echo $name_block;

?>

<div class="newFilms__element">
	<div class="newFilms__img kong_img">
		<a href="<?php echo $namer;?>"><div class="newFilms__hover">
			<span class="newFilms__button">Смотреть</span>
		</div></a>
	</div>
	<h3 class="newFilms__title">конг</h3>
	<p class="newFilms__text">трелер</p>
</div>



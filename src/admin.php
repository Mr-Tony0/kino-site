<?php
$conect = mysqli_connect('localhost','root','','films');

if (isset($_POST['submit'])){
	$uploadImg = 'img/';
	$apendImg=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile1 = "$uploadImg$apendImg";
	$uploadVideo = 'video/';
	$apendVideo=date('YmdHis').rand(100,1000).'.mp4'; 
	$uploadfile2 = "$uploadVideo$apendVideo"; 
	if(($_FILES['loadImg']['type'] == 'image/gif' || $_FILES['loadImg']['type'] == 'image/jpeg' || $_FILES['loadImg']['type'] == 'image/png') && ($_FILES['loadImg']['size'] != 0 and $_FILES['loadImg']['size']<=1512000)){ 
		if (move_uploaded_file($_FILES['loadImg']['tmp_name'], $uploadfile1)){
			$size = getimagesize($uploadfile1); 
			if ($size[0] < 5001 && $size[1]<15001){
				//echo 'картинка добавлена';	
			}else{
				echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
				unlink($uploadfile1); 
			} 
		} else {
			echo "Файл не загружен, вернитеcь и попробуйте еще раз";
		} 
	} else { 
	echo "Размер файла не должен превышать 1.5мб";
	}
	
	if(($_FILES['loadPlayer']['type'] == 'video/mp4' || $_FILES['loadPlayer']['type'] == 'video/3GP' || $_FILES['loadPlayer']['type'] == 'video/avi' || $_FILES['loadPlayer']['type'] == 'video/mkw' || $_FILES['loadPlayer']['type'] == 'video/mov' || $_FILES['loadPlayer']['type'] == 'video/wma') && ($_FILES['loadPlayer']['size'] != 0 and $_FILES['loadImg']['size']<=1512000000)){ 
			if (move_uploaded_file($_FILES['loadPlayer']['tmp_name'], $uploadfile2)){
				$size = getimagesize($uploadfile2); 
				if ($size[0] < 5001 && $size[1]<15001){ 
					//echo 'видео добавлена';	
				}else{
					echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
					unlink($uploadfile2); 
				} 
			} else {
				echo "Файл не загружен, вернитеcь и попробуйте еще раз";
			} 
		} else { 
		echo "Размер файла не должен превышать 1.5гб";
		}
	
		/*
	$conect = mysqli_connect('localhost','root','','films');
	$query ="SELECT * FROM `film` WHERE video = '$uploadfile2' AND img = '$uploadfile1'";
	$data = mysqli_query($conect, $query);
	if(mysqli_num_rows($data) == 0){
		$query ="INSERT INTO`film`(video,img) VALUES('$uploadfile2','$uploadfile1')";
		mysqli_query($conect, $query);
		mysqli_close($conect);
		header("Location: admin.php");
	
	}
	*/


	$name =  mysqli_real_escape_string($conect, trim($_POST['name']));
	$janr = mysqli_real_escape_string($conect, trim($_POST['janr']));
	$strana = mysqli_real_escape_string($conect, trim($_POST['strana']));
	$loadImg = $uploadfile1;
	$loadPlayer = $uploadfile2;
	$filmRadio = mysqli_real_escape_string($conect, trim($_POST['filmRadio']));
	$serRadio = mysqli_real_escape_string($conect, trim($_POST['serRadio']));
	$description = mysqli_real_escape_string($conect, trim($_POST['description']));
	$rang = mysqli_real_escape_string($conect, trim($_POST['rang']));
	$date = mysqli_real_escape_string($conect, trim($_POST['data']));
	$time = mysqli_real_escape_string($conect, trim($_POST['time']));
	if(!empty($name) and !empty($janr) and !empty($strana) and !empty($loadImg) and !empty($loadPlayer) and !empty(($filmRadio) or !empty($serRadio)) and !empty($description) and !empty($rang) and !empty($date) and !empty($time)){
		$query ="SELECT * FROM `film` WHERE name = '$name' AND time = '$time' AND country = '$strana'";
		$data = mysqli_query($conect, $query);
		if(mysqli_num_rows($data) == 0){
			$query ="INSERT INTO`film`(name, description, img, video, film, serial, rang, data, style, country, time) VALUES('$name', '$description', '$loadImg', '$loadPlayer', '$filmRadio', '$serRadio', '$rang', '$date', '$janr', '$strana', '$time')";
			mysqli_query($conect, $query);
			//echo'фильм добавлен';
			mysqli_close($conect);
			header ('Location: film.php');
			exit();
		}
		else{
			echo 'такой фильм существует ';
		}
	}else{
		echo'поля не заполнены';
	}
}
$name =  mysqli_real_escape_string($conect, trim($_POST['name']));
?>

<!DOCTYPE html>
<html>
<head>
	<title>work</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/modification.css">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	
</head>
<body>
<center>
	<h1>admin panel</h1>
</center>
<p>добавить фильм:</p>

<form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?> enctype="multipart/form-data">

<p>установить картинку плеера</p>
<input type="file" name="loadImg" id="imgFile"/>
		
<p>установить видеоплеер</p>
<input type="file" name="loadPlayer"></br></br>

<input type="text" name="name">название</br></br>

			<select  name="janr">
				<option>Жанры</option>
				<option>комедия</option>
				<option>триллер</option>
				<option>боевик</option>
				<option>мелодрамма</option>
				<option>криминал</option>
				<option>драма</option>
				<option>ужасы</option>
				<option>приключения</option>
				<option>семейные</option>
				<option>фантастика</option>
				<option>документальный</option>
				<option>военный</option>
				<option>исторический</option>
				<option>биография</option>
				<option>вестерн</option>
				<option>мкльтфильм</option>
				<option>детектив</option>
				<option>аниме</option>
			</select>
			<select  name="strana">
				<option>Страны</option>
				<option>США</option>
				<option>СССР</option>
				<option>Франция</option>
				<option>Великобритания</option>
				<option>Беларусь</option>
				<option>Россия</option>
				<option>Германия</option>
				<option>Гонконг</option>
				<option>Индия</option>
				<option>Испания</option>
				<option>Италия</option>
				<option>Казахстан</option>
				<option>Канада</option>
				<option>Украина</option>
				<option>Япония</option>
				<option>Австралия</option>
				<option>Бельгия</option>
				<option>Польша</option>
				<option>Китай</option>
				<option>Швеция</option>
				<option>Дания</option>
				<option>Южная Корея</option>
				<option>Австрия</option>
				<option>Израиль</option>
				<option>Турция</option>
				<option>Колумбия</option>
				<option>Швейцария</option>
				<option>другое...</option>
			</select>

	<p>тип:</p>
	<span><input type="radio" name="filmRadio">фильм</span>
	<span><input type="radio" name="serRadio">сериал</span></br>
	
	<p>описание</p>
	<textarea name="description"></textarea>
	
	<p>рейтинг</p>
	<input type="number" name="rang">
	
	<p>дата выхода</p>
	<input type="date" name="data">
	
	<p>длительность в минутах</p>
	<input type="number" name="time"></br></br></br>
	
	<button id="buton" name="submit" type="submit">отправить в ад</button>
	</form>
	<script>
		var imgId = document.getElementById('image');
		var img = '<?php echo$uploadfile1; ?>';
		imgId.style.backgroundImage = 'url('+img+')';
		imgId.style.backgroundSize = '100% 100%';
		imgId.style.backgroundRepeat = 'no-repeat';
		imgId.style.backgroundPosition = 'center';
	</script>
	<script src="./js/script.js"></script>
</body>
</html>

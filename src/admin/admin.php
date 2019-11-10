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

<form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?>>
<input type="text" name="name">название</br>

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
	<script src="./js/script.js"></script>
</body>
</html>
<?php
require 'upload.php';
echo $uploadfile1;
echo $uploadfile1;
$conect = mysqli_connect('localhost','root','','films');
if (isset($_POST['submit'])){	
	$name =  mysqli_real_escape_string($conect, trim($_POST['name']));
	$janr = mysqli_real_escape_string($conect, trim($_POST['janr']));
	$strana = mysqli_real_escape_string($conect, trim($_POST['strana']));
	$loadImg =$uploadfile1;
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
			echo'фильм добавлен';
			mysqli_close($conect);
			exit();
		}
		else{
			echo 'такой фильм существует ';
		}
	}else{
		echo'поля не заполнены';
	}
}
?>
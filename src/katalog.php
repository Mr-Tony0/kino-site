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
<form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?> enctype="multipart/form-data">
	<header>
		<div class="headerCenter">
			<div class="logo">
				<a href="index.html"><img class="logo__img" src="./img/Logo.png" alt=""></a>
				<a href="index.html"><h1 class="logo__title">KINgaroo</h1></a>
			</div>
			<div class="headerCenter__menu desktop">
				<ul class="headerCenter__ul">
					<li class="headerCenter__li"><a class="headerCenter__link" href="index.html">Главная</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="katalog.html">Каталог</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="">Новинки</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="">Популярное</a></li>
				</ul>
			</div>
			</div>
			<div class="headerCenter__clickBlock mobile">
				<div class="headerCenter__click" id="click">
				
				</div>
			</div>
		</div>
		
	</header>
	<nav class="navigation">
		<ul class="navigation__ul">
			<li class="navigation__li"><a class="navigation__link" href="">Главная</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Каталог</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Новинки</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Популярное</a></li>
		</ul>
	</nav>
	<section class="filter background_light">
		<div class="blockSearch background_light">
			<div class="blockSearch__element">
				<input class="blockSearch__input" type="text" name="search">
				<button type="submit" name="go" class="blockSearch__button color_searchButton">Найти</button>
			</div>
		</div>
		<div class="typeVideo">
			<p class="typeVideo__text"><a class="typeVideo__link" href ="">Фильмы</a></p>
			<p class="typeVideo__text"><a class="typeVideo__link" href ="">Сериалы</a></p>
		</div>
		<div class="filters">
			<select class="filters__select" name="janr">
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
			<select class="filters__select" name="strana">
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
			<p class="filters__text">Сортировать по:</p>
			<span class="filters__check"><input type="checkbox" name="rang">Рейтингу</span>
			<span class="filters__check"><input type="checkbox" name ="new">Сначало новые</span>
			<span class="filters__check"><input type="checkbox" name ="time">По продолжительности</span>
			<span class="filters__check"><input type="checkbox" name="alphabet">По алфавиту</span>
		</div>
	</section>
	<section>
		<div class="newFilms">
		<?php
			$conect = mysqli_connect('localhost','root','','films');
			$files = scandir('C:\OSPanel\domains\kino-site\src\film');
			sort($files);
			//Файловая кнопка (Если тебе нужны названия просто пиши 'echo $file')
			foreach($files as $file)
				if($file == 'css' or $file == 'js' or $file == 'fonts' or $file == 'img' or $file == 'scss' or $file == 'video' or $file == '.' or $file == '..'){
					
				}else{
					
					$filmName = str_replace('.php','',$file);
					$imgDb = mysqli_query($conect,"SELECT `img`,`name` FROM `film`");
					//echo $filmName;
					//echo $filmName;
					while ($result_imgDb = mysqli_fetch_array($imgDb)) {
						if($result_imgDb['name'] == $filmName){
							$name = $result_imgDb['name'];
							$img = $result_imgDb['img'];
							//echo $img;
							
						}
						
					}
					if (isset($_POST['go'])){
						
						$janr = mysqli_real_escape_string($conect, trim($_POST['janr']));
						$strana = mysqli_real_escape_string($conect, trim($_POST['strana']));
						$rang = mysqli_real_escape_string($conect, trim($_POST['rang']));
						$new = mysqli_real_escape_string($conect, trim($_POST['new']));
						$time = mysqli_real_escape_string($conect, trim($_POST['time']));
						$alphabet = mysqli_real_escape_string($conect, trim($_POST['alphabet']));
						$input =  mysqli_query($conect,"SELECT `name`,`img`,`rang`,`country` FROM `film` ");
						while ($result_input = mysqli_fetch_array($input)){
							if($result_input['rang'] == $rang or $result_input['country'] == $strana){
								echo $result_input['name'];
							}
							
						}
					}else{
						
						echo '<div class="newFilms__element">
								<div class="newFilms__img" id ="'.$name.'" style= "background-image:url('.$img.')" >
									<a href="film\\'.$filmName.'.php"><div class="newFilms__hover">
									<span class="newFilms__button">Смотреть</span>
									</div></a>
								</div>
								<h3 class="newFilms__title">'.$name.'</h3>
								<p class="newFilms__text">трелер</p>
								</div>';
						
						
					}
					
					
				}
				
			?>
		</div>
	</section>
	<footer class="footer">
		<div class="footer__center">
			
			<div class = "footer__element">
				<p class="footer__text">О проекте</p>
				<p class="footer__text">Обратная связь</p>
				<p class="footer__text">Партнерам</p>
			</div>
			<div class = "footer__element">
				<p class="footer__text">Новости</p>
				<p class="footer__text">Продукты</p>
				<p class="footer__text">Партнерам</p>
			</div>
			<div class = "footer__element">
				<p class="footer__text">Kinguru.com - все права зашищены</p>
			</div>
		</div>
		<div class="footer__end">
			<img class="footer__img"src="./img/facebook.svg">
			<img class="footer__img"src="./img/telegram.svg">
			<img class="footer__img"src="./img/vk.svg">
		</div>
	</footer>
<script src="./js/jquery-3.3.1.js"></script>
<script src="../dist/main.js"></script>
</body>
</html>
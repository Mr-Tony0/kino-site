<?php
include('C:\OSPanel\domains\kino-site\src\data.php');


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
	<form method="GET" action='link.php' enctype="multipart/form-data">
	<header>
		<div class="headerCenter">
			<div class="logo">
				<a href="index.html"><img class="logo__img" src="./img/Logo.png" alt=""></a>
				<a href="index.html"><h1 class="logo__title">KINgaroo</h1></a>
			</div>
			<div class="headerCenter__menu desktop">
				<ul class="headerCenter__ul">
					<li class="headerCenter__li"><a class="headerCenter__link" href="">Главная</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="katalog.html">Каталог</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="">Новинки</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="">Популярное</a></li>
				</ul>
			</div>
				<div class="search">
					<img class="search__img" id="clickSearch" src="./img/search.png">
				</div>
			</div>
			<div class="headerCenter__clickBlock mobile">
				<div class="headerCenter__click" id="click">
				
				</div>
			</div>
		</div>
		
	</header>
	<div class="blockSearch"id = "oneSearch">
		<div class="blockSearch__element">
			<input class="blockSearch__input" type="text" name="search">
			<button type="submit" name="go" class="blockSearch__button">Найти</button>
		</div>
	</div>
	<nav class="navigation">
		<ul class="navigation__ul">
			<li class="navigation__li"><a class="navigation__link" href="">Главная</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Каталог</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Новинки</a></li>
			<li class="navigation__li"><a class="navigation__link" href="">Популярное</a></li>
		</ul>
		<div class="blockSearch" id = "twoSearch">
			<div class="blockSearch__element">
				<input class="blockSearch__input" type="text" name="search">
				<button type="submit" name="go" class="blockSearch__button">Найти</button>
			</div>
		</div>
	</nav>
	
	<section class="one-general">
	
	<!--название фильма-->
	
		<div class="nameSection">
			<center>
				<h2 class="nameSection__title"><?php echo $resultSearch['name']; ?></h2>
				<div class="nameSection__line">
				</div>
			</center>
		</div>
		
		
		<div class="center-block">
		<!--превью картинка-->
			<div class="previe" id="image">
			</div>
			<div class="description">
				<p class="description__text"><?php echo $resultSearch['description'];?></p>
				<div class="key">
					<p>продолжительность:<?php echo $resultSearch['time'];?> минут</p>
					<p>жанры: <?php echo $resultSearch['style'];?></p>
				</div>
			</div>
		</div>
		<div class="info">
			<p>Страна:<?php echo $resultSearch['country'];?></p>
			<p>Рейтинг: <?php echo $resultSearch['rang'];?></p>
		</div>
	</section>
	<section class="two-general">
		<div class="center-block">
			<aside class="publicity">
				реклама
			</aside>
			
			<div class="previe" id="play">
				<div class="media-wrapper">
					<video id="player1" width="640" height="360" style="max-width:100%;" preload="none" controls playsinline webkit-playsinline>
						<?php echo '<source src=".' . htmlspecialchars($resultSearch['video']) . '">';?>
						<track srclang="en" kind="subtitles" src="mediaelement.vtt">
						<track srclang="en" kind="chapters" src="chapters.vtt">
					</video>
				</div>  
			</div>
			
			<aside class="publicity">
				реклама
			</aside>
		</div>
	</section>
	<section class="free-general">
		<div class="arround-block">
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
			<div class="arround-block__element">рек фильмы</div>
		</div>
		<div class="arround-block">
			реклама
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
</form>	

<script src="./js/jquery-3.3.1.js"></script>
<script>
/* 
удаление кнопки

	var delet = '<?php echo $delet ?>'
	if(delet == 'false'){
		var del = document.getElementById("delete");
		del.parentNode.removeChild(del);
	}else{
		return false;
	}
*/	
	var imgId = document.getElementById('image');
	var img = '<?php echo '.'.$resultSearch['img']; ?>';
	imgId.style.backgroundImage = 'url('+img+')';
	imgId.style.backgroundSize = '100% 100%';
	imgId.style.backgroundRepeat = 'no-repeat';
	imgId.style.backgroundPosition = 'center';
</script>
<script src="./js/main.js"></script>
</body>
</body>
</html>

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
	<section>
		<div class="slider">
		
			
			<div class="slider__content">
				<div class="img first">
				</div>
				<div class="img">
				</div>
				<div class="img">			
				</div>
				<div class="img">			
				</div>
				<div class="img">				
				</div>
			</div>
			<img class="slider__go" id="previous" src="./img/next2.png">
			<div class="slider__checked">
				<span class="slider__point first" id="Check0"></span>
				<span class="slider__point" id="Check1"></span>
				<span class="slider__point" id="Check2"></span>
				<span class="slider__point" id="Check3"></span>
				<span class="slider__point" id="Check4"></span>
			</div>
			<img class="slider__go" id="next" src="./img/next1.png">
		</div>
		
	</section>
	<section>
		<div class="nameSection">
			<center>
				<h2 class="nameSection__title">Новинки</h2>
				<div class="nameSection__line">
				</div>
			</center>
		</div>
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
							
						}
						
					}
					//echo $result_imgDb['name'];
					echo '<div class="newFilms__element">
							<div class="newFilms__img" id ="'.$filmName.'" >
								<a href="film\\'.$file.'"><div class="newFilms__hover">
								<span class="newFilms__button">Смотреть</span>
								</div></a>
							</div>
							<h3 class="newFilms__title">'.$filmName.'</h3>
							<p class="newFilms__text">трелер</p>
							</div>';
					//echo'<a class= link href="film\\'.$file.'" class="product">'.$file.'</a>';
				
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
<?php
	$files = scandir('C:\OSPanel\domains\kino-site\src\film');
			sort($files);
			//Файловая кнопка (Если тебе нужны названия просто пиши 'echo $file')
			foreach($files as $file)
				//$filmName1 = str_replace('.php','', $file);
				$filer = $file;
				echo $filer;
?>
<script>
	
	var imgId = document.getElementById('<?php echo $filmName?>');
	var img = '<?php echo $img ?>';
	//alert(img);
	//alert(imgId);
	imgId.style.backgroundImage = 'url('+img+')';
	imgId.style.backgroundSize = '100% 100%';
	imgId.style.backgroundRepeat = 'no-repeat';
	imgId.style.backgroundPosition = 'center';
	
	//imgId.style.backgroundImage = 'url('+img+')';
	//imgId.style.backgroundSize = '100% 100%';
	//imgId.style.backgroundRepeat = 'no-repeat';
	//imgId.style.backgroundPosition = 'center';

</script>
<script src="./js/jquery-3.3.1.js"></script>
<script src="../dist/main.js"></script>
</body>
</body>
</html>

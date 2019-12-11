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
			$files = scandir('C:\Users\ROOT\Downloads\OSPanel\domains\kino-site\src\film');
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
					
					$date = mysqli_query($conect, "SELECT `data`,`name`,`img` FROM `film`  ORDER BY `data` DESC LIMIT 39");
					while($result_date = mysqli_fetch_array($date)){
						
						echo '<div class="newFilms__element">
								<div class="newFilms__img" id ="'.$result_date['name'].'" style= "background-image:url('.$result_date['img'].')" >
									<a href="film\\'.$result_date['name'].'.php"><div class="newFilms__hover">
									<span class="newFilms__button">Смотреть</span>
									</div></a>
								</div>
								<h3 class="newFilms__title">'.$result_date['name'].'</h3>
								<p class="newFilms__text">трелер</p>
								</div>';
						
						
					}break;
					
					
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

 
	
/*
$conect = mysqli_connect('localhost','root','','films');
$imgDb = mysqli_query($conect,"SELECT `img`,`name` FROM `film`");
while($result_imgDb = mysqli_fetch_array($imgDb)){
	echo $result_imgDb['img'];

}


	$filess = scandir('C:\OSPanel\domains\kino-site\src\film');
			sort($filess);
			//Файловая кнопка (Если тебе нужны названия просто пиши 'echo $file')
			foreach($filess as $filer){
				//$filmName1 = str_replace('video','', $file);
				$filer = str_replace('.php','', $filer);
				
			}
			*/
?>
<script>
	var number = '<?php echo $i ?>';
	if(number>4){
		
	}
	//var imgId = document.getElementById('<?php $filess = scandir('C:\OSPanel\domains\kino-site\src\film');sort($filess);foreach($filess as $filer){$filer = str_replace('.php','', $filer);echo $filer;}?>');
	/*
	for(i = 0 ; i <= number ; i++){
		var img = '<?php $conect = mysqli_connect('localhost','root','','films');$files = scandir('C:\OSPanel\domains\kino-site\src\film');sort($files);foreach($files as $file)if($file == 'css' or $file == 'js' or $file == 'fonts' or $file == 'img' or $file == 'scss' or $file == 'video' or $file == '.' or $file == '..'){}else{$filmName = str_replace('.php','',$file);$imgDb = mysqli_query($conect,"SELECT `img`,`name` FROM `film`");while ($result_imgDb = mysqli_fetch_array($imgDb)) {if($result_imgDb['name'] == $filmName){$name = $result_imgDb['name'];$img = $result_imgDb['img'];echo '.'. $img;}}}?>';
		var link = new Array();
		//alert(link[i])
		if(link[i] === undefined){
			
			//alert(link[1]);
			if(link[i] == img){
				img = '';
				alert(img);
				break;
				//return false;
				 
			}else{
				link[i] = img;
				alert(link[i]);
			}
		}
	//alert(link[1]);
	}
	*/
	
	/*
	//alert(1);
	
	//alert(img);
	
	alert(mas[0]);
	imgId.style.backgroundImage = 'url('+img+')';
	imgId.style.backgroundSize = '100% 100%';
	imgId.style.backgroundRepeat = 'no-repeat';
	imgId.style.backgroundPosition = 'center';
	
	//imgId.style.backgroundImage = 'url('+img+')';
	//imgId.style.backgroundSize = '100% 100%';
	//imgId.style.backgroundRepeat = 'no-repeat';
	//imgId.style.backgroundPosition = 'center';
*/
</script>
<script src="./js/jquery-3.3.1.js"></script>
<script src="../dist/main.js"></script>
</body>
</html>

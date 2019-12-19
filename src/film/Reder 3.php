<?php
include('C:\Users\ROOT\Downloads\OSPanel\domains\kino-site\src\data.php');

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
<body id="body">
	<form method="GET" action='link.php' enctype="multipart/form-data">
	<header>
		<div class="headerCenter">
			<div class="logo">
				<a href="../index.php"><img class="logo__img" src="./img/Logo.png" alt=""></a>
				<a href="../index.php"><h1 class="logo__title">KINgaroo</h1></a>
			</div>
			<div class="headerCenter__menu desktop">
				<ul class="headerCenter__ul">
					<li class="headerCenter__li"><a class="headerCenter__link" href="../index.php">Главная</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="../katalog.php">Каталог</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="../index.php">Новинки</a></li>
					<li class="headerCenter__li"><a class="headerCenter__link" href="../index.php">Популярное</a></li>
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
	
	<section class="one-general">
	
	<!--название фильма-->
	
		<div class="nameSection">
			<center>
				<h2 class="nameSection__title lightColor"><?php echo $resultSearch['name']; ?></h2>
				<div class="nameSection__line">
				</div>
			</center>
		</div>
		
		
		<div class="one-general__center-block center-block">
		<!--превью картинка-->
			<div class="previe" id="image">
			</div>
			<div class="description">
				<p class="description__text"><?php echo $resultSearch['description'];?></p>
			</div>
		</div>
		<div class="info">
			<p class="info__text">продолжительность:<?php echo $resultSearch['time'];?> минут</p>
			<p class="info__text">жанры: <?php echo $resultSearch['style'];?></p>
			<p class="info__text">Страна:<?php echo $resultSearch['country'];?></p>
			<p class="info__text">Рейтинг: <?php echo $resultSearch['rang'];?></p>
		</div>
	</section>
	<section class="two-general">
		<div class="two-general__center-block center-block">
			<aside class="publicity">
				<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_160x600.jpg" width="100%" height="100%" border="0" /></a>
				<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_160x600.jpg" width="100%" height="100%" border="0" /></a>
			</aside>
			
			<div class="previe" id="play">
				<div class="media-wrapper">
					<video id="player1" width="840" height="460" style="max-width:100%;" preload="none" controls playsinline webkit-playsinline>
						<?php echo '<source src=".' . htmlspecialchars($resultSearch['video']) . '">';?>
						<track srclang="en" kind="subtitles" src="mediaelement.vtt">
						<track srclang="en" kind="chapters" src="chapters.vtt">
					</video>
				</div>  
			</div>
			
			<aside class="publicity">
				<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_160x600.jpg" width="100%" height="100%" border="0" /></a>
				<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_160x600.jpg" width="100%" height="100%" border="0" /></a>			
			</aside>
		</div>
	</section>
	<section class="free-general">
		<div class="arround-block">
		<?php
		$conect = mysqli_connect('localhost','root','','films');
		$rek =  mysqli_query($conect,"SELECT `name`,`img`FROM `film` ORDER BY `data` DESC LIMIT 5");
		while ($result_rek = mysqli_fetch_array($rek)){
			
				echo '<div class="arround-block__element">
						<div class="arround-block__img" style="background-image:url(.'.$result_rek['img'].');">
							<a href="./'.$result_rek['name'].'.php">
								<div class="newFilms__hover">
									<span class="newFilms__button">Смотреть</span>
								</div>
							</a>
						</div>
						<h3 class="arround-block__title">'.$result_rek['name'].'</h3>
					</div>';
			
		}
		?>
			
		</div>
		
	</section>
	<section class="foo-general">
		<div class="arround-block arroundColor">
			<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_300x300.jpg" width="300" height="200px" border="0" /></a>
			<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_300x300.jpg" width="300" height="200px" border="0" /></a>
			<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_300x300.jpg" width="300" height="200px" border="0" /></a>
			<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_300x300.jpg" width="300" height="200px" border="0" /></a>
			<a href="https://galior-market.ru/inv=MrFreyd1483" target="_blank"><img src="https://galior-market.ru/images/banners/ru/for_sellers_300x300.jpg" width="300" height="200px" border="0" /></a>
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
	var imgId = document.getElementById('image');
	var img = '<?php echo '.'.$resultSearch['img']; ?>';
	imgId.style.backgroundImage = 'url('+img+')';
	imgId.style.backgroundSize = '100% 100%';
	imgId.style.backgroundRepeat = 'no-repeat';
	imgId.style.backgroundPosition = 'center';
	
	var img = new Array();
	img[0] = './img/img1.png';
	img[1] = './img/img2.png';
	img[2] = './img/img3.png';
	var rand = Math.random();
	rand = rand *3;
	rand = Math.floor(rand);
	rand = img[rand];
	var body = document.getElementById('body');
	body.style.backgroundImage = 'url('+rand +')';
</script>
<script src="./js/main.js"></script>
</body>
</body>
</html>
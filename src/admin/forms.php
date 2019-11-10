<?php include ("./upload.php"); ?>
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
<form  method="POST" action=<?php echo $_SERVER['PHP_SELF'];?> enctype="multipart/form-data">
<p>установить картинку плеера</p>
	<div class="previe" id="image">
	</div>
	<input type="file" name="loadImg" id="imgFile"/>
	
		
	<p>установить видеоплеер</p>
	<div class="previe" id="play">
	</div>
	<input type="file" name="loadPlayer">
	
	<a href ="./admin.php"><button type="submit" name="go">далее</button></a>
	
</form>
</body>
</html>
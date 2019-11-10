<?php


	$uploadImg = 'img/';
	$apendImg=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile1 = "$uploadImg$apendImg";
	$uploadVideo = 'video/';
	$apendVideo=date('YmdHis').rand(100,1000).'.mp4'; 
	$uploadfile2 = "$uploadVideo$apendVideo"; 
	if(isset($_POST['go'])){
	if(($_FILES['loadImg']['type'] == 'image/gif' || $_FILES['loadImg']['type'] == 'image/jpeg' || $_FILES['loadImg']['type'] == 'image/png') && ($_FILES['loadImg']['size'] != 0 and $_FILES['loadImg']['size']<=1512000)){ 
		if (move_uploaded_file($_FILES['loadImg']['tmp_name'], $uploadfile1)){
			$size = getimagesize($uploadfile1); 
			if ($size[0] < 5001 && $size[1]<15001){ 
				//echo "Файл загружен. Путь к файлу: ./img/".$uploadfile1.""; 
			}else{
				echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
				unlink($uploadfile1); 
			} 
		} else {
			echo "Файл не загружен, вернитеcь и попробуйте еще раз";
		} 
	} else { 
	echo "Размер файла не должен превышать 512Кб";
	}
	
	
	if(($_FILES['loadPlayer']['type'] == 'video/mp4' || $_FILES['loadPlayer']['type'] == 'video/3GP' || $_FILES['loadPlayer']['type'] == 'video/avi' || $_FILES['loadPlayer']['type'] == 'video/mkw' || $_FILES['loadPlayer']['type'] == 'video/mov' || $_FILES['loadPlayer']['type'] == 'video/wma') && ($_FILES['loadPlayer']['size'] != 0 and $_FILES['loadImg']['size']<=1512000000)){ 
			if (move_uploaded_file($_FILES['loadPlayer']['tmp_name'], $uploadfile2)){
				$size = getimagesize($uploadfile2); 
				if ($size[0] < 5001 && $size[1]<15001){ 
					//echo $test;
					header("Location: admin.php");
		
					
				}else{
					echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
					unlink($uploadfile2); 
				} 
			} else {
				echo "Файл не загружен, вернитеcь и попробуйте еще раз";
			} 
		} else { 
		echo "Размер файла не должен превышать 512Кб";
		}
}	
		
		
	
	
		
?>

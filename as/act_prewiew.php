<?php

/*
 * created by arcady1254 3.11.2011
 */
header("Content-type: image/jpeg");
$source=$_GET['src']; //наш исходник
$height=$_GET['height']; //параметр высоты превью
$width=$_GET['width']; //параметр ширины превью
$rgb=0xffffff; //цвет заливки несоответствия
$size = getimagesize($source);//узнаем размеры картинки (дает нам масив size)
$format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1)); //определяем тип файла
$icfunc = "imagecreatefrom" . $format;   //определение функции соответственно типу файла
if (!function_exists($icfunc)) return false;  //если нет такой функции прекращаем работу скрипта
$x_ratio = $width / $size[0]; //пропорция ширины будущего превью
$y_ratio = $height / $size[1]; //пропорция высоты будущего превью
$ratio       = min($x_ratio, $y_ratio);
$use_x_ratio = ($x_ratio == $ratio); //соотношения ширины к высоте
$new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio); //ширина превью 
$new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio); //высота превью
$new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2); //расхождение с заданными параметрами по ширине
$new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2); //расхождение с заданными параметрами по высоте
$img = imagecreatetruecolor($width,$height); //создаем вспомогательное изображение пропорциональное превью
imagefill($img, 0, 0, $rgb); //заливаем его…
$photo = $icfunc($source); //достаем наш исходник
imagecopyresampled($img, $photo, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]); //копируем на него нашу превью с учетом расхождений
imagejpeg($img); //выводим результат (превью картинки)
// Очищаем память после выполнения скрипта
imagedestroy($img);
imagedestroy($photo);
?>


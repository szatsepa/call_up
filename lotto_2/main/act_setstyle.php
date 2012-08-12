<?php 

// Здесь осуществляются манипуляции с оформлением страниц 
// Аттрибут "st" определяет дизайн 

// Установим строку, которая будет дописываться к каждому URL 
$urladd        = "";
$css_style     = "style1.css";
$show_headfoot = "yes";

// Массив доступных стилей 
$starray = array(1, 2);

if (isset($attributes[st]) and in_array($attributes[st], $starray)) {

    $urladd        = "&amp;st=".$attributes[st];
    $css_style     = "style".$attributes[st].".css";
    $show_headfoot = "no";
}

// Чтобы мобильная версия показывалась
if (isset($attributes[mob])) {
	$urladd        = "&amp;mob=".$attributes[mob];
}
?>
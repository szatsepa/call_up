<?php
/*
Функция кодирует строку
используя  rand(0, 25); strlen($str)
*/
function rnd_Cod () {

	$bukoff_arr = array('a','s','d','f','g','h','j','k','l','q','w','e','r','t','y','u','i','o','p','z','x','c','v','b','n','m','Z','X','C','V','B','N','M','A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P');

	$string = '';

	for($i = 0;$i<6;$i++){

		$num = rand(0, 51);

		$string .= $bukoff_arr[$num];
	}


return $string;

}

?>
<?php
/*
Функция кодирует строку
используя хеш MD5, последние 16 цифр
*/

function md5name_1 ($input) {
    $string = md5($input);
    $string = substr ($string,-16);
return $string;}

	function md5name ($input0,$input1,$input2) {

	$bukoff_arr = array('a','s','d','f','g','h','j','k','l','q','w','e','r','t','y','u','i','o','p','z','x','c','v','b','n','m','Z','X','C','V','B','N','M','A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P');

	$string = $input0;

	$numr = rand(0, 51);

	for($i = strlen($input0);$i<6;$i++){

		$num = rand(0, 51);

		$string .= $bukoff_arr[$num];

		$bk = $bukoff_arr[$num];

	}

	$string .= $input1;

	for($i = strlen($input1);$i<6;$i++){

		$num = rand(0, 51);

		$string .= $bukoff_arr[$num];

		$bk = $bukoff_arr[$num];

	}

	$string .= $input2;

	for($i = strlen($input2);$i<6;$i++){

		$num = rand(0, 51);

		$string .= $bukoff_arr[$num];

		$bk = $bukoff_arr[$num];

	}


return $string;

}


?>
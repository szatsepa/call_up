<?php
/*
Функция кодирует строку
используя  rand(0, 25); strlen($str)
*/
function rnd_Cod () {

	$bukoff_arr = array('a','s','d','f','g','h','j','k','l','q','w','e','r','t','y','u','i','o','p','z','x','c','v','b','n','m','Z','X','C','V','B','N','M','A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P');

	$string = '';

	for($i = 0;$i<12;$i++){

		$num = rand(0, 51);

		$string .= $bukoff_arr[$num];

//		$bk = $bukoff_arr[$num];

	}


return $string;

}

function rnd_Store(){
    
    $query = "SELECT s.id FROM storefront AS s, storefront_data AS sdt WHERE s.id = sdt.storefront_id GROUP BY s.id";
    
    $result = mysql_query($query) or die ($query);
    
    $st_arr = array();
    
    while ($row = mysql_fetch_assoc($result)){
        
        array_push($st_arr, $row[id]);
        
    }
    
    $cnt = count($st_arr);
    
    $num = rand(0, $cnt);
    
    return $st_arr[$num];
}

?>
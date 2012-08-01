<?php

$bukvar     = array('А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Э','Ю','Я');
$bukvar_act = array();

// Воспользуемся имеющейся выборкой прайсов, чтобы получить имена компаний
if (mysql_numrows($qry_prices) > 0) {

    mysql_data_seek($qry_prices, 0);

}

// Обнулим массив, нет компаний с такой буквой
foreach ($bukvar as $key) {
	$bukvar_act[$key] = 0;
}

while ($row = mysql_fetch_assoc($qry_prices)) { 
	// Выводим только те компании, у которых загружен прайс-лист
	if ($row["creation"] != '') {
		$company_letter = substr(ucfirst($row["name"]),0,1);
    	// Учитываем только русские буквы
        if (in_array($company_letter,$bukvar)){
            $bukvar_act[$company_letter] = 1;
        }
	}
}

//print_r ($bukvar_act);

foreach ($bukvar_act as $key => $value) {
	if ($value == 1) {
		echo "<div align='center'><a href='index.php?act=bukva&amp;id=$key$urladd'>$key</a></div>";
	} else {
		echo "<div align='center'>$key</div>";
	}
}

/*    
    foreach ($taglist as $tag) {
        $tag = trim($tag);
        
    
        if ($tag == '') continue;
        
        if (array_key_exists($tag,$cloud )) {

            $cloud[$tag] = $cloud[$tag] + 1;
        } else {
            $cloud[$tag] =  1;
        }
        
    }
}
*/
?>
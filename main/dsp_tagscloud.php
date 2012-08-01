<?php

// Массив всех тегов
$cloud = array();

if (isset($attributes[act]) and $attributes[act] == 'rubrika'){
	$query_for_tags = $qry_rubrikaprices;
} else {
	$query_for_tags = $qry_prices;
}

while ($row = mysql_fetch_assoc($query_for_tags)) { 
    
    $price_id   = $row["id"];
    $rubrika_id = $row["rubrika"];
    $comment    = $row["comment"];
	$tags       = $row["tags"];
    
    $taglist = explode(",", $row["tags"]);
    
    foreach ($taglist as $tag) {
        $tag = trim($tag);
        
        // Пропускаем пустые значения
        if ($tag == '') continue;
        
        if (array_key_exists($tag,$cloud )) {
            // Учтем, сколько раз тег встречается в прайсах
            $cloud[$tag] = $cloud[$tag] + 1;
        } else {
            $cloud[$tag] =  1;
        }
        
    }
}

if (mysql_num_rows($query_for_tags) > 0) {
    mysql_data_seek($query_for_tags,0);
}

// Выводим теги для рубрики
if (isset($attributes[act]) and ($attributes[act] == 'rubrika' or $attributes[act] == 'alltags' or $attributes[act] == 'img_menu' or $attributes[act] == 'upload_zipimg')){
	
	// Выводим по алфавиту
	ksort($cloud);	
	$counter = 1;
	
	// Для меню картинок выводим выпадающий список тегов 
	if ($attributes[act] == 'img_menu' or $attributes[act] == 'upload_zipimg') {
	
		echo "<select name='tag' class='common'>";
		
		foreach ($cloud as $key => $value) {
		    
		    echo "<option value='".$key."'>".$key."</option> ";
		    
		    ++$counter;
		}
		
		echo "</select>";
	
	} else {
		
		// Просто ссылки
		foreach ($cloud as $key => $value) {
		    
		    echo "<a href='index.php?act=tag&amp;name=".$key.$urladd."' class='cloud'>".$key."</a> ";
		    
		    ++$counter;
		}
	}
} else {

	// Часто встречающиеся теги будут выводиться первыми
	arsort($cloud);
	
	// Не выводим облако в личном кабинете
	if ($attributes[act] != 'kabinet') {
	?>
	<div align="justify" style="margin-bottom:10px;"><?php 
		$counter = 1;
		foreach ($cloud as $key => $value) {
		 
		    if ($counter > 20) continue;
		    echo "<a href='index.php?act=tag&amp;name=".rawurlencode($key).$urladd."' class='cloud'>".$key."</a> ";
		    
		    ++$counter;
		}
		echo "<a href='index.php?act=alltags".$urladd."' class='cloud'>...</a> ";
	}	
?></div>
<?php } ?>
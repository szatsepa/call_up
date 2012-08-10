<?php 

// Вставка карточки товара (штрих-код)

$barcode       		= quote_smart(trim($attributes[barcode]));
$name          		= quote_smart(trim($attributes[name]));
$short_description	= quote_smart(trim($attributes[short_description]));
$ingridients   		= quote_smart(trim($attributes[ingridients]));
$specification 		= quote_smart(trim($attributes[specification]));
$gost 		   		= quote_smart(trim($attributes[gost]));
$nds =quote_smart(trim($attributes[nds]));


$query = "INSERT INTO goods 
				     (barcode, 
					  name,
					  short_description,
					  ingridients, 
					  specification, 
					  gost,
                                          nds) 
		  	  VALUES ($barcode, 
			  		  $name,
					  $short_description,
					  $ingridients, 
					  $specification, 
					  $gost,
                                          $nds)";
			  
$qry_tovaradd = mysql_query($query) or die($query);

//$javascript = "javascript:alert('Компания успешно добавлена');";

?>
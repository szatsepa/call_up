<?php 
// Список товаров (штрих-коды)

if (isset($attributes[barcode])) {

	$condition = "WHERE barcode=".$attributes[barcode];

} else {

	$condition = "";

}

$query = "SELECT barcode, 
				 name,
				 short_description,
				 ingridients, 
				 specification, 
				 gost,
                                 nds
			FROM goods ".
			$condition.
	"	ORDER BY barcode";

$qry_goods = mysql_query($query) or die($query);

?>
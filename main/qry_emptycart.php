<?php
/*
print_r ($user);
echo "<br>uid=".$user["id"]."<br>";
*/

if (isset($attributes[pricelist_id]) and $attributes[pricelist_id] > 0) {

    $pricelist_id = intval($attributes[pricelist_id]);
    
}

if (isset($pricelist_id)) {

	$quer = "DELETE FROM cart WHERE user_id=".$user["id"]." AND price_id=".$pricelist_id;
	$qry_emptycart = mysql_query($quer) or die($quer);
	
   
} 
?>
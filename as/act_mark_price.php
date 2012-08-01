<?php

/*
 * created by arcady1254 3.11.2011
 */
if(isset ($attributes[logo_btn])){

$query = "UPDATE price SET storefront = 1 WHERE id = $attributes[price_id]";

$act_marked = mysql_query($query) or die($query);

}

?>

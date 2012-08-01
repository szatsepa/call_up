<?php

/*
 * created by arcady.1254@gmail.com 16.11.2011
 */
function my_domen($id){

$query = "SELECT where_res, domen FROM storefront WHERE id = $id";

$result = mysql_query($query) or die($query);

$domen = array();

$domen = mysql_fetch_assoc($result);

mysql_free_result($result);

return $domen;

}
?>

<?php 

if (!isset($user["id"])) {
    $current_user = 0;
} else {
    $current_user = $user["id"];
}

if (!isset($attributes[pricelist_id])) {
	$pricelist_id = 0;
} else {
	$pricelist_id = intval($attributes[pricelist_id]);
}


$query = "SELECT a.str_code1,
		a.str_barcode,
                a.str_code2,
                a.str_name, 
                a.str_state,
                a.str_volume, 
                a.str_package,
                a.num_price_single,
                a.num_price_pack,
                b.num_amount,
                b.num_discount,
                a.id,
                a.pricelist_id,
                p.company_id,
                c.name AS company_name,
                b.parent_zakaz,
                p.zakaz_limit,
                gp.id AS imagin
         FROM pricelist a, cart b, price p,companies c, goods_pic gp
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
           AND p.company_id=c.id
           AND gp.barcode = a.str_barcode
           AND b.user_id=$current_user
           AND a.pricelist_id=$pricelist_id 
           AND a.str_code2 <> 'X'
         ORDER BY p.id";

//us.surname,AND b.cod = us.cod, customer us  us.surname
           
                
$qry_cart = mysql_query($query) or die($query);


if (mysql_num_rows($qry_cart) > 0) {

	
	$price_id = $pricelist_id;
	
	
	// id компании, которой принадлежит прайс
	$price_company_id = mysql_result($qry_cart,0,"company_id");
	
	$query_i = "SELECT inn,
				   	   contragent
				  FROM companies
				 WHERE id = $price_company_id";
	
	$qry_inn = mysql_query($query_i) or die($query_i);
	
	$attributes[contragent_id]   = mysql_result($qry_inn,0,"inn");
	$attributes[contragent_name] = htmlspecialchars(mysql_result($qry_inn,0,"contragent"));
	
	//echo $torgovy_id; exit;
	mysql_data_seek($qry_cart,0);
} else {
	$price_id = '';
}
 

$query = "SELECT MAX(id) FROM cart";
$qry_id = mysql_query($query) or die($query);

?>
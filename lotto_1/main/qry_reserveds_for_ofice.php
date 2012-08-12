<?php 

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}


$storefront_id = quote_smart($attributes[stid]);


if(isset ($_SESSION[auth]) && $_SESSION[auth] != 0){
    
$qwery = "SELECT r.price_id, p.company_id FROM reserved_items AS r, price AS p WHERE r.price_id = $price_id AND r.$who = $user_id";

$result = mysql_query($qwery) or die($qwery);

$reserveds_arr = array();


$contragents_arr = array();

$step = 0;

while ($row = mysql_fetch_assoc($result)){
   // id компании, которой принадлежит прайс
	$price_company_id = $row[company_id]; 
    
}
    
    
$query = "SELECT a.str_code1,
		a.str_barcode,
                a.str_code2,
                a.str_name, 
                a.str_state,
                a.str_volume, 
                a.str_package,
                a.num_price_single,
                b.num_amount,
                b.num_discount
         FROM pricelist a, reserved_items b, price p,companies c, goods_pic gp
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
           AND p.company_id=c.id
    AND gp.pictype = 1
           AND gp.barcode = a.str_barcode
           AND b.$who=$user_id
           AND a.pricelist_id=$price_id  
           AND a.str_code2 <> 'X'
         ORDER BY p.id"; 

//us.surname,AND b.cod = us.cod, customer us  us.surname
                
$qry_cart = mysql_query($query) or die($query);

while ($rows = mysql_fetch_assoc($qry_cart)){
    
        array_push($reserveds_arr, $rows);
        

}


if (count($reserveds_arr) > 0) {

	
	
	
	
	$query_i = "SELECT inn,contragent
				  FROM companies
				 WHERE id = $price_company_id";
	
	$qry_inn = mysql_query($query_i) or die($query_i);
	
	$contragent_id   = mysql_result($qry_inn,0,"inn");
	$contragent_name = htmlspecialchars(mysql_result($qry_inn,0,"contragent"));
        
        $tmp_arr = array("contragent_id"=>$contragent_id, "contragent_name"=>$contragent_name);

        array_push($contragents_arr, $tmp_arr);
        
        unset ($contragent_id);
        unset ($contragent_name);
        unset ($tmp_arr);
        
}



}
        
$query = "SELECT MAX(id) FROM cart";
$qry_id = mysql_query($query) or die($query);

?>
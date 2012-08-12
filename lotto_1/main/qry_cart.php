<?php 

$user_id = $_SESSION[user]->data[id];

if(isset ($_SESSION[user]) && $_SESSION[auth] == 1){
    
    $field = "user_id";
    
}else if(isset ($_SESSION[user]) && $_SESSION[auth] == 2){
    
    $field = "customer";
    
    
}

$prices_arr = array();

$cart_list_arr = array();

$secret_key = quote_smart($attributes[cod]);

$ip = quote_smart($_SERVER["REMOTE_ADDR"]);

if(!isset ($_SESSION[user])){

$query = "SELECT a.str_code1,
                    a.str_name, 
                    a.str_volume, 
                    a.num_price_single,
                    b.num_amount,
                    b.num_discount,
                    a.id,
                    p.comment,
                    p.company_id,
                    c.name AS company_name,
                    gp.id AS imagin,
    a.pricelist_id AS price_id
             FROM pricelist a, cart b, price p,companies c, goods_pic gp
             WHERE a.str_code1 = b.artikul
               AND a.pricelist_id = b.price_id
    AND a.pricelist_id = p.id
               AND p.company_id=c.id
               AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
               AND b.cod=$secret_key
               AND a.str_code2 <> 'X'
             ORDER BY b.id";

}  else {
    
    $query = "SELECT a.str_code1,
		a.str_name, 
                a.str_volume, 
                a.num_price_single,
                b.num_amount,
                b.num_discount,
                a.id,
                p.comment,
                p.company_id,
                c.name AS company_name,
		gp.id AS imagin,
    a.pricelist_id AS price_id
         FROM pricelist a, cart b, price p,companies c, goods_pic gp
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
    AND p.company_id=c.id
           AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
           AND b.$field=$user_id
           AND a.str_code2 <> 'X'
         ORDER BY b.id";
    
}

  $qry_cart = mysql_query($query) or die($query);
    
    while ($rows = mysql_fetch_assoc($qry_cart)){
        
        $rows[status]="В корзине";
        
        array_push($cart_list_arr, $rows);
        
    }
    
    mysql_free_result($qry_cart);
    
if(!isset ($_SESSION[user])){

$query = "SELECT a.str_code1,
                    a.str_name, 
                    a.str_volume, 
                    a.num_price_single,
                    b.num_amount,
                    b.num_discount,
                    a.id,
                    p.comment,
                    p.company_id,
                    c.name AS company_name,
                    gp.id AS imagin,
    a.pricelist_id AS price_id
             FROM pricelist a, reserved_items b, price p,companies c, goods_pic gp
             WHERE a.str_code1 = b.artikul
               AND a.pricelist_id = b.price_id
     AND a.pricelist_id = p.id
               AND p.company_id=c.id
               AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
               AND b.cod=$secret_key
               AND a.str_code2 <> 'X'
             ORDER BY b.id";

}  else {
    
    $query = "SELECT a.str_code1,
		a.str_name, 
                a.str_volume, 
                a.num_price_single,
                b.num_amount,
                b.num_discount,
                a.id,
                p.comment,
                p.company_id,
                c.name AS company_name,
		gp.id AS imagin,
    a.pricelist_id AS price_id
         FROM pricelist a, reserved_items b, price p,companies c, goods_pic gp
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
    AND p.company_id=c.id
           AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
           AND b.$field=$user_id
           AND a.str_code2 <> 'X'
         ORDER BY b.id";
    
}  

$qry_cart = mysql_query($query) or die($query);
    
    while ($rows = mysql_fetch_assoc($qry_cart)){
        
        $rows[status]="Отложен";
        
        array_push($cart_list_arr, $rows);
        
    }
 
    array_push($prices_arr, $cart_list_arr);
    
if (mysql_num_rows($qry_cart) > 0) {

	// id компании, которой принадлежит прайс
	$price_company_id = mysql_result($qry_cart,0,"company_id");
	
        $query_i = "SELECT inn,
                            contragent
                      FROM companies
                     WHERE id = $price_company_id";
	
	$qry_inn = mysql_query($query_i) or die($query_i);
	
	$contragent_id   = mysql_result($qry_inn,0,"inn");
	$contragent_name = htmlspecialchars(mysql_result($qry_inn,0,"contragent"));
	
	//echo $torgovy_id; exit;
	mysql_data_seek($qry_cart,0);
} else {
	$price_id = '';
}



$query = "SELECT MAX(id) FROM cart";

$qry_id = mysql_query($query) or die($query);

$row = mysql_fetch_row($qry_id);

$max_id = $row[0];

$cnt = count($cart_list_arr);

 mysql_free_result($qry_cart);
 
 if($cnt == 0){
     
     if(!isset ($attributes[cod]) or $attributes[cod] == ''){
         $str_attr = "&stid=$attributes[stid]";
     }  else {
         $str_attr = "&stid=$attributes[stid]&cod=$attributes[cod]";
     }

?>
<script language="javascript">
    window.location.href = "index.php?act=look<?php echo $str_attr;?>";
 </script>
 <?php } ?>

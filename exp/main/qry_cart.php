<?php 

$user_id = $_SESSION[id];

$prices_arr = array();

$cart_list_arr = array();
 
    $query = "SELECT a.str_code1,
		a.str_name,
                b.id,
		gp.id AS imagin,
                a.pricelist_id AS price_id
         FROM pricelist a, cart b, price p,companies c, goods_pic gp,storefront_data std
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
AND std.price_id =p.id AND std.storefront_id = $_SESSION[st]
    AND p.company_id=c.id
           AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
           AND b.customer=$user_id
           AND a.str_code2 <> 'X'
         ORDER BY b.id";


  $qry_cart = mysql_query($query) or die($query);
    
    while ($rows = mysql_fetch_assoc($qry_cart)){
        
        $rows[status]="В корзине";
        
        array_push($cart_list_arr, $rows);
        
    }
 
array_push($prices_arr, $cart_list_arr);

$cnt = count($cart_list_arr);

 mysql_free_result($qry_cart);
 
 if($cnt == 0){  
 ?>
<script type="text/javascript">
    window.location.href = "index.php?act=look&stid=2";
</script>
 <?php } ?>

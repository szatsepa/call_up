<?php

/*
 * created by arcady1254 1.11.2011
 */
$customer_id = intval($attributes[id]);

$query = "DELETE FROM customer WHERE id = $customer_id";

$qry_customer_delete = mysql_query($query) or die($query);

if($qry_customer_delete){
    
     $query = "DELETE FROM arch_zakaz WHERE customer = $customer_id";

     $qry_clear_orders = mysql_query($query) or die($query); 
    
    if($qry_clear_order){
        
        $query = "DELETE FROM cart WHERE customer = $customer_id";

        $qry_clear_cart = mysql_query($query);
        
        $query_reserved = "DELETE FROM reserved_items WHERE customer = $customer_id";

        $qry_clear_reserved = mysql_query($query_reserved);
        
        mysql_query("DELETE FROM message_read  WHERE customer = $customer_id");
        
        mysql_query("DELETE FROM kabinet WHERE customer = $customer_id");
        
        mysql_query("DELETE FROM favorites WHERE customer = $customer_id");
    }
}

?>

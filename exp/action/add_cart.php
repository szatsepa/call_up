<?php
include 'connect.php';

$out = array('ok'=>NULL);
        
$uid = intval($_POST[uid]);

$pid = intval($_POST[pid]);

$artikul = $_POST[artikul];

if(isset($_POST[itid])){
    
    $item_id = $_POST[itid];
    
    $query   = "UPDATE cart 
                    SET artikul = '$artikul'
                    WHERE id    = $item_id";
}else{
    $query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           artikul,
		           price_id,
		           time,
                           customer) 
		          VALUES 
		          (1,
		           0,
		           '$artikul',
		           $pid,
		           now(),
                           $uid)";
}

$result = mysql_query($query);

if($result)$out['ok'] = 1;
	
// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

mysql_query("DELETE FROM cart WHERE num_amount = 0");

echo json_encode($out);
       
mysql_close();       
?>

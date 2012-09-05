<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$out = array('ok'=>NULL);

$id = intval($_POST[id]);

$pid = intval($_POST[pid]);

$uid = intval($_POST[uid]);

$resolution = $_POST[resolution];

$shipment = $_POST[shipment];

$desire = $_POST[desire];

$mark = $_POST[mark];

$exe_time = $_POST[exe_time];

$query = "SELECT * FROM tickets WHERE id = $id";

$result = mysql_query($query);

$var = mysql_fetch_assoc($result);

$str_A = $var[field_A];

$str_B = $var[field_B];

$str_C = $var[field_C];

$uid = $var[customer];

$num_order = $var[num_order];

$A_array = explode(':',$str_A);

$B_array = explode(':',$str_B);

$C_array = explode(':',$str_C);

$ip = $_SERVER['REMOTE_ADDR'];

$agent = $_SERVER["HTTP_USER_AGENT"];

$query = "INSERT INTO arch_zakaz (customer,email,shipment,comments,ip,resolution,agent,tags,c_number) VALUES ($uid,'$email','$shipment','$desire','$ip','$resolution','$agent','$mark','$num_order')";

mysql_query($query);

$id_order = mysql_insert_id();

$out['simbls'] = array_merge($A_array,$B_array,$C_array);

$num_rows = 0; 

if(mysql_insert_id()){
    foreach ($out['simbls'] as $value) {
        $query = "INSERT INTO arch_goods (`zakaz`, `customer`, `artikul`, `price_id`, `amount`, `discount`, `name`, `price_single`)
                                    VALUES 
                                    ($id_order,$uid,'$value',$pid,1,0,(SELECT str_name FROM pricelist WHERE str_code1 = '$value'),(SELECT num_price_single FROM pricelist WHERE str_code1 = '$value'))";
        
        mysql_query($query);
        
        $num_rows++;
    }
}

$out['ok']=$num_rows;

$query = "DELETE FROM tickets WHERE id = $id";

mysql_query($query); 

echo json_encode($out);

mysql_close();
?>

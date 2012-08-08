<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$id = intval($_POST[uid]);

$shipment = $_POST[shipment];

$comment = $_POST[comment];

$resolution = $_POST[resolution];

$email = $_POST[email];

$A = $_POST[A];

$B = $_POST[B];

$C = $_POST[C];

$artikul_arr = array($A,$B,$C);

$ip=$_SERVER['REMOTE_ADDR'];

$agent = $_SERVER["HTTP_USER_AGENT"];

$query = "INSERT INTO arch_zakaz (customer,email,shipment,comments,ip,resolution,agent)
                          VALUES ($id,'$email','$shipment','$comment', '$ip','$resolution','$agent')";

mysql_query($query);

$iid = mysql_insert_id();

$out = array('ok'=>NULL);

//$str = '';

for($i=0;$i<3;$i++){
    $query = "INSERT INTO arch_goods (zakaz, customer,artikul,price_id,name)
                        VALUES
                        ($iid,$id,'$artikul_arr[$i]',27,'Лото')";
    mysql_query($query);
    
//    $str .= '/'.$query;
}

//$out['query'] = $str;

if($iid>0){
    $out['ok']=1;
}

echo json_encode($out);

mysql_close();

?>

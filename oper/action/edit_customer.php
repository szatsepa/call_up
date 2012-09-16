<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php'; 

//uid:cuid,surname:surname,name:name,patronymic:patronymic,email:email,phone:phone,shipping:shipping,desire:desire

$uid = intval($_POST[uid]);

$surname = $_POST[surname];

$name = $_POST[name];

$patronymic = $_POST[patronymic];

$email = $_POST[email];

$phone = $_POST[phone];

$shipping_address = $_POST[shipping];

$desire = $_POST[desire];

$query = "UPDATE `customer` SET `surname`='$surname', `name`='$name', `patronymic`='$patronymic', `phone`='$phone', `e_mail`='$email', `shipping_address`='$shipping_address', `desire`='$desire' WHERE `id`=$uid";


mysql_query($query);

$aff = mysql_affected_rows();

$out = array('customer' => NULL);

if($aff){
   $out['customer'] = $_POST;
}

echo json_encode($out);

mysql_close();
?>

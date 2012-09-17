<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../query/connect.php'; 

$uid = intval($_POST[uid]);

$query = "SELECT surname, name, e_mail, secret_key FROM customer WHERE id = $uid";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);

$message ="Здравствуйте $row[surname] $row[name]! Вы зарегистрировались на сайте $_SERVER[SERVER_NAME]. Ваш индивидуальный ключ - $row[secret_key].\n C уважением. Администрация. ";              
             
$headers = 'From: administrator@'. $_SERVER[SERVER_NAME]. "\r\n";

$headers  .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

$out = array('msg'=>NULL);

if (mail($row[e_mail], 'Пароль к call-up.ru', $message, $headers)){
    
    $out['msg'] = 1;

}

echo json_encode($out);

mysql_close();
?>

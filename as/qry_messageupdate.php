<?php
//echo "--".$attributes[status]."--";

if (isset($attributes[status]) and $attributes[status] == 1) {
    $status = 1;
} else {
    $status = 0;
}

$attributes[id] = intval($attributes[id]);
$attributes[role] = intval($attributes[role]);

$message = $attributes[message];
$message = trim($message);
$resurs = $attributes[resurs];
$resurs = quote_smart($resurs);

if (strlen($message) > 255) {
    substr($message, 0, 255);
}

$query = "UPDATE messages 
			SET time    = now(),
				role    = $attributes[role],
                message = '$message',
                status  = $status,
resurs=$resurs
			WHERE id    = $attributes[id]";
			
$qry_messageupdate = mysql_query($query) or die($query);

$query = "DELETE FROM message_read WHERE message_id = $attributes[id]";

$result = mysql_query($query) or die($query);

$query = "SELECT  surname, name, email FROM users WHERE role <> 2 GROUP BY email";

$result = mysql_query($query) or die($query);

$mail_arr = array();

while ($var = mysql_fetch_assoc($result)){
    
    array_push($mail_arr, $var);
    
}

$query = "SELECT surname, name, e_mail AS email FROM customer GROUP BY e_mail";

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    
    array_push($mail_arr, $var);
    
}

mysql_free_result($result);

foreach ($mail_arr as $value) {
    
            $mes ="Здравствуйте $value[surname] $value[name]! Опубликовано новое сообщение:\n -\t $message \n C уважением. Администрация. ";              
            
            $header="From: \"Администратор\" <administrator@". $_SERVER[SERVER_NAME]. ">\r\n";
            
            $header  .= 'MIME-Version: 1.0' . "\r\n"; 
            
            $header .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
        
            mail($value[email], 'Новое сообщение от shop-animals.ru', $mes, $header);
    
}
?>
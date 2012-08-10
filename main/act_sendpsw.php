<?php

/*
 * created by arcady.1254@gmail.com 1.11.2011
 */

header('Content-Type: text/html; charset=utf-8');  

if (isset($attributes[id])) {

	$id = intval(substr($attributes[id],1));
           
         $query = "SELECT *
              FROM customer AS cu
              WHERE cu.id=$id";


$qry_user = mysql_query($query) or die($query);

$user_check = mysql_fetch_assoc($qry_user);
	

$to  = $user_check["e_mail"].",7905415@mail.ru";

// subject
	$subject = 'Напоминание для пользователя '.$user_check["surname"]." ".$user_check["name"];
	
	// message
	$message = "Пароль пользователя ".$user_check["surname"]." ".$user_check["name"].": ".$user_check["secret_key"];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
	
	
	
	
	// Additional headers
	$headers .= 'From: noreply@shop.animals-food.ru \r\n';
	
		
	// Mail it
	mail($to, $subject, $message, $headers);

}
?>
<script type="text/javascript">
	alert ('Пароль пользователя <?php echo $user_check["surname"];?> выслан на Ваш e-mail.');
</script>

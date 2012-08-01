<?php 
header('Content-Type: text/html; charset=utf-8');  

if (isset($attributes[id])) {

	$id = intval(substr($attributes[id],1));
	
	$user_check = query_user($id);
	
	$to  = $user["email"].",7905415@mail.ru";

	// subject
	$subject = 'Напоминание для пользователя '.$user_check["surname"]." ".$user_check["name"];
	
	// message
	$message = "Пароль пользователя ".$user_check["surname"]." ".$user_check["name"].": ".$user_check["pwd"];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
	
	
	
	
	// Additional headers
	$headers .= 'From: noreply@shop.animals-food.ru \r\n';
	
	//if ($environment == "pro") {
	
		//$headers .= "Bcc: 7905415@mail.ru,djv57@yandex.ru"."\r\n";
	
	//}
	
	// Mail it
	mail($to, $subject, $message, $headers);

}
?>
<script type="text/javascript">
	alert ('Пароль пользователя <?php echo $user_check["surname"];?> выслан на Ваш e-mail.');
</script>
<?php 

$company_name = mysql_result($qry_cart,0,"company_name");


$to  = 'operator@shop.animals-food.ru';

// subject
$subject = 'Заявка на заключение договора от пользователя '.$user["surname"]." ".$user["name"];

// message
$message = 'Клиент '.$user[surname].' '.$user[name].' из компании "'.$user[company_name].'" пожелал заключить договор с компанией "'.$company_name.'" на приобретение товаров из прайса.';



// Additional headers
$headers  = "Content-type: text/plain; charset=utf-8 \r\n"; 
$headers .= 'From: '. $user["email"] . "\r\n";
$headers .= 'Bcc: djv57@yandex.ru,7905415@mail.ru' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Заявка отправлена</title>
</head>
<body>
<H2>Заявка на заключение договора отправлена</H2>
<p align="center" onClick="window.close();"><button>Закрыть окно</button></p>
</body>
</html>




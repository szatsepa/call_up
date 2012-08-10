<?php
// To do сделать проверку полученных данных перед отправкой письма.


$to  = 'operator@shop.animals-food.ru';

// subject
$subject = 'Сообщение от пользователя '.$user["surname"]." ".$user["name"];

// message
$message = $attributes[comments];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

// Additional headers
$headers .= 'From: '. $user["email"] . "\r\n";
$headers .= 'Bcc: djv57@yandex.ru, 7905415@mail.ru' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

$javascript = "javascript:alert('Письмо отправлено.');";

 ?>
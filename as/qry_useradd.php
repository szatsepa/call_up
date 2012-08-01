<?php


$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $numChars = strlen($chars);
  $pwd = '';
  for ($i = 0; $i < 8; $i++) {
    $pwd .= substr($chars, rand(1, $numChars) - 1, 1);
  }

$attributes[surname] = quote_smart($attributes[surname]);
$attributes[name] = quote_smart($attributes[name]);
$attributes[patronymic] = quote_smart($attributes[patronymic]);
$attributes[company_id] = intval($attributes[company_id]);
$attributes[role] = intval($attributes[role]);
$attributes[email] = quote_smart($attributes[email]);
$attributes[phone] = quote_smart($attributes[phone]);
$attributes[role] = intval($attributes[role]);
$attributes[default_company] = intval($attributes[default_company]);

  
if ($attributes[role] > 0 ) {

	$query = "";
	$result = mysql_query("SELECT name FROM roles WHERE id = $attributes[role]")
            or die("Could not query: " . mysql_error());
	$role_name = mysql_result($result,0);
}


$query = "INSERT INTO users 
			(role,
			 surname,
			 name,
			 patronymic,
			 email,
			 phone,
			 company_id,
			 pwd,
			 creation,
			 time,
			 user_id,
			 status,
             expiration,
			 default_company) 
			VALUES 
  			($attributes[role],
			 $attributes[surname],
			 $attributes[name],
			 $attributes[patronymic],
			 $attributes[email],
			 $attributes[phone],
			 $attributes[company_id],
			 '$pwd',
			  now(),
			  now(),".
			  $user['id'].",
			  1,
              now() + INTERVAL 1 YEAR,
			  $attributes[default_company])";
$qry_useradd = mysql_query($query) or die($query);


//
// Отправим письмо пользователю
//

$to  = $attributes[email];

$attributes[name] = str_replace("'","",$attributes[name]);
$attributes[surname] = str_replace("'","",$attributes[surname]);

// subject
$subject = $attributes[name].' '.$attributes[surname].', добро пожаловать в систему shop.animals-food.ru';

// message
$message  = 'Уважаемый '.$attributes[name]." ".$attributes[surname].", \r\n\r\n";
$message .= "Поздравляем с регистарцией в системе shop.animals-food.ru\r\n";
$message .= "Ваш пароль: ";
$message .= $pwd;
$message .= "\r\n";
$message .= "Ваша роль в системе: ".$role_name;
$message .= "\r\n\r\n";
$message .= "-------------------";
$message .= "\r\n";
$message .= "Администрация сайта";


// Additional headers

$headers  = "Content-type: text/plain; charset=utf-8 \r\n"; 
$headers .= "From: noreply@shop.animals-food.ru\r\n";
$headers .= "Bcc: djv57@yandex.ru, operator@shop.animals-food"."\r\n";

// Mail it
mail($to, $subject, $message, $headers);


$javascript = "javascript:alert('Пользователь успешно добавлен');";

?>
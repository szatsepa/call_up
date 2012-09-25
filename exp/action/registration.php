<?php
include 'connect.php';

$ip = $_SERVER["REMOTE_ADDR"];

$str_date = date("ymdH");

$surname = $_POST[surname];

$name = $_POST[name];

$patronymic = $_POST[patronymic];

$phone = "$_POST[phone]";

$email = $_POST[email];

$phone = $_POST[phone];

if(strlen($phone)>4)$phone = substr ($phone, 0, 4);

$secret_key = "$str_date$phone";

$storefront = "2";

$query = "SELECT Count(id) FROM customer WHERE secret_key = '$secret_key'";

$count = mysql_query($query) or die ($query);

$nk_log = mysql_fetch_row($count);

$nk = $nk_log[0];

if($nk != 0){
    
    $secret_key = substr($secret_key, 0,11).rand(1, 9);
    
}

if(strlen($secret_key)<12)$secret_key .= rand (0, 9);


    
$query = "SELECT Count(id) FROM customer WHERE registration_ip = '$ip'";

$count_ip = mysql_query($query);

$is_ip = mysql_fetch_row($count_ip);

$isip = $is_ip[0];

$out = array('ip'=>NULL);

if($isip != 0){
    $out['ip']=1;
}
    
if($isip == 0){
    
    $query = "INSERT INTO customer (surname,
                            name,
                            patronymic,
                            phone,
                            e_mail,
                            secret_key,
                            registration_ip,
                            storefront)
                    VALUES
                            ('$surname',
                            '$name',
                            '$patronymic',
                            '$phone',
                            '$email',
                            '$secret_key',
                            '$ip',
                                $storefront)";                              
                                     
mysql_query($query);

//$out['query1']=$query;
        
if (mysql_insert_id() != 0) {
        
            $message ="Здравствуйте $_POST[surname] $_POST[name]! Вы зарегистрировались на сайте call-up.ru. Ваш индивидуальный ключ - '$secret_key'.\n C уважением. Администрация. ";              
             
            $headers = 'From: administrator@'. $_SERVER[SERVER_NAME]. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
        
            mail($email, 'Регистрация на call-up.ru', $message, $headers); 
            
            $out['ok']=1;
            
            $out['mail']=$email;
    }
}
mysql_close();

echo json_encode($out);
?>
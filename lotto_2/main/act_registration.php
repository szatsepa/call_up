<?php
$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

$bukoff_arr = array('a','s','d','f','g','h','j','k','l','q','w','e','r','t','y','u','i','o','p','z','x','c','v','b','n','m','Z','X','C','V','B','N','M','A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P');

$string = '';

$numr = rand(0, 51);

for($i = 0;$i<4;$i++){

            $num = rand(0, 51);

            $string .= $bukoff_arr[$num];

	}

$str_date = date(y).date(m).date(d).date(H);

$key = $attributes[cod];

$key = quote_smart($key);

$surname = quote_smart($attributes[surname]);

$name = quote_smart($attributes[name]);

$patronymic = quote_smart($attributes[patronymic]);

$desire = quote_smart($attributes[desire]);

$phone = "$attributes[phone]";

$e_mail = quote_smart($attributes[e_mail]);

$address = quote_smart($attributes[adress]);

$str_phone = "$attributes[phone]";

if(strlen($str_phone)>4)$str_phone = substr ($str_phone, 0, 4);

$secret_key = "$str_date$str_phone";

//$secret_key = $string.'_'.$attributes[phone];

$msg_key = $secret_key;

$storefront = quote_smart($attributes[stid]);

$secret_key = quote_smart($secret_key);

$query = "SELECT Count(id) FROM customer WHERE cod = $key";

$count = mysql_query($query) or die ($query);

$is_log = mysql_fetch_row($count);

$log = $is_log[0];

if($log == 0){
    
    $log = 0;

$query = "SELECT Count(id) FROM customer WHERE secret_key = $secret_key";

$count = mysql_query($query) or die ($query);

$nk_log = mysql_fetch_row($count);

$nk = $nk_log[0];

if($nk != 0){
    
    $secret_key = substr($secret_key, 0,11).rand(1, 9);
    
}

if(strlen($secret_key)<12)$secret_key .= rand (0, 9);


    
    $query = "SELECT Count(id) FROM customer WHERE registration_ip = $ip";
    
    $count_ip = mysql_query($query) or die ($qyery);
    
    $is_ip = mysql_fetch_row($count_ip);
    
    $isip = $is_ip[0];
    
    if($isip == 0){
        
        
        $query = "INSERT INTO customer (surname,
                               name,
                               patronymic,
                               phone,
                               e_mail,
                               cod,
                                secret_key,
                                registration_ip,
                                storefront)
                        VALUES
                                ($surname,
                                $name,
                                $patronymic,
                                $phone,
                                $e_mail,
                                $key,
                               $secret_key,
                                $ip,
                                $storefront)";

//   shipping_address, desire, $address,$desire,
                                
                                
                                     
        $regs = mysql_query($query) or die($query);
        
        $user_id=mysql_insert_id();
        
        if (mysql_affected_rows() != 0) {
            
                   $_SESSION[id] = mysql_insert_id();

                   $_SESSION[auth] = 2;
     
      
        
            $message ="Здравствуйте $attributes[surname] $attributes[name]! Вы зарегистрировались на сайте $_SERVER[SERVER_NAME]. Ваш индивидуальный ключ - $msg_key.\n C уважением. Администрация. ";              
             
             $headers = 'From: administrator@'. $_SERVER[SERVER_NAME]. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
        
             if (mail($attributes[e_mail], 'Регистрация на shop-animals.ru', $message, $headers)){
                
                 $query = "UPDATE cart SET cod = $secret_key,user_id = 0, customer = $_SESSION[id] WHERE cod = $key";
                 
                 $result = mysql_query($query) or die ($query);
                 
                 $query = "UPDATE reserved_items SET cod = $secret_key,user_id = 0, customer = $_SESSION[id] WHERE cod = $key";
                 
                 $result = mysql_query($query) or die ($query);
                 
                 
  $_SESSION[auth] = 2;                    

                      
                         ?>
 <form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="reg" type="hidden" value="1"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="user_id" type="hidden" value="<?php echo $user_id;?>"></form>');
    document.forms[0].submit();
    </script>
<?php

                         
                     
                 }
          
        }
        
        
    }else{
?>
     <form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="reg" type="hidden" value="11"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>
    <?php
 }
}else{
    ?>
     <form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="reg" type="hidden" value="10"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>  
    <?php
 
}

?>

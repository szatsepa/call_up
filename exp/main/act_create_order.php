<?php

unset($_SESSION[page]);

if(isset ($_SESSION[auth]) && $_SESSION[auth] == 1){
    
    $who = "user_id";
    
}else if(isset ($_SESSION[auth]) && $_SESSION[auth] == 2){
    
    $who = "customer";
    
}

$stid = intval($attributes[stid]);

$id = $_SESSION[user]->data[id];

$eml = $_SESSION[user]->data[email];

$price_id = quote_smart($attributes[price_id]);

$shipment = quote_smart($attributes[adress]);

$comment = quote_smart($attributes[desire]);

$tags = quote_smart($attributes[mark]);

$c_num = numOrder();

// Соберем статистику о пользователе

$ip = $_SERVER['REMOTE_ADDR'];

$ip = quote_smart($ip);

$agent = quote_smart($_SERVER["HTTP_USER_AGENT"]);

// Время отсроченного заказа
// Проверок здесь нет из-за демонстрационных целей
// 
 $exe_time = '';

if ($attributes[day] != '' and $attributes[mon] != '' and $attributes[year] != '') {

	$exe_time = $attributes[year]."-".$attributes[mon]."-".$attributes[day];
	
	if ($attributes[hh] != '' and $attributes[mm] != '') {
	
		$exe_time .= " ".$attributes[hh].":".$attributes[mm].":00"; 
	
	} else {
	
		$exe_time .= " 00:00:00";
	
	}
	
}

$status = 1;

$exe_time = quote_smart($exe_time);

$resolution = "$attributes[scr_width]x$attributes[scr_height]";

$resolution = quote_smart($resolution);


//echo "<br>$id >> $eml >> $who<br>";
// NULLIF('$exe_time',''),

$query = "INSERT INTO arch_zakaz 
          ($who,
           exe_time,
           email,
           status,
           shipment,
           comments,
           ip,
           resolution,
           agent,
           tags,
            c_number) 
          VALUES 
          ($id,
          $exe_time,
           '$eml',
          $status,
          $shipment,
          $comment,
          $ip,
          $resolution,
          $agent,
          $tags,
        $c_num)";

$qry_add = mysql_query($query) or die($query);


$zakaz = mysql_insert_id();

$query1 = "INSERT INTO arch_goods 
          (zakaz,
           $who,
           artikul,
           price_id,
           amount,
           discount,
           name,
           price_single) 
          SELECT $zakaz,
                 $id,
                 c.artikul,
                 c.price_id,
                 c.num_amount,
                 c.num_discount,
                 p.str_name,
                 p.num_price_single 
          FROM cart c, pricelist p 
          WHERE p.str_code1    = c.artikul 
            AND p.pricelist_id = c.price_id 
            AND c.price_id     = $price_id  
            AND c.$who      = $id AND 
			p.str_code2 <> 'X'";

$qry_add = mysql_query($query1) or die($query1);


// Внесем информацию и в историю заказа
$query2 = "INSERT INTO zakaz_history 
                       (id,
                       time,
                       status,
                       $who)
              VALUES 
                    ($zakaz,
                     now(),
                     $status,
                     $id)";
                             
$qry_zakazhistory = mysql_query($query2) or die($query2);



$quer = "DELETE FROM cart WHERE $who=$id AND price_id=$price_id";

	$qry_emptycart = mysql_query($quer) or die($quer);


if ($zakaz) {
            
     
      $surname = $_SESSION[user]->data[surname];
      
      $name = $_SESSION[user]->data[name];
              
            $message ="Здравствуйте $surname $name! Ваш заказ № $zakaz  принят в обработку. С вами свяжется оператор .\n C уважением. Администрация. ";              
 
            $headers = 'From: administrator@'. $_SERVER[SERVER_NAME]. "\r\n";
            
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
        
             if (mail($eml, 'Заказ', $message, $headers)){ }
 
 header("location:index.php?act=look&stid=$stid");             
                
             ?>
<!--                
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $stid;?>"/></form>');
    document.forms[0].submit();
    </script>-->
                           
            <?php 
             
}
function numOrder(){
    $str = '';
    for($i=0;$i<6;$i++){
        $tmp = rand(0,9);
        $str .= "$tmp";
    }
    
    return $str;
}
?>

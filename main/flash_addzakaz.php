<?php

include("flash_connect.php");

include("flash_quotesmart.php");

$arg = quote_smart($_POST['arg']);

$price_id = quote_smart($_POST['pricelist_id']);

$contragent_id =quote_smart($_POST['contragent_id']);

$contragent_name = quote_smart($_POST['contragent_name']);

$email = quote_smart($_POST['email']);

$shipment = quote_smart($_POST['shipment']);

$comments = quote_smart($_POST['comments']);

$tag = quote_smart($_POST['tag']);

$status = quote_smart($_POST['role']);

// Соберем статистику о пользователе
$ip         = $_SERVER["REMOTE_ADDR"];
//$resolution = $attributes[scr_width]."x".$attributes[scr_height];
$agent      = $_SERVER["HTTP_USER_AGENT"];//quote_smart()quote_smart(//)


if(!isset($_POST['tag'])){

	//$hers = "NO TAG";
$query = "INSERT INTO arch_zakaz 
          (user_id,
           time,
		   exe_time,
           contragent_id,
           contragent_name,
           email,
           shipment,
           comments,
           status,
		   ip,
		   agent) 
          VALUES 
          ($arg,
           now(),
		   now(),
          $contragent_id,
          (SELECT `name` FROM `companies` WHERE `id`=$contragent_id),
          $email,
          $shipment,
          $comments,
          1,
		  '$ip',
		 '$agent')";
}else{
	//$hers = "TAG";
$query = "INSERT INTO arch_zakaz 
          (user_id,
           time,
		   exe_time,
           contragent_id,
           contragent_name,
           email,
           shipment,
           comments,
           status,
		   ip,
		   agent,
		   tags) 
          VALUES 
          ($arg,
           now(),
		   now(),
          $contragent_id,
          (SELECT `name` FROM `companies` WHERE `id`=$contragent_id),
          $email,
          $shipment,
          $comments,
          1,
		  '$ip',
		 '$agent',
		  $tag)";
}
	
$query_1 = iconv('UTF-8//TRANSLIT', 'Windows-1251', $query);

$qry_add_z = mysql_query($query_1);

$qry_zakaz = mysql_query("SELECT MAX(`id`) FROM `arch_zakaz`");

$rw = mysql_fetch_row($qry_zakaz);

$zakazetc = $rw[0];

//$zakaz = mysql_insert_id();
$query = "INSERT INTO arch_goods 
          (zakaz,
           user_id,
           artikul,
           price_id,
           amount,
           discount,
           name,
           price_single) 
          SELECT $zakazetc,
                 $arg,
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
            AND c.user_id      = $arg";

$query = iconv('UTF-8//TRANSLIT', 'Windows-1251', $query);

$qry_add_g = mysql_query($query);


if($qry_add_g){

$act_del = mysql_query("DELETE FROM cart
			WHERE price_id = $price_id
			AND user_id = $arg");

}


$qry_archzakaz = mysql_query("SELECT DISTINCT a.id, 
                          a.time, 
                          weekday(a.time) as weekday, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
                          g.price_id,
                          p.comment price_name,
						  c.name,
						  r.name,
						  r.id,
						  a.status,
						  p.company_id,
						  a.exe_time
				FROM arch_zakaz AS a,
					 arch_goods AS g,
					 price AS p, 
					companies AS c,
					rubrikator AS r
				 WHERE  a.id = $zakazetc
						AND a.id=g.zakaz 
						AND p.id=g.price_id
						AND p.company_id =c.id
						AND p.rubrika = r.id
						AND a.status < 6
				ORDER BY r.id");

$str_zakaz = '';
    
while(list($zakaz, $zakaz_date, $weekday, $singl_date, $price_id, $price_name, $c_name,$r_name,$r_id,$status,$company_id,$exe_time)=mysql_fetch_row( $qry_archzakaz)){

	$str_zakaz  .= "$zakazetc^$zakaz_date^$weekday^$singl_date^$price_id^$price_name^1^$c_name^$r_name^$r_id^$company_id^$status^$exe_time";

}




$str_zakaz = iconv('Windows-1251', 'UTF-8//TRANSLIT', $str_zakaz);

print"str_ok=$str_zakaz&zakaz=$zakazetc";

include("flash_dsp_cart.php");

include("flash_disconnect.php");

?>
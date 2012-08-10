<?php 
//
//created by arcady.1254@gmail.com 7/1/2012
// 

$company_id = intval($_SESSION[user][company_id]);

if($_SESSION[user][role] == 6)$str = "AND p.company_id = $company_id";

$query = "SELECT DISTINCT a.id, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
						  a.status,
                          g.price_id,
                          p.comment price_name,
                          u.surname,
						  a.tags
          FROM arch_zakaz AS a, 
               arch_goods AS g,
               price AS p,
               customer AS u
          WHERE u.id=a.customer AND
                a.id=g.zakaz AND 
                p.id=g.price_id $str
          ORDER BY id DESC";
 
$qry_archzakazlist = mysql_query($query) or die($query);

?>
<h3><?php echo $title; ?>&nbsp;клиентов витрин.</h3>
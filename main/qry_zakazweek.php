<?php 

if (!isset($user["id"])) {
    $user_for_select = 0;
} else {
    $user_for_select = $user["id"];
}

//$user_for_select = $user["id"];

$query = "SELECT DISTINCT a.id, 
                          a.time, 
                          weekday(a.time) as weekday, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
                          g.price_id,
                          p.comment price_name,
                          a.status
          FROM arch_zakaz AS a,
               arch_goods AS g,
               price AS p
          WHERE a.user_id=$user_for_select AND 
                a.id=g.zakaz AND 
                p.id=g.price_id
          ORDER BY weekday,
                   a.id DESC";

$qry_zakazweek = mysql_query($query) or die($query);

?>

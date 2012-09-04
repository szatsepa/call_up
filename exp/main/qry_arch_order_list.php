<?php 

$uid = $_SESSION[id];

$old_order_array = array();

$query = "SELECT DISTINCT a.id, 
                          a.time, 
                          weekday(a.time) as weekday, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
                          g.price_id,
                          p.comment price_name,
                          a.status,
                          a.c_number
                      FROM arch_zakaz AS a,
                           arch_goods AS g,
                           price AS p
                      WHERE a.customer=$uid
                        AND a.id=g.zakaz 
                        AND p.id=g.price_id
                       AND TO_DAYS(NOW()) - TO_DAYS(a.time) <= 54  
                      ORDER BY weekday,
                            a.id DESC"; 


$qry_archzakazlist = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_archzakazlist)){
    
    array_push($old_order_array, $row);
}

mysql_free_result($qry_archzakazlist);

$all_order_array = array();

$query = "SELECT DISTINCT a.id, 
                          a.time, 
                          weekday(a.time) as weekday, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
                          g.price_id,
                          p.comment price_name,
                          a.status,
                          a.tags,
                          a.c_number
                      FROM arch_zakaz AS a,
                           arch_goods AS g,
                           price AS p
                      WHERE a.customer=$uid
                        AND a.id=g.zakaz 
                        AND p.id=g.price_id
                      ORDER BY weekday,
                            a.id DESC";

//echo "$query<br>";
$qry_allorder = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_allorder)){
    
    array_push($all_order_array, $row);
}

mysql_free_result($qry_allorder);

?>
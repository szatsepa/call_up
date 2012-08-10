<?php 


$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}

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
                      WHERE a.$who=$user_id
                        AND a.id=g.zakaz 
                        AND p.id=g.price_id
                       AND TO_DAYS(NOW()) - TO_DAYS(a.time) <= 54  
                      ORDER BY weekday,
                            a.id DESC";

$qry_zakazweek = mysql_query($query) or die($query);

?>

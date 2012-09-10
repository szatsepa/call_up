<?php 


$user_id = $_SESSION[id];



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
                      WHERE a.customer=$user_id
                        AND a.id=g.zakaz 
                        AND p.id=g.price_id
                       AND TO_DAYS(NOW()) - TO_DAYS(a.time) <= 34  
                      ORDER BY weekday,
                            a.id DESC";

$qry_zakazweek = mysql_query($query) or die($query);

?>

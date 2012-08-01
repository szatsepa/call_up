<?php 

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
    $table = "users";
    
    
}  else {
    
    $who = "customer";
    
     $table = "customer";
    
}

$add_where = " AND a.$who=".$customer." ";

$arhorder_array = array();

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
               $table AS u
          WHERE u.id=a.$who AND
                a.id=g.zakaz AND 
                p.id=g.price_id AND
u.id = $user_id
          ORDER BY id DESC";


//echo "$query<br/>";
$qry_archzakazlist = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_archzakazlist)){
    
    array_push($arhorder_array, $row);
}

mysql_free_result($qry_archzakazlist);

?>
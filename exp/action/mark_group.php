<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$out = array('ok'=>NULL);

$uid = intval($_POST[uid]);

$pid = intval($_POST[pid]);

$query = "SELECT COUNT(id) FROM favorites WHERE customer = $uid AND price_id = $pid";

$result = mysql_query($query);

$out['q'] = $query;

$row = mysql_fetch_row($result);

if($row[0] == 0){
    $query = "INSERT INTO favorites (customer,price_id,storefront_id) VALUES ($uid,$pid,2)";
    mysql_query($query);
    $out['qq'] = $query;
    
    $ins = mysql_insert_id();
    if($ins){
        $query = "SELECT f.price_id AS pid, 
                f.group, 
                p.comment 
            FROM favorites AS f,
                price AS p
            WHERE f.id = $ins 
            AND p.id = f.price_id";
        
        $result = mysql_query($query);
        
        $out['fav'] = mysql_fetch_assoc($result);
    }
    
}

echo json_encode($out);

mysql_close();
?>

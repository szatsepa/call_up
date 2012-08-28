<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$artikuls = explode(':',$_POST[artikuls]);

$out = array('ok'=>NULL);

$count = 0;

mysql_query("DELETE FROM cart WHERE customer = $uid");

foreach ($artikuls as $value) {
                       
            $query = "INSERT INTO cart 
                            (customer,
                            num_amount,
                            num_discount,
                            artikul,
                            price_id,
                            time) 
                            VALUES 
                            ($uid,
                            1,
                            0,
                            '$value',
                            2,
                            now())";
                       

                mysql_query($query);
                      
            $count++;
            
            $out['artikuls'] .= $value."; ";
}

$out['ok'] = $count;

echo json_encode($out);

mysql_close();
?>

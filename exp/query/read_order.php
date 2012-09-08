<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$order = intval($_POST[order]);

$pid = intval($_POST[pid]);

$query = "SELECT * FROM tickets WHERE id = $order";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);

$f_A = explode(":",$row[field_A]);

$f_B = explode(":",$row[field_B]);

$f_C = explode(":",$row[field_C]);

$tmp = array_merge($f_A,$f_B,$f_C);

$art_arr = array();

$n = 0;

foreach ($tmp as $value) {
    
        if($value != 'NULL'){
                $query = "SELECT a.str_code1 AS artikul, 
                                a.id,
                                CONCAT(gp.id,'.',gp.extention) AS img,
                                a.str_group AS simbl
                    FROM pricelist a, goods_pic gp
                    WHERE a.str_code1 = '$value'
                AND a.pricelist_id = $pid
                    AND gp.barcode = a.str_barcode
                    AND gp.pictype = 1";

                $result = mysql_query($query);
                
                $var = mysql_fetch_assoc($result);

                 array_push($art_arr, $var);
        }else{
             if($n<5){
            $simbl='A';
            $itm = 'a00'.$n;
        }else if($n>4 && $n<15){
            $simbl='B'; 
            $itm = 'b00'.$n;
        }else if($n>14){
            $simbl='C';
            $itm = 'c00'.$n;
        }
             $art = array('artikul'=>$itm, 'id'=>0, 'img'=>'no_pic.jpg','simbl'=>$simbl);
            
             array_push($art_arr, $art);
        }
                 
    $n++;
}

$out = array('ok'=>$row[num_order],'artikuls'=>$art_arr, 'A'=>$row[field_A],'B'=>$row[field_B],'C'=>$row[field_C]);

echo json_encode($out);

mysql_close();
?>

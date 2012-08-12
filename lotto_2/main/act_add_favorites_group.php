<?php

if($_SESSION[auth] == 1){
    
    $who = "user_id";
}else if($_SESSION[auth] == 2){
    
    $who = "customer";
}

$user_id = $_SESSION[user]->data[id];

$group = quote_smart($attributes[group]);

$st_id = intval($attributes[stid]);

$qry_price = mysql_query("SELECT p.id FROM `pricelist` AS pl, `price` AS p, `storefront_data` AS sd WHERE pl.pricelist_id = p.id AND pl.str_group = $group AND sd.price_id = p.id AND sd.storefront_id = $st_id GROUP BY p.id");

$row = mysql_fetch_assoc($qry_price);

$price_id = $row[id];

$qry_num = mysql_query("SELECT Count(*) FROM `favorites` AS f WHERE f.`group` = $group AND f.$who = $user_id");

$row = mysql_fetch_row($qry_num);

if($row[0] == 0){
    
     $query = "INSERT INTO `favorites` 
            ($who,
    `storefront_id`,
        `price_id`,
            `group`)
            VALUES
            ($user_id,
    $st_id,
             $price_id,
             $group)";
        
        $act_add = mysql_query($query) or die ($query);

    }


$st_id = $attributes[stid];
    
?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>

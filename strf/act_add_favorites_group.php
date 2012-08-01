<?php

if($_SESSION[auth] == 1){
    
    $who = "user_id";
}else{
    
    $who = "customer";
}

$user_id = $_SESSION[user]->data[id];

$group = quote_smart($attributes[group]);

$price_id = quote_smart($_SESSION[price_id]);

if(isset ($_SESSION[auth])){

$qry_num = mysql_query("SELECT Count(*) FROM favorites AS f WHERE f.group = $group AND f.$who = $user_id");

$row = mysql_fetch_row($qry_num);

if($row[0] == 0){
    
     $query = "INSERT INTO favorites 
            ($who,
        price_id,
            group)
            VALUES
            ($user_id,
             $price_id,
             $group)";
        
        $act_add = mysql_query($query) or die ($query);

    }

}
$st_id = $attributes[stid];
    
?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>

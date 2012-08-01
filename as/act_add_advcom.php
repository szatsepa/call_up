<?php

/*
 * created by arcady.1254@gmail.com 14/1/2012
 */
//print_r($attributes);

$name = quote_smart($attributes[name]);

$stid = intval($attributes[stid]);

$status = 0;

if(isset ($attributes[status]) && $attributes[status] == 1)$status = intval ($attributes[status]);

if(!isset ($attributes[check])){
    
        $query = "INSERT INTO advert_company (name, status) VALUES ($name, $status)";
        
        $id = mysql_insert_id();
    
    }  else {
        
        $id = intval($attributes[company_id]);
        
        $query = "UPDATE advert_company SET status = $status WHERE id = $id";
        
}

$result = mysql_query($query) or die($query);


//echo "<br>$query<br>";
?>
<form action="index.php?act=advert" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $stid;?>"/><input name="company_id" type="hidden" value="<?php echo $id;?>"/></form>');
    document.forms[0].submit();
    </script>

<?php

/*
 * created by arcady.1254@gmail.com 6.11.2011
 */

$id = quote_smart($attributes[stid]);

$company_id = quote_smart($attributes[company_id]);

$price_id = quote_smart($attributes[price_id]);

$query = "SELECT Count(storefront_id) AS count_rows FROM storefront_data WHERE price_id = $price_id AND company_id = $company_id AND storefront_id = $id";

$result = mysql_query($query) or die ($query);

$row = mysql_fetch_row($result);

$count = $row[0];

if($count == 0){
    
    $query = "INSERT INTO storefront_data (storefront_id,company_id, price_id) VALUES ($id, $company_id, $price_id)";
 
}

$result = mysql_query($query) or die($query);


?>
 <form action="index.php?act=strf" method="post">
    <script language="javascript">
    document.write ('<input name="company_select" type="hidden" value="select"><input name="st_select" type="hidden" value="select"><input name="price_select" type="hidden" value="select"><input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/><input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/><input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/></form>');
    document.forms[0].submit();
    </script>

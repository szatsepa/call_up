<?php

/*
 * created by arcady.1254@gmail.com 25/1/2012
 */

$stid = intval($attributes[stid]);

$about = quote_smart($attributes[about]);

$office = quote_smart($attributes[office]);

$discount = quote_smart($attributes[discount]);

$warranty = quote_smart($attributes[warranty]);

$delivery = quote_smart($attributes[delivery]);

$payment = quote_smart($attributes[payment]);

$phone = quote_smart($attributes[phone]);

$query = "UPDATE storefront_info SET about_store = $about, head_office = $office, discount = $discount, warranty = $warranty, delivery = $delivery, payment = $payment, phone=$phone WHERE storefront_id = $stid";

$result = mysql_query($query) or die($query);

$affected = mysql_affected_rows();

if($affected == 0){
    
    $query = "INSERT INTO storefront_info (storefront_id, about_store, head_office, discount, warranty, delivery, payment, phone) VALUES ($stid, $about, $office,$discount, $warranty,$delivery,$payment,$phone)";
    
    $result = mysql_query($query) or die($query);
    
    $id = mysql_insert_id();
    

}
    if($id or $affected){
        ?>
<form action="index.php?act=strf" method="post">
    <input type="hidden" name="add_info" value="<?php echo $id;?>"/>
    <input type="hidden" name="company_select" value="select"/>
    <input type="hidden" name="st_select" value="select"/>
    <input type="hidden" name="price_select" value="select"/>
    <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
    <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"/></form>');
    document.forms[0].submit();
    </script>
<?php
    }
?>

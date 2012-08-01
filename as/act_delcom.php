<?php

/*
 *created by arcady.1254@gmail.com 20.11.2011
 */
$cid = quote_smart($attributes[company_id]);

$stid = quote_smart($attributes[stid]);

$pid = $cid;

if(isset ($attributes[com_id])) $cid = intval ($attributes[com_id]);

if($attributes[act] == "delprice"){

 $query ="DELETE FROM storefront_data WHERE price_id = $pid AND storefront_id = $stid"; 

}else{
    
 $query ="DELETE FROM storefront_data WHERE company_id = $cid AND storefront_id = $stid"; 
 
}

$result = mysql_query($query) or die ($query);

?>

   <form action="index.php?act=strf" method="post">
      <script lenguich="javascript">
        document.write ('<input name="company_select" type="hidden" value="select"><input name="st_select" type="hidden" value="select"><input name="price_select" type="hidden" value="select"><input type="hidden" name="company_id" value="<?php echo $cid;?>"/><input type="hidden" name="price_id" value="<?php echo $pid;?>"/><input type="hidden" name="stid" value="<?php echo $stid;?>"/></form>');
        document.forms[0].submit();
    </script> 

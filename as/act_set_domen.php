<?php

/*
 * created by arcady.1254@gmail.com 16.11.2011
 */

$id = $attributes[stid];

$domen = $attributes[domen];

if($domen == 'shop.animals-food.ru'){
    
    $domen = $domen.'/strf';
}

$domen = quote_smart($domen);

//echo "$domen";

$query = "UPDATE storefront SET where_res = $domen WHERE id = $id";

$result = mysql_query($query) or die ($query);

?>
<form action="index.php?act=strf" method="post">
    
    <script language="javascript">
    document.write ('<input type="hidden" name="st_selec" value="select"/><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>

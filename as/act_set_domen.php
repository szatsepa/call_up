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

//$query = "SELECT Count(where_res) FROM storefront WHERE  where_res = $domen";
//
//$result = mysql_query($query) or die($query);
//
//$row = mysql_fetch_row($result);
//
//$num_count = $row[0];



$query = "UPDATE storefront SET where_res = $domen WHERE id = $id";

$result = mysql_query($query) or die ($query);

?>
<form action="index.php?act=strf" method="post">
    
    <script language="javascript">
    document.write ('<input type="hidden" name="st_selec" value="select"/><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>
<?php
//if($num_count == 0){}else{
    ?>
<!--    <script language="javascript">
        if(confirm("Имя сайта уже используеться...Вернуться?"))document.location.reload();    
</script>-->
    
    <?php
//}
?>

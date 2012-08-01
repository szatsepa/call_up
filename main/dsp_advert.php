<td width="250" valign="top" style="border-right:1px dashed #a7a7a7;padding-right:20px;border-bottom:1px dashed #a7a7a7;padding-bottom:10px;padding-left:20px;">
<?php 

include "main/dsp_tagscloud.php"; 

// Здесь выводится баннер товара дня
    $row = mysql_fetch_assoc($qry_advert);
    //id,str_code1,str_name
?>
<a href="index.php?act=single_item&pricelist_id=<?php echo $row["pricelist_id"];?>&item_id=<?php echo $row["id"].$urladd;?>"><img src="images/blank.jpg" width="250" height="214" border="0" alt="" style="margin-top:0px;"><!-- img src="images/goods/<?php echo $row["str_code1"]; ?>.jpg" border="0" alt="Товар дня" --></a>    
 <!-- div style="font-size:8pt;"><?php echo $row["str_name"];?></div --><br /> 
 <?php 

$row = mysql_fetch_assoc($qry_companyadvert);
$company_id = substr($row["id"],7);

if ($company_id != '') {
?>
<a href="index.php?act=company_prices&company_id=<?php echo $company_id.$urladd; ?>"><!-- img src="images/komp_dnya.jpg" width="250" height="214" border="0" alt="" --><img src="images/logos/logo_<?php echo $company_id; ?>.jpg" border="0" alt=""></a>
<?php } 
//END if ($company_id != '')
?> 
</td>
<?php 

$row        = mysql_fetch_assoc($qry_companyadvert);
$company_id = substr($row["id"],7);

$row2       = mysql_fetch_assoc($qry_advert);
$tovar_id   = $row2["id"];
$tovar_name = $row2["str_name"];

if ($company_id == '') {
    $company_id = 0;
}


// Установленный company_id дает соответсвующий выбор в SELECT 

//$company_id = 10;

?>

<h3>&nbsp;Реклама на первой странице</h3>

<form action="index.php?act=upd_companyadvert" method="post" name="upd_companyadvert">
&nbsp;<?php include("dsp_companyselect.php"); ?><input type="submit" value="Установить" class="submit2">
</form>
<br />
<br />
<br />

<form action="index.php?act=upd_tovaradvert" method="post" name="upd_tovaradvert">
&nbsp;<strong>Товар дня:</strong>&nbsp;<?php echo $tovar_name; ?><br /><br />
&nbsp;<input type="text" name="id" class="submit2" value="<?php echo $tovar_id; ?>" style="width:10em;"><input type="submit" value="Установить товар дня" class="submit2">
</form>
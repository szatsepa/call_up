<?php 

$row = mysql_fetch_row($qry_company);

$logos_root =  $document_root . '/images/logos/'; 
$picture    =  $logos_root."logo_".$attributes[company_id].".gif";

?>

<h2><?php if (file_exists($picture)) { ?><img src="images/logos/logo_<?php echo $attributes[company_id]; ?>.gif" border="0" alt="<?php echo $row[1]; ?>" align="middle" hspace="10"><?php } ?><?php echo $row[1]; ?></h2>
<br>
<?php echo $row[3];?>
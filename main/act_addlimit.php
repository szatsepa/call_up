<?php 
// ���������� ���������� �� ������������ ������ � ������ ������

//header('Content-Type: text/html; charset=utf-8'); 


$zakaz_limit  = abs(intval(trim($attributes[zakaz_limit])));
$pricelist_id = intval($attributes[pricelist_id]);

$query = "UPDATE price 
			 SET zakaz_limit = $zakaz_limit
		   WHERE id = $pricelist_id";
		   
$qry_price_info_update = mysql_query($query) or die('<span class="edit4">������</span>');

?>
<span class="edit5">����������� ����� ��� ������ ����������</span>

<script language="JavaScript">

	$("#zakaz_limit").val("<?php echo $zakaz_limit; ?>");

</script>
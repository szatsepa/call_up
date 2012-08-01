<h2><?php echo ucfirst($attributes[name]); ?></h2>

<div align="center">
<table border="0" cellspacing="0" cellpadding="10">
<?php 

$rowcount = 1;
			while ($row = mysql_fetch_assoc($qry_tagprices)) { 
			        echo "<tr><td>";
					echo "<a href='index.php?act=company_prices&amp;company_id=".$row["company_id"].$urladd."'>";
					dsp_logo($row["company_id"],$row["company_name"],$document_root,128); 
					echo "</a></td><td valign='top'>";
					echo "<a href='index.php?act=single_price&amp;pricelist_id=".$row["id"].$urladd."'>".$row["comment"]."</a>";
			        
			        echo "</td></tr>";
			    ++$rowcount;
			}

?>
</table>
</div>
<br />
<br />
<br />
<div align="center"><br />
<br />

<table border="0" cellspacing="30" cellpadding="0">
<?php 
$left_column = "yes";

while ($row = mysql_fetch_assoc($qry_actualcompanies)) { 
    
    if ($left_column == "yes"){
        echo "<tr>";
    }
        
        echo "<td width='340' valign='top'><table border='0' cellpadding='5' cellspacing='0'><tr><td valign='top'><div style='width:128px;'>";
		echo "<a href='index.php?act=company_prices&amp;company_id=".$row["id"].$urladd."'>";
		dsp_logo($row["id"],$row["name"],$document_root,128);// original is tak  a href='index.php?act=company_prices&company_id=		
		echo "</a></div></td><td valign='top'><strong><a href='index.php?act=company_prices&company_id=".$row["id"].$urladd."'>".$row["name"]."</a></strong><br />";
        if ( $authentication == "yes") {
			echo "<small style='padding-top:7px;display:block;'>".string2html($row["about"])."</small>";
		}
		echo "</td></tr></table></td>";
     
     if ($left_column == "no"){
        echo "</tr>";
     }
     
     if ($left_column == "no"){
        $left_column = "yes";
     } else {
        $left_column = "no";
     }
}
    
if ($left_column == "no") {
    echo "<td>&nbsp;</td></tr>";
}
?>
</table>
</div>
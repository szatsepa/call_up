<div align="center">
<table border="1" cellpadding="5" cellspacing="0" style="font-size:9pt;">
<th>N</th>
<th>Дата</th>
<th>IP</th>
<th>Дисплей</th>
<th>Браузер</th>
<th>ОC</th>
<?php

while ($row = mysql_fetch_assoc($qry_statzakaz)) { 
		
		$ua         = parseUserAgent($row["agent"]);
		$user_agent = $ua[0]." ".$ua[1];
		$os   		= osdetect($row["agent"]);
		
		echo "<tr>";
        echo "<td align='right'><a href='index.php?act=view_archzakaz&zakaz=no&id=".$row["id"]."'>".$row["id"]."</a></td>";
		echo "<td>".$row["zakaz_date"]."</td>";
		echo "<td>".$row["ip"]."</td>";
		echo "<td>".$row["resolution"]."</td>";
		echo "<td title='".$row["agent"]."'>".$user_agent."</td>";
		echo "<td>".$os."</td>";
        echo "</tr>";	
}


?>

</table></div>
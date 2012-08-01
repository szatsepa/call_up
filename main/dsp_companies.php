<?php if ($mobile == 'false') { ?>
<div align="center">
<?php if ( $authentication == "yes") { ?>
<table border="0" cellpadding="0" cellspacing="0">
<tr><?php //include("dsp_advert.php"); ?>
 <td width="50" align="center" valign="top"><div align="center" style="margin-top:5px;"><a href="index.php?act=complist<?php echo $urladd; ?>">все</a> </div>
<div style="margin-top:12px;"><?php //include("dsp_alphabet.php"); ?></div>
 </td>
<td valign="top"><table border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>
	<!-- <table border="0" cellpadding="2" cellsapcing="0">
	<tr>
		<td valign="top"><a href="index.php?act=rubrika&amp;id=1">Готовая еда</a></td>
		<td valign="top"><a href="index.php?act=rubrika&amp;id=2">Продукты</a></td>
		<td valign="top"><a href="index.php?act=rubrika&amp;id=3">	Медикаменты</a></td>
		<td valign="top"><a href="index.php?act=rubrika&amp;id=4">Цветы</a></td>
		<td valign="top"><a href="index.php?act=rubrika&amp;id=5">Услуги</a></td>
		<td valign="top" style="font-size:7pt;"><!-- a href="index.php?act=rubrika&amp;id=6">Рубрика 6</a --><!-- </td>
		<td valign="top" style="font-size:7pt;"> --><!-- a href="index.php?act=rubrika&amp;id=7">Рубрика 7</a </td>
		<td valign="top" style="font-size:7pt;">--><!-- a href="index.php?act=rubrika&amp;id=8">Рубрика 8</a </td>
		<td valign="top" style="font-size:7pt;">--><!-- a href="index.php?act=rubrika&amp;id=9">Рубрика 9</a </td>
	</tr></table> -->
	
	</td>
</tr>
<tr>
	<!-- td colspan=2 align="center"><strong>Компании:</strong></td -->
    <td><?php //display_matrix('home',$qry_matrix,$environment); ?></td>
</tr>

<?php /*
$left_column = "yes";
while ($row = mysql_fetch_assoc($qry_actualcompanies)) { 
    if ($left_column == "yes"){
        echo "<tr><td width='300'><b><a href='index.php?act=company_prices&company_id=".$row["id"].$urladd."'>".$row["name"]."</a></b><br>
        <small>".$row["about"]."</small></td>";
        $left_column = "no";
    } else {
        echo "<td width='300'><b><a href='index.php?act=company_prices&company_id=".$row["id"].$urladd."'>".$row["name"]."</a></b><br><small>
        ".$row["about"]."</small></td></tr>";
        $left_column = "yes";
    }
}

if ($left_column == "no") {
    echo "<td>&nbsp;</td></tr>";
}
*/
?>
</table>
</td>

<script language="JavaScript" type="text/javascript">
	function showAbout()
	{
		window.open ('index.php?act=about', 'newWin', 'scrollbars=yes,status=no,location=no,menubar=no,width=600,height=300')
        return;
	}
</script>

<td valign="top"><!-- ? --></td>
</tr>
</table>
<?php } ?>
</div>
<?php } else { 
   
     if ( $authentication == "yes") {
	 	echo "<div class='head'>Компании:</div>";	
		echo "<div class='otstup'>";
		while ($row = mysql_fetch_assoc($qry_actualcompanies)) { 
	 		echo "<a  href='index.php?act=company_prices&amp;company_id=".$row["id"].$urladd."'>".$row["name"]."</a>";
        	echo "<div class='about'>".string2html($row["about"])."</div>"; 
     	}
	 	echo "</div>";	
	 }
} 

?>
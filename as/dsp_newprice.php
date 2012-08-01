<br />
<table>
<tr>
    <form action="index.php?act=new_price" method="post" name="price_add">
	<td>Создать прайс для компании</td>
	<td>
<?php 
    include ("dsp_companyselect.php");
    
    /*while ($row = mysql_fetch_assoc($qry_companies)) {
        echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
    }*/
?>        
        </td>
	<td><input type="submit" value="Ok"></td>
    </form>
</tr>
</table>
<br />
<br />
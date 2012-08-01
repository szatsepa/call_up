<script language="JavaScript">
	function delPrice (inp) {
		if (confirm("Вы уверены, что хотите удалить этот прайс из \"Избранного\"?")) {
			URL = "<?php echo "http://".$host."/index.php?act=del_favprice&id=" ?>" + inp;
			document.location.href = URL;
			//alert (URL);
		}
		return true;
	}
</script>
<?php include "main/dsp_message.php"; ?>
<div align="center" style="padding-top:10px;">
<table border="0" cellpaddin="0" cellspacing="0">
    <tr>
    <?php //include("dsp_advert.php"); ?>
        <td valign="top" class="kab"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Избранные компании</div></td>
                </tr>
<?php 

$rowcount = 1;
while ($row = mysql_fetch_assoc($qry_userfavcompanies)) { 
        echo "<tr><td><a href='index.php?act=company_prices&company_id=".$row["id"].$urladd."'>".$row["name"]."</a></td></tr>";
        
    ++$rowcount;
	// Ограничим вывод любимых компаний
    if ($rowcount == 8) break;
}
if (mysql_numrows($qry_userfavcompanies) == 0){
echo "<tr><td class='smallmessage'>Нет компаний для отображения. Для добавления используйте кнопку &quot;Добавить в избранное&quot; в прайс-листе.</td></tr>";
}

if (mysql_numrows($qry_userfavcompanies) > 7){
	echo "<tr><td>&nbsp;<a href=''>Все компании&gt;&gt;<a></td></tr>";
} ?>                        
            </table></td>
		<td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Избранные прайс-листы</div></td>
                </tr>
<?php 

$rowcount = 1;
// To do Буквенный параметр для JS-функции?
while ($row = mysql_fetch_assoc($qry_userfavprices)) { 
        echo "<tr><td><a href='index.php?act=single_price&pricelist_id=".$row["id"].$urladd."'>".$row["comment"]."</a>&nbsp;&nbsp;<a href='#' class='cloud' title='Удалить' onclick='javascript:delPrice(".$row["id"].$urladd."); return false;'>x</a></td></tr>";
        
    ++$rowcount;
	 
	 // Ограничим вывод любимых прайсов
     if ($rowcount == 8) break;
}
if (mysql_numrows($qry_userfavprices) == 0){
	echo "<tr><td class='smallmessage'>Нет прайс-листов для отображения. Для добавления прайс-листа используйте кнопку &quot;Добавить в избранное&quot;.</td></tr>";
}

if (mysql_numrows($qry_userfavprices) > 7){
	echo "<tr><td>&nbsp;<a href=''>Все прайсы&nbsp;&gt;&gt;<a></td></tr>";
} ?>                       
            </table>
        </td>        
    <td valign="top" class="kab"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Любимые товары</div></td>
                </tr>
                <?php 
                // str_name,id,str_code1,num_amount,pricelist_id
                $rowcount = 1;
                while ($row = mysql_fetch_assoc($qry_userfavgoods)) { 
                    if ($row["num_amount"] == 999999999) {
                            echo "<tr><td><a href='index.php?act=single_item&pricelist_id=".$row["pricelist_id"]."&artikul=".$row["str_code1"].$urladd."'>".$row["str_name"]."</a></td></tr>";
                        } else {
                            echo "<tr><td><a href='index.php?act=single_item&pricelist_id=".$row["pricelist_id"]."&artikul=".$row["str_code1"].$urladd."'>".$row["str_name"]."</a>&nbsp;<small>(".$row["num_amount"].")</small></td></tr>";
                        }
                    ++$rowcount;
                    
                    // Ограничим вывод любимых товаров
                    if ($rowcount == 8) break;
                }
                
                if (mysql_numrows($qry_userfavgoods) == 0){
                echo "<tr><td class='smallmessage'>Нет товаров</td></tr>";
                }
                
                if (mysql_numrows($qry_userfavgoods) > 7){
                echo "<tr><td>&nbsp;<a href=''>Все товары&nbsp;&gt;&gt;<a></td></tr>";
                }
            ?>
                    
            </table></td>
    
	<td valign="top"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Метки</div></td>
                </tr>
                <?php 
				if (mysql_numrows($qry_archzakazlist) > 0) mysql_data_seek($qry_archzakazlist,0);
                
				 while ($row = mysql_fetch_assoc($qry_archzakazlist)) { 
				 
					 if ($row["tags"] != '') {
					 
					 	echo "<tr><td><a href='index.php?act=view_archzakaz&id=".$row["id"].$urladd."'>".$row["tags"]."</a></td></tr>";
					 
					 }
				 
				 }
				?>
            </table></td>
	
    </tr>
</table>
</div><br />
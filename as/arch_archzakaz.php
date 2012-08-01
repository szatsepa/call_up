 <td valign="top"><table border="0" cellpadding="5" cellspacing="5" width="220">
                <tr>
                	<td><div class="kab">Архив заказов</div></td>
                </tr>
                <?php 
                // str_name,id,str_code1,num_amount,pricelist_id
                $rowcount = 1;
                while ($row = mysql_fetch_assoc($qry_archzakazlist)) { 
                        echo "<tr><td><a href='index.php?act=view_archzakaz&id=".$row["id"].$urladd."'>N".$row["id"]." ".$row["zakaz_date"]."<br />".$row["price_name"]."</a></td></tr>";                
                        
                    ++$rowcount;
                    // Ограничим вывод архива заказов
                    if ($rowcount == 6) break;
                }
                
                if (mysql_numrows($qry_archzakazlist) == 0){
                echo "<tr><td class='smallmessage'>Нет заказов</td></tr>";
                }
                
                if (mysql_numrows($qry_archzakazlist) > 5){
                echo "<tr><td>&nbsp;&nbsp;<a href=''>Все заказы&nbsp;&gt;&gt;<a></td></tr>";
                }
                ?>                       
            </table></td>
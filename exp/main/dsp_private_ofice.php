<?php 

$st_id = 2;
?>

<div class="favorites">
<table width="100%" border="0" cellpaddin="0" cellspacing="0"> 
    <tr>
        <td valign="top" class="kab">
            <table id="msg" border="0" cellpadding="5" cellspacing="5" width="430">
                    <thead>
                    <tr>
                            <td>
                                <div class="kab"><strong>Информационное сообщение администрации:</strong></div>
                            </td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                    </tbody>                
            </table>
        </td>
		<td valign="top" class="kab">
            <table id="fav_g" border="0" cellpadding="5" cellspacing="5" width="230">
                <thead>
                    <tr>
                        <td><div class="kab"><strong>Любимые группы:</strong></div></td>
                    </tr>
                </thead>
                <tbody>
<?php 

$rowcount = 1;
//// To do Буквенный параметр для JS-функции?
foreach ($fav_array as $value) {
    
      if($value[comment]){
              ?>
                <tr>
                    <td>
                        <a href="index.php?act=look&page=1&pid=<?php echo $value[pid];?>"><?php echo "$value[tags]";?></a> 
                    </td>
                </tr>
                
                <?php  ++$rowcount;  
      }
       
	//  // Ограничим вывод любимых групп
    if ($rowcount == 7) break;
    
}

if ($rowcount == 1){
	echo "<tr><td class='smallmessage'>Нет выбранных групп для отображения. Для добавления группы используйте кнопку &quot;Добавить группу&quot;.</td></tr>";
}
?>                </tbody>       
            </table>
        </td>  
        
<!--    <td valign="top" class="kab"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Любимые товары</div></td>
                </tr>
                <?php 
                $rowcount = 1;

                foreach ($goods_arr as $row) { 
                    if ($row["num_amount"] == 999999999) {
                        
                        ?>
                
                  <tr>
                      <td>
                          <a href='index.php?act=item_description&amp;artikul=<?php echo $row[str_code1];?>&amp;stid=<?php echo $st_id;?>'><?php echo $row["str_name"];?></a>
                      </td>
                  </tr>
               
 <?php
              } else {
                  
                  ?>
                  <tr>
                      <td>
                          <a href='index.php?act=item_description&amp;artikul=<?php echo $row[str_code1];?>&amp;stid=<?php echo $st_id;?>'><?php echo $row["str_name"];?></a>&nbsp;<small><?php echo $row["num_amount"];?></small>
                      </td>
                  </tr>
                  <?php
                           
                        }
                    ++$rowcount;
                    
                    // Ограничим вывод любимых товаров
                    if ($rowcount == 7) break;
                }
//                
                if ($rowcount == 1){
                echo "<tr><td class='smallmessage'>Нет любимых товаров</td></tr>";
                }
$rowcount = 1;
            ?>
                    
            </table></td>-->
    
	<td valign="top"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Метки</div></td>
                </tr>
                <?php 
            foreach ($all_order_array as $row){ 
				 
					 if ($row["tags"] != '') {
					 
					 	echo "<tr><td><a href='index.php?act=view_arch_order&amp;id=".$row["id"]."&amp;stid=".$attributes[stid]."'>".$row["tags"]."</a></td></tr>";
					 ++$rowcount;
					
                                                }
				 
				 }
                                 
                                 if($rowcount == 1){
                echo "<tr><td class='smallmessage'>Нет избраных меток</td></tr>";
                }
				?>
            </table></td>
	
    </tr>
</table>
</div><br />
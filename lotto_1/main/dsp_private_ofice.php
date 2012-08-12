<?php 

$st_id = $attributes[stid];

 if(count($messages_arr) > 0){
     
//     print_r($messages_arr);
//     
//     echo "<br/>";
     
//     $str_message = iconv("UTF-8", "WINDOWS-1251", $messages_arr[0][message]);

     $str_message = iconv_substr($messages_arr[0][message], 0, 192);
     
//     $str_message = iconv("WINDOWS-1251", "UTF-8", $messages_arr[0][message]);

?>
<div class="message">
   &nbsp;&nbsp;&nbsp; <a href="index.php?act=to_message&amp;mes=<?php echo $messages_arr[0][id];?>&amp;stid=<?php echo $attributes[stid];?>"  target="_blank"><?php    echo "$str_message"; ?>&nbsp;&nbsp;>>></a> 
</div>

<?php } ?>

<div class="favorites">
<table width="100%" border="0" cellpaddin="0" cellspacing="0">
    <tr>
        <td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td>
                            <div class="kab">Любимые витрины:</div>
                        </td>
                </tr>
<?php 

$rowcount = 1;

//print_r($fav_array);

foreach ($fav_array as $value) {
   
   if($st_id){
              ?>
                <tr>
                    <td>
                        <a href="index.php?act=look&stid=<?php echo $st_id;?>"><?php echo "$rowcount. $value[name]";?></a>
                    </td>
                </tr>
                
                <?php ++$rowcount;
   }
    
   
	// Ограничим вывод любимых компаний
    if ($rowcount == 7) break;
}

if ($rowcount == 1){
    
echo "<tr><td class='smallmessage'>Нет витрин для отображения. Для добавления используйте кнопку &quot;Добавить в избранное&quot; на витрине.</td></tr>";


}
?>                        
            </table></td>
		<td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Любимые группы товаров:</div></td>
                </tr>
<?php 

$rowcount = 1;
//// To do Буквенный параметр для JS-функции?
foreach ($fav_group as $value) {
    
      if($value[group]){
              ?>
                <tr>
                    <td>
                        <a href="index.php?act=look&stid=<?php echo $st_id;?>&amp;select=group&amp;group=<?php echo $value[group];?>"><?php echo "$rowcount. $value[group]";?></a>
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
?>                       
            </table>
        </td>        
    <td valign="top" class="kab"><table border="0" cellpadding="5" cellspacing="5" width="230">
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
                    
            </table></td>
    
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
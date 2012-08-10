<h3><?php echo $user["company_name"]; ?></h3>
<?php include "main/dsp_message.php";
	  include ("main/act_md5name.php");
 ?>

<script>
var min = 3;
var sec = 0;
var timerid;
function timer()
{
  sec--; /* уменьшаем на одну секунду */
  if (sec<0) /* следующая минута */
  {
    sec = 59;
    min--;
  }
if (min==0 && sec==0)
  {
    clearInterval(timerid); /* останавливаем таймер */

document.location.href = "http://shop.animals-food.ru/index.php?act=supplier";

   
  }
}
 
timerid = setInterval(timer,1000); /* запускаем таймер */

</script>
<!--<div id="time">1:00</div>-->
<div align="center">
    
<table border="0">
    <tr>
        <td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                	<td><div class="kab">Новые заказы</div></td>
                </tr>
				<tr><td><?php
         
				 foreach ($users_array as $row) { 
                                    
//                                    array_push($orders_arr, $row);
                                    
					if ($row["status"] == 1 or $row["status"] == 4) {
						echo "<p>N".$row["id"]."&nbsp;".$row["zakaz_date"];
						
						// Отсроченный заказ?
						if ($row["exe_date"] != '') {
						
							echo "<br /><strong><small>Исполнить ".$row["exe_date"]."</small></strong>";
						
						}
						
						if ($row["status"] == 4) echo " (Демо)";
						echo "<br /><a href='index.php?act=view_archzakaz&amp;zakaz=no&amp;id=".$row["id"]."&amp;dsp=accept".$urladd."'>".$row["price_name"]."</a></p>";
					}
				}
//				if (mysql_num_rows($qry_allcompanyzakaz) > 0) {
//					mysql_data_seek($qry_allcompanyzakaz,0);
//				}
				 ?></a></td></tr>				
            </table>
        </td>
            
                <!-- вот сюда пожалуй вставить бы заказы по витринам -->
    <td valign="top" class="kab"><table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                        <td><div class="kab">Витрины заказы</div></td>
                </tr>
                                <tr><td><?php
                                foreach ($customers_array as $row) {  
                                        if ($row["status"] == 1 or $row["status"] == 4) {
                                                echo "<p>N".$row["id"]."&nbsp;".$row["zakaz_date"];
                                                
                                                // Отсроченный заказ?
                                                if ($row["exe_date"] != '') {
                                                
                                                        echo "<br /><strong><small>Исполнить ".$row["exe_date"]."</small></strong>";
                                                
                                                }
                                                
                                                if ($row["status"] == 4) echo " (Демо)";
                                                echo "<br /><a href='index.php?act=view_archzakaz&amp;store=1&amp;zakaz=no&amp;id=".$row["id"]."&amp;dsp=accept".$urladd."'>".$row["price_name"]."</a></p>";
                                        }
                                }
                                if (mysql_num_rows($qry_customer_orders) > 0) {
                                        mysql_data_seek($qry_customer_orders,0);
                                }
                                 ?></a></td></tr>                               
            </table></td>                
                    <!-- END INSERTED -->
          
                    
		<td valign="top" class="kab">
            <table border="0" cellpadding="5" cellspacing="5" width="230">
                <tr>
                    
                	<td><div class="kab">Текущие заказы</div></td>
                </tr>
				<tr><td>
                                <?php
                                
//                                $arhorder_array = array_merge($users_array, $customers_array);
                                
                                rsort($arhorder_array);
                                
                                
                                                                 
				foreach ($arhorder_array as $row) { 
                                    
                                    switch ($row[report]){
                                        case 0:
                                            $color = "blue";
                                            break;
                                        
                                        case 1:
                                            $color = "green";
                                            break;
                                    }          
                                    
				if(($row["status"])== 5)$color = "brown";
                                
                                if($row[report] == 1)$label = "doc";
                                
					// Выводим только подтвержденные и отгруженные заказы
					if ($row["status"] == 2 or $row["status"] == 5) {
						echo "<p style='color: ".$color.";'>N".$row["id"]."&nbsp;".$row["zakaz_date"];
						
						// Отсроченный заказ?
						if ($row["exe_date"] != '') {
						
							echo "<br /><strong><small>Исполнить ".$row["exe_date"]."</small></strong><br/>";
						
						}
						
                        switch ($row["status"]) {
                            case 2:
                                echo " (Подтвержден)";
                                $dsp = "accepted";
                            break;
                                
                            case 3:
                                echo " (Отменен)";
                                $dsp = "no";
                            break;
                            
                            case 5:
                                echo " (Отгружен)";
                                $dsp = "shipped";
                            break;
                            
                            case 6:
                                echo " (Выполнен)";
                                $dsp = "no";
                            break;
                        }
                        
                        echo " $label.";

						echo "<br /><a href='index.php?act=view_archzakaz&amp;zakaz=no&amp;id=".$row["id"]."&amp;dsp=".$dsp.$urladd."'  style='color: ".$color.";'>".$row["price_name"]."</a></p>";
					}				
				}
                                

				?></td>
                                   
                                </tr>	
                                <tr align="center">
                                    <td align="center">
                                        <form action="index.php?act=report" method="post" target="_blank">
                                            <input type="hidden" name="company_id" value="<?php echo $user[company_id];?>"/>
                                            <input type="submit" value="Текущий отчет"/>
                                    
                                         </form>
                                    </td>
                                </tr>			
            </table>
                   
        </td>
        <td valign="top"><table border="0" cellpadding="5" cellspacing="5" width="370">
                <tr>
                	<td><div class="kab">Мои прайс-листы</div></td>
                </tr>
                <tr><td>
                 <?php $rowcount = 1;

			while ($row = mysql_fetch_assoc($qry_companyprices)) { 
                    
                    // Есть ли в корзинах заказы для данного прайса?
                    $zakaz_exists = 0;
                    while ($row2 = mysql_fetch_assoc($qry_companycart)) {
                        if ($row2["price_id"] == $row["id"]) $zakaz_exists = 1;
                    }
                    
                    if (mysql_num_rows($qry_companycart) > 0) {
                        mysql_data_seek($qry_companycart,0);
                    }
                    
                    $where = whereS(9);  
                    
			        echo "<div style='margin-bottom:0px;'>".$rowcount.".<a href='index.php?act=single_price&pricelist_id=".$row["id"].$urladd."'>".$row["comment"]."</a>"; ?>&nbsp;<a href='#' class='cloud' title='Удалить' onclick='javascript:blockPrice("<?php echo $row["id"].$urladd; ?>",<?php echo $zakaz_exists; ?>,0); return false;'>x</a></div><br />
					<?php if ($row["status"] == 2) { ?><span class="edit"><a href="index.php?act=edit_price&amp;pricelist_id=<?php echo $row["id"].$urladd ?>">Редактировать</a></span><?php } if ($row["status"] == 1){ ?><span class="edit2"><a href='#' onclick='javascript:blockPrice("<?php echo $row["id"].$urladd; ?>",<?php echo $zakaz_exists; ?>,2); return false;'>Блокировать</a></span>
<!-- my block -->					
<!--					<span class="edit">
					<a href="#" onclick="javascript:showCode('code<?php echo $row["id"];?>');">Получить ссылку</a></span>
					<span id='code<?php echo $row["id"];?>' class='iframe'>Ссылка для клиента на витрину:<br /><br />
					<code>http://<?php echo $where;?></code>
					</span> -->

					<!-- -->
                                        <span class="edit"><a href="##" onclick="javascript:showCode('code<?php echo $row["id"]."a";?>');">Получить код</a>
                                        </span>
                                        <span id='code<?php echo $row["id"]."a";?>' class='iframe'>Код для отображения прайса на сторонних сайтах:<br /><br />
                                        <code>&lt;IFRAME NAME="content_frame" width="850" height="700" SRC="http://w.animals-food.ru/index.php?act=single_price&pricelist_id=<?php echo $row["id"];?>&st=1" &gt;Этот сайт использует фреймы&lt;/IFRAME&gt;</code>
                                        </span>


<!-- end my block -->
					<?php } 
                       if ($row["status"] == 2){ ?><span class="edit2"><a href="index.php?act=status_price&amp;status=1&amp;pricelist_id=<?php echo $row["id"].$urladd;?>">Разблокировать</a></span><?php } ?>
	        
			     <?php echo "<br /><br /><br />";
			    ++$rowcount;
			}?>
            <br />
            <br />
            <span class="edit">&nbsp;&nbsp;<a href="#" onclick="javascript:showCode('newprice');">Создать прайс-лист</a>&nbsp;&nbsp;</span>
			<span id='newprice' class='iframe'>Название прайс-листа:<br /><form action="index.php?act=add_price&amp;company_id=<?php echo $user["company_id"].$urladd; ?>" method="post"><input type="text" name="comment" size="50">
			<p align="right"><input type="submit" value="Создать"></p>			
			</form></span>            
            </td></tr>                 
            </table></td>        
</tr>
</table>
<br />
<br />
<p align="left">
<form action="index.php?act=customers_list<?php echo $urladd; ?>" method="post">
    <div class="kab">Выберите витрину    <?php include 'main/dsp_priceselect.php';?>
    
     <input type="submit" name="open" value="Выбрать"/>
 </div>  
</form></p>
<!--<p align="right"><a href="index.php?act=customers_list<?php //echo $urladd; ?>" class="help" style="text-decoration:underline;">Пользователи витрины</a>&nbsp;&nbsp;</p>
-->
<p align="right"><a href="index.php?act=arch_done<?php echo $urladd; ?>" class="help" style="text-decoration: underline;">Архив поставок</a>&nbsp;&nbsp;</p>
<p align="right"><a href="index.php?act=arch_decline<?php echo $urladd; ?>" class="help" style="text-decoration: underline;">Отменённые заказы</a>&nbsp;&nbsp;</p>
<p align="right"><a href="index.php?act=otchet" class="help" style="text-decoration:underline;">Отчеты</a>&nbsp;&nbsp;</p>





<script language="JavaScript">
function showCode(cod) {
	var obj = document.getElementById(cod);
	if (obj.style.display == "block") {	
		obj.style.display = "none";
	} else {
		obj.style.display = "block";
	}
	
return;
}

function blockPrice (inp,zakaz_exists,status) {
    URL = "<?php echo "http://".$host."/index.php?act=status_price&status=";?>" + status + "<?php echo "&pricelist_id=";?>" + inp;
    
    if (status == 0) {
        if (!confirm("Вы уверены, что хотите удалить этот прайс?")) {
            return true;
        }
    }
        
    if (zakaz_exists == 1) {
		if (confirm("Для данного прайса имеются незавершенные заказы.\nЭта операция приведет к их удалению. \nПродолжить?")) {			
			document.location.href = URL;
		}
    } else {
        //alert (URL);
        document.location.href = URL;
    }
	return true;
}

</script>
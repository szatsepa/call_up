-<!-- 26,05,2011 AR&copy; -->
<!-- <br>-->
 <?php 
 include ("../as/act_md5name.php");
 
 if(isset ($attributes[st_select])){
     
     $st_name =  storefront_name($attributes[stid]);
     
    }
    
    $company_id = $_SESSION[user][company_id];

  ?>
 <table class="dat" border="0" width="99%">

    <tr>
        
            
                <?php if(!isset ($attributes[st_select])){
          echo  '<td align="left" valign="top">  
                <strong> Введите(выберите) название витрины</strong> 
            </td>';
             }else{
                 
                 $storefront_array = qry_about_storefronts($attributes[stid]);
                 
     echo " <td align='left' valign='top'><strong>$st_name</strong><br/></td>";
            
         ?>
        <td align='left' valign='top'>
            <strong>&nbsp;&nbsp;&nbsp;Компания </strong>
            <?php 
             foreach ($storefront_array as $value) {
                 
            
            ?>
            <br/><?php echo $value[company];?>&nbsp;&nbsp;&nbsp;
            
            <?php  } ?>
        </td>  
        
 <?php
 $company_id = $storefront_array[0][company_id];
 
 ?>
        
           
          <td>
                <ul>
        <li><strong>Состав витрины</strong>&nbsp;&nbsp;&nbsp;</li>
            
            
 <?php 
 if(count($storefront_array) > 0){
 
 foreach ($storefront_array as $value) {
     ?>
        
<li><?php echo $value[price];?> &nbsp;&nbsp;&nbsp;</li>
                
<?php 
      }
 }
 ?>  
           </ul>
          
          </td>
           
            <td align="center" valign="bottom">
            <form action="index.php?act=dstrf" method="post">
                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                <input type="submit" value="Удалить витрину"/>
            </form>
        </td> 
        <?php 
        $domen = my_domen($attributes[stid]); 
        
        $tmp_arr = explode("/", $domen[where_res]);
        
       $names = $tmp_arr[0];
//        echo "<br>";
        ?>
     
        <td align="center" valign="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <form action="index.php?act=setdomen" method="post">
          <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
          <input type="text" name="domen" size="36" value="<?php  if($domen){ echo $names;}else{echo "Доменое имя";}?>"/>  
        
            </td>
        <td align="center" valign="bottom">
            <input type="submit" value="Запомнить"/> 
            </form>
        </td>
       <td align="center" valign="bottom"> </td>
<?php
     }   
        ?>
            <br/><br/>
            
       
    </tr>
    <tr>
        <?php if(!isset ($attributes[st_select])){?> 
<form action="index.php?act=add_storefront" method="post">
  <td>  
      <input required type="text" size="32" name="name"/>
      <input type="hidden" name="company_id" value="<?php echo $company_id;?>"/>
      <input type="submit" name="create_storefront" value="Создать"/>
     
  </td>
  </form>
  <td>
      
       
               
               <?php
              
$role = intval($_SESSION[user][role]);

$com_id = intval($_SESSION[user][company_id]);

$stores = qry_select_storefront($role, $com_id); 

$len = count($stores);

if($len != 0){

?>
  <form action="index.php?act=strf" method="post">      
       <?php
               
              include("dsp_storefront_select.php");
               
               ?>
       <input type="hidden" name="st_select" value="select"/>
       <input type="hidden" name="company_select" value="select"/>
       <input type="hidden" name="company_id" value="<?php echo $com_id;?>"/>
          <input type="submit" value="Выбрать"/>
   </form>   
     
<?php

    }
} ?>
  </td>   

  
    <br/> 
</tr>
</table>
<br/>
<?php 

if($attributes[company_select] == 'select'){ 
    ?>
  <table class="dat" width="99%">
<tr>  
        <td align="left" valign="top"><strong>Добавьте прайс из списка</strong><br><br></td>

     <td>   
                <form action="index.php?act=add_comtosto" method="post"/>
                
                <input type="hidden" name="company_select" value="select"/>
                    <input type="hidden" name="st_select" value="select"/>
                     <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                     <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
                <?php include("dsp_priceselect_store.php"); ?>
<!--                 <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>-->
               
                 </form><br>
    </td> 
         <td align="left" valign="top"><strong>Удалить прайс из списка</strong><br><br></td>

     <td>   
                <form action="index.php?act=delprice" method="post"/> 
                
                <input type="hidden" name="company_select" value="select"/>
                    <input type="hidden" name="st_select" value="select"/>
                     <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                     <input type="hidden" name="com_id" value="<?php echo $attributes[company_id];?>"/>
                  <select name="company_id" class="common">

<?php 
        foreach ($storefront_array as $value) {
     if ($value["id"] == $price_id){        
        echo  "<option value='".$value[price_id]."'selected>".$value[price]."</option>";
		}else{
		echo  "<option value='".$value[price_id]."'>".$value[price]."</option>";
		}
    }
	
?></select>
                <input type="submit" value="Удалить"/>
                </form> 
<!--               </form><br>-->
    </td> 
       <td>
           
      <form action="index.php?act=strf" method="post"/>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="company_select" value="select"/>
                    <input type="hidden" name="st_select" value="select"/>
                    <input type="hidden" name="price_select" value="select"/>
                    <input type="hidden" name="price_id" value="<?php echo $storefront_array[0][id];?>"/>
                    <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
                     <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="submit" value="Далее"/>
                </form>   
        
    </td> 
        </tr>
</table>
<br/>
<?php if($attributes[price_select] == 'select'){?>
<table class="dat" width="99%">
<?php

$filename = "../images/storefront/H_$attributes[stid].jpg"; 

if(file_exists ($filename )){
    ?>
    <tr>
        <td align="center" valign="center" rowspan="2">
            <img src="../as/act_prewiew.php?src=../images/storefront/H_<?php echo "$attributes[stid]";?>.jpg&amp;width=300&amp;height=60" alt="<?php echo $filename;?>"/>
        </td>
        <form action="index.php?act=delete_baner" method="post" name='del_top'/>      
            <td align="center" valign="center"/>
                <input type="hidden" name="company_select" value="select"/>
                <input type="hidden" name="price_select" value="select"/>
                <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                <input type="hidden" name="filename" value="<?php echo  'H_' . $attributes[stid]. '.jpg';?>"/>
                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                <input type="hidden" name="st_select" value="select"/>
                <input type="Submit" name='btn_dt' value="Удалить верхний банер" />
            </td>             
    </form>
    </tr>
    <?php
    
}
else
{
    
?>
    

    <tr>
        <td align="left" valign="top"><strong>Загрузка изображений верхнего банера</strong><br><br></td>
    </tr><tr>
    <form enctype="multipart/form-data" action="index.php?act=upload_top_baner" method="post" name="top" >
        
         <td> 
                <input type="hidden" name="top" value="top"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="512000"/> 
                <input name="userfile_t" type="file" size="20"/>
                <input type="hidden" name="company_select" value="select"/>
                <input type="hidden" name="price_select" value="select"/>
                <input type="hidden" name="company_id" value="<?php echo $attributes["company_id"];?>"/>
                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                <input type="hidden" name="st_select" value="select"/>
                <input type="submit" name="top_btn" value="Загрузить верхний банер"/>
                </form>
                <br /><br />            
                <small>Максимальный объем загружаемого файла не должен превышать 500 килобайт, формат изображения - JPG. Размер изображения ширина 635, высота 120.</small>
</td>           
</tr>



<?php } ?>
</table>
<br/>
<?php

$filename = "../images/storefront/F_$attributes[stid].jpg";

if(file_exists ($filename )){
    
    ?>
<table class="dat" width="99%">
<tr>
    <td align="center" valign="center" rowspan="2">
            <img src="../as/act_prewiew.php?src=../images/storefront/F_<?php echo "$attributes[stid]";?>.jpg&amp;width=300&amp;height=60" alt="<?php echo $filename;?>"/>
        </td>
     <form action="index.php?act=delete_baner" method="post" name='del_bottom'/>    
            <td align="center" valign="center"/>
                <input type="hidden" name="company_select" value="select"/>
                <input type="hidden" name="price_select" value="select"/>
                <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                <input type="hidden" name="filename" value="<?php echo 'F_' .$attributes[stid]. '.jpg';?>"/>
                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                <input type="hidden" name="st_select" value="select"/>
                <input type="Submit" name='btn_db' value="Удалить нижний банер" /></td>
    </form>
</tr>


</table>
<br/>
<?php }
else
{

    ?>

<table class="dat" width="99%">
<tr>
     <td align="left" valign="top"><strong>Загрузка изображений нижнего банера</strong><br><br></td>
   </tr><tr> 
    <form enctype="multipart/form-data" action="index.php?act=upload_top_baner" method="post" name="bottom" />
        <td> 
        <input type="hidden" name="baner" value="bottom"/>
        <input type="hidden" name="MAX_FILE_SIZE" value="512000"/> 
        <input name="userfile_b" type="file" size="20"/>
        <input type="hidden" name="company_select" value="select"/>
        <input type="hidden" name="price_select" value="select"/>
        <input type="hidden" name="company_id" value="<?php echo $attributes["company_id"];?>"/>
        <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
        <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
        <input type="hidden" name="st_select" value="select"/>
        <input type="submit" name="bottom_btn" value="Загрузить нижний банер"/>
        </form>
        <br /><br />            
        <small>Максимальный объем загружаемого файла не должен превышать 500 килобайт, формат изображения - JPG. Размер изображения ширина 1024, высота 170.</small>
</td>
</table>
<?php
} 

$filename = "../images/storefront/logo_$attributes[stid].jpg";

if(file_exists ($filename )){
    ?>
<table class="dat" width="99%">
<tr>
    <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        </td>
    <td align="center" valign="center">
            <img src="../as/act_prewiew.php?src=../images/storefront/logo_<?php echo "$attributes[stid]";?>.jpg&amp;width=60&amp;height=60" alt="<?php echo $filename;?>"/>
        </td>
        
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        </td>
     <form action="index.php?act=delete_baner" method="post" name='del_banner'/>    
             <td align="center" valign="center"/>
                <input type="hidden" name="company_select" value="select"/>
                <input type="hidden" name="price_select" value="select"/>
                <input type="hidden" name="company_id" value="<?php echo $attributes["company_id"];?>"/>
                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                <input type="hidden" name="st_select" value="select"/>
                <input type="hidden" name="filename" value="<?php echo 'logo_' .$attributes[stid]. '.jpg'; ?>"/> 
                <input type="Submit" name='btn_db' value="Удалить логотип витрины" />
     </td>
    </form>
</tr>


</table>
<br/>
<table class="dat" width="99%">
    <form action="index.php?act=info" method="post">
    <tr>
        <td align="left" valign="top">
            <strong>Дополнительная информация</strong>
            <br/><br/>
        </td>
        </tr>
        <tr>
            <td><p><strong>О магазине</strong></p>
                <input type="text" size="104" name="about" value="<?php echo $info[about_store];?>"/>
<!--                 <textarea rows="3" cols="104" name="about"></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Центральный офис</strong></p>
                <input type="text" size="104" name="office" value="<?php echo $info[head_office];?>"/>
<!--                 <textarea rows="3" cols="104" name="office"><?php echo $info[head_office];?></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Скидки</strong></p>
                <input type="text" size="104" name="discount" value="<?php echo $info[discount];?>"/>
<!--                 <textarea rows="3" cols="104" name="discount"><?php echo $info[discount];?></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Гарантия</strong></p>
                <input type="text" size="104" name="warranty" value="<?php echo $info[warranty];?>"/>
<!--                 <textarea rows="3" cols="104" name="warranty"><?php echo $info[warranty];?></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Доставка</strong></p>
                <input type="text" size="104" name="delivery" value="<?php echo $info[delivery];?>"/>
<!--                 <textarea rows="3" cols="104" name="delivery"><?php echo $info[delivery];?></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Способы оплаты</strong></p>
                <input type="text" size="104" name="payment" value="<?php echo $info[payment];?>"/>
<!--                 <textarea rows="3" cols="104" name="payment"><?php echo $info[payment];?></textarea>-->
            </td>
        </tr>
        <tr>
            <td><p><strong>Наш телефон</strong></p>
                <input type="text" size="104" name="phone" value="<?php echo $info[phone];?>"/>
<!--                 <textarea rows="3" cols="104" name="payment"><?php echo $info[payment];?></textarea>-->
            </td>
        </tr>
        <tr>
              <td>
                    <input type="hidden" name="company_select" value="select"/>
                    <input type="hidden" name="st_select" value="select"/>
                    <input type="hidden" name="price_select" value="select"/>
                    <input type="hidden" name="price_id" value="<?php echo $storefront_array[0][id];?>"/>
                    <input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/>
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="submit" name="open" value="Сохранить"/>
                
         </td>
    </tr>
    </form>
</table>
<br/>
<?php 
    $domen = my_domen($attributes[stid]);
?>

<table class="dat" width="99%">
    
    <tr>
        <td align="left" valign="top"><strong>Контроль витрины </strong><br><br></td>
              <td>
                <form action="http://<?php echo $domen[where_res];?>/index.php?act=look" method="post" target="_blank">
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION[id];?>"/>
                    <input type="submit" name="open" value="Посмотреть витрину"/>
                </form>
    </td></tr>
</table>
<br/>

<?php
}
else
{
?>
        <table class="dat" width="99%">
<tr>
     <td align="left" valign="top"><strong>Загрузка изображений логотипа витрины</strong><br><br></td>
   </tr><tr> 
    <form enctype="multipart/form-data" action="index.php?act=upload_top_baner" method="post" name="bottom" />
        <td> 
        <input type="hidden" name="logo" value="logo"/>
        <input type="hidden" name="MAX_FILE_SIZE" value="512000"/> 
        <input name="userfile_logo" type="file" size="20"/>
        <input type="hidden" name="company_select" value="select"/>
        <input type="hidden" name="price_select" value="select"/>
        <input type="hidden" name="company_id" value="<?php echo $attributes["company_id"];?>"/>
        <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
        <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
        <input type="hidden" name="st_select" value="select"/>
        <input type="submit" name="logo_btn" value="Загрузить логотип витрины"/>
        </form>
        <br /><br />            
        <small>Максимальный объем загружаемого файла не должен превышать 500 килобайт, формат изображения - JPG. Размер изображения ширина 130, высота 120.</small>
    </td>
 </tr>


</table><br/>

<?php
}
?>

 <br />



<?php
        }
}
if(isset($attributes[msg]) and $attributes[msg]==0)echo '
<table class="dat" width="99%">

    <tr>
        <td align="center" valign="top"><strong>Такой витрины не существует или не загружены изображения товаров. </strong> </strong><br><br>
                </td>
</tr>
</table>
';?>


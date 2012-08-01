<!-- 26,05,2011 AR&copy; rewrited 8.11.2011-->
<?php
   $stores = qry_about_all_stopefront();
    ?>
<table class="dat" width="99%">

    <tr>
        <td width="33%" align="left" valign="top"><strong>Выберите из списка витрину</strong><br><br></td>
<td width="33%" >
	
		<form action="#" method="post"/>
		
<?php $cnt = count($stores);

if($cnt != 0){
    ?>

<select name="stid" class="common">

<?php $i = 0;
foreach ($stores as $key => $value) {

        $selected = "";
                
        if($i == 0){ ?>
        
         <option value="<?php echo $value["id"]; ?>" selected ><?php echo $value["name"]; ?></option>
         
      <?php  }  else {?>
         
           <option value="<?php echo $value["id"];?>" ><?php echo $value["name"];?></option>  
           
      <?php  }
		$i++;
    }
 ?>
</select>  
		<input type="hidden" name="st_select" value="select"/>
               <input type="submit" name="store" value="Выбрать"/>
		</form><br>
    </td>
   
 <?php 
 
 if(isset ($attributes[st_select]) && $attributes[st_select] == 'select'){ 
     
//     include 'qry_domen.php';
     
     $domen = my_domen($attributes[stid]);
     ?>   
    <td width="33%">&nbsp;&nbsp;&nbsp;&nbsp;
        <form action="http://<?php echo $domen[where_res];?>/index.php?act=look" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION[id];?>"/>
            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
            
            <input type="submit" value="Посмотреть витрину"/>
        </form>
    </td>
 <?php } ?>   
</tr>
</table>
<br/>
<?php } 

if(isset ($attributes[st_select]) && $attributes[st_select] == 'select'){

$stores = qry_about_storefronts($attributes[stid]);

?>
<table class="dat" width="99%" border="1">
    
        <tr width="99%">
            <td width="320" style="font-size: 16px; font-weight: bold">
                <p align="center"><?php echo $stores[0][name];?></p>
            </td>
            <td width="320" style="font-size: 16px; font-weight: bold">
                <p align="center">Компания</p>
            </td>
            <td width="320" style="font-size: 16px; font-weight: bold">
                <p align="center">Прайс</p>
            </td>
        </tr>
   
    
  <?php foreach($stores as $value){ ?>
        <tr>     
        <td width="320" style="font-size: 16px;">
                
            </td>
            <td width="320" style="font-size: 16px;">
                <p align="center"><?php echo $value[company];?></p>
            </td>
            <td width="320" style="font-size: 16px;">
                 <p align="center"><?php echo $value[price];?></p>
            </td>
        </tr>


<?php 
}
?>
        </table>
<?php
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
            <img src="../as/act_prewiew.php?src=../images/storefront/logo_<?php echo "$attributes[stid]";?>.jpg&amp;width=120&amp;height=120" alt="<?php echo $filename;?>"/>
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
</table>
<br/>
<?php } 

$filename = "../images/storefront/H_$attributes[stid].jpg"; 

if(file_exists ($filename )){
    ?>
<table class="dat" width="99%">
    <tr>
        <td align="center" valign="center" rowspan="2">
            <img src="../as/act_prewiew.php?src=../images/storefront/H_<?php echo "$attributes[stid]";?>.jpg&amp;width=480&amp;height=96" alt="<?php echo $filename;?>"/>
        </td>
        
</table>
<br/>
<?php
 
}

$filename = "../images/storefront/H_$attributes[stid].jpg"; 

if(file_exists ($filename )){
    ?>
<table class="dat" width="99%">
    <tr>
        <td align="center" valign="center" rowspan="2">
            <img src="../as/act_prewiew.php?src=../images/storefront/F_<?php echo "$attributes[stid]";?>.jpg&amp;width=600&amp;height=136" alt="<?php echo $filename;?>"/>
        </td>
        
</table>

<?php }


} ?>
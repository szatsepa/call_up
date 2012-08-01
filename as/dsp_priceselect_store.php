<?php $query ="SELECT id, comment FROM price WHERE company_id=$attributes[company_id]";
$qry_price = mysql_query($query);

$count_rows = mysql_num_rows($qry_price);

if($count_rows != 0){
    


echo '<select name="price_id" class="common">';

$i = 0;
    while ($row_select = mysql_fetch_assoc($qry_price)) {
        $selected = "";
        if ($i == 0) $selected = "selected";  
         echo  "<option value='".$row_select["id"]."' ".$selected.">".$row_select["comment"]."</option>";
		$i++;
    }
 ?></select> 
 
 <input type="hidden" name="price_select" value="select"/>
                <input type="hidden" name="company_select" value="select"/>
                <input type="hidden" name="company_id" value="<?php echo $attributes["company_id"];?>"/>
                <input type="submit" name="open" value="Добавить" <?php echo $dis; ?>/>
                
                <?php 
  
 } 
 else
 {?>
     <p>Прайсы остутствуют.</p>
         <?php
 }
?>
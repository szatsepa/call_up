<?php 
if (isset($default_company)) {
	$select_name = 'default_company';
} else {
	$select_name = 'company_id';
}
if($attributes[act] == "img_menu")$company_id = intval($_SESSION[user][company_id]);
?>
<select name="<?php echo $select_name;?>" class="common"><?php 
	if (isset($default_company)) echo "<option value='0'>Все компании</option>";
    while ($row_select = mysql_fetch_assoc($qry_companies)) {
        $selected = "";
        
        $name = $row_select[name];
            
        $name = substr($name, 0, 28);
            
        if ($row_select["id"] == $company_id){ ?>
            <option value="<?php echo $row_select["id"];?>" selected><?php echo $name;?></option>";        
       <?php }else if($attributes[act] != "img_menu"){?>
            <option value="<?php echo $row_select[id];?>"><?php echo $name;?></option> 
        <?php }
        
    }
	mysql_data_seek($qry_companies,0);
	if (isset($default_company)) unset($default_company);
?></select>
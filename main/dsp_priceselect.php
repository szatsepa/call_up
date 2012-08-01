<?php

/*
 * created by arcady.1254 1.11.2011
 */
$storefront = query_storefront($attributes[company_id]);

echo '<select name="stid" class="common">';

$i = 0;
    while ($row_select = mysql_fetch_assoc($storefront)) {
        $selected = "";
        if ($i == 0) $selected = "selected";        
        echo  "<option value='".$row_select[id]."' ".$selected.">".$row_select[name]."</option>";
		$i++;
    }
?>
</select>


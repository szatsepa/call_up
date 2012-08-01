<select name="rubrika_id"><?php 
    while ($row = mysql_fetch_assoc($qry_rubrikator)) {
        $selected = "";
        if ($row["id"] == $rubrika_id) $selected = "selected";        
        echo "<option value='".$row["id"]."' ".$selected.">".$row["name"]."</option>";
    }
    mysql_data_seek($qry_rubrikator,0);
   
?></select>

<?php
// To do Переименовать все dsp_xxxselect в dsp_selectxxx
// Здесь глюк с SELECTED!!!
 ?>
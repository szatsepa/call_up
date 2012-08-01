<select name="role" class="common"><?php 
    while ($row = mysql_fetch_assoc($qry_roles)) {
        $selected = "";
        if (!isset($role)) {
            // Ставим по умолчанию Демо-пользователя
            if ($row["id"] == 4) $selected = "selected";
        } else {
            if ($row["id"] == $role) $selected = "selected";
        }
        echo "<option value='".$row["id"]."' ".$selected.">".$row["name"]."</option>";
    }
	mysql_data_seek($qry_roles,0);
?></select>
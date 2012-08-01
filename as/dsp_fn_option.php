<?php 
/* Вывод опций выпадающего списка 
   $db_table -- имя таблицы в БД или выборка
   $value    -- значение опции 
   $name     -- отбражаемое значение или набор значений (через запятую)
   $selected_item -- выбранная опция 
   $condition -- условие для выборки (SQL ANSI)
*/

// To do добавить возможность сортировки

function option ($db_table,$value,$name,$selected_item,$condition) {
    
	if ($selected_item === 0) {
?><option value="">--Выберите из списка--</option> <?php
    }
	
	if ($selected_item === "Пользователи") {
?><option value="0">Все пользователи</option> <?php
    }
// Это название таблицы?
if (gettype($db_table) == 'string') {

    $query = "SELECT $value,
    				 $name
    		FROM $db_table
            WHERE ".$condition;
            
    $input_query = mysql_query($query) or die($query);
}

// Это выборка?
if (gettype($db_table) == 'resource') {
    
    mysql_data_seek($db_table,0);
    $input_query = $db_table;
    
}

// Узнаем, какие поля нам нужно выводить из полученной выборки
$name_output = explode(",", $name);
    
    while ($row = mysql_fetch_assoc($input_query)) {
         
         if ($row[$value] == $selected_item) {
            $selected = 'selected="selected"';
         } else {
            $selected = "";
         }
         
         $display_name = "";
         
         for ($i=0;$i < count($name_output);++$i) {
            $display_name .= "&nbsp;".$row[$name_output[$i]];
         }
?><option value="<?php echo $row[$value];?>" <?php echo $selected;?>><?php echo $display_name;?></option>
<?php
    }
return;
}
?>
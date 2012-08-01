<script type="text/javascript">
	$(document).ready(function(){
	     

        
        $('.psw').live("click", function() {
            
           
            
             $("#ajax_result").load('index.php',{'act':'sendpsw',
                                       'id':$(this).attr("id")}); 
            
            //alert ($(this).attr("id"));
            
            return false;
        }); 
	    
		 		
    });
 
</script>

<p id="ajax_result"></p>
<table class="dat">
<th class="dat">Id</th>
<th class="dat">Ф.И.О.</th>
<th class="dat">Компания</th>
<th class="dat">E-mail</th>
<th class="dat">Телефон</th>
<th class="dat">Роль</th>
<th class="dat">Рeдирект</th>
<th class="dat"></th>
<th class="dat"></th>
<th class="dat"></th>

<?php 
while ($row = mysql_fetch_assoc($qry_users)) {
    echo "<tr>";
    echo "<td class='dat'>".$row["id"]."</td>";
    echo "<td class='dat'>".$row["surname"]." ".$row["name"]." ".$row["patronymic"]."</td>";
    echo "<td class='dat'>".$row["company_name"]."</td>";
    echo "<td class='dat'>".$row["email"]."</td>";
    echo "<td class='dat'>".$row["phone"]."</td>";
    echo "<td class='dat'>".$row["role_name"]."</td>";
	echo "<td class='dat'>";
	if ($row["default_company"] > 0) {
		$company_id      = $row["default_company"];
		// Управление для SELECT-OPTIONS
		$default_company = 'true';
		echo "<form action=''>";
		include ("dsp_companyselect.php");
		echo "</form>";
		unset ($company_id);
	}
	echo "&nbsp;</td>";
    echo "<td class='dat'><a href='index.php?act=user_edit&id=".$row["id"]."'>Редакт.</a></td>";
    echo "<td class='dat'><a href='index.php?act=user_delete&id=".$row["id"]."'>Удалить</a></td>";
	echo "<td class='dat'><a href='#' class='psw' id='p".$row["id"]."'>Пароль</a></td>";
?>
        
<?php        
    echo "</tr>";
}


?>
</table>
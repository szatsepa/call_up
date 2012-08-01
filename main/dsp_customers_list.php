<?php

/*
 *create by arcady.1254 31.10.2011
 */
?>
<script type="text/javascript">
	$(document).ready(function(){
	     

        
        $('.psw').live("click", function() {
            
           
            
             $("#ajax_result").load('index.php',{'act':'sendpsw',
                                       'id':$(this).attr("id")}); 
            
            //alert ('act=sendpsw&id'.$(this).attr("id"));
            
            return false;
        }); 
	    
		 		
    });
 
</script>

<p id="ajax_result"></p>
<table class="dat">
<th class="dat">Id</th>
<th class="dat">Ф.И.О.</th>
<th class="dat">Телефон</th>
<th class="dat">E-mail</th>
<th class="dat">Адрес доставки</th>
<th class="dat">Пожелания</th>
<th class="dat"></th>
<th class="dat"></th>
<th class="dat"></th>

<?php 
while ($row = mysql_fetch_assoc($qry_customers)) {
    echo "<tr>";
    echo "<td class='dat'>".$row["id"]."</td>";
    echo "<td class='dat'>".$row["surname"]." ".$row["name"]." ".$row["patronymic"]."</td>";
    echo "<td class='dat'>".$row["phone"]."</td>";
    echo "<td class='dat'>".$row["e_mail"]."</td>";
    echo "<td class='dat'>".$row["shipping_address"]."</td>";
    echo "<td class='dat'>".$row["desire"]."</td>";
    echo "<td class='dat'><a href='index.php?act=customer_edit&id=".$row["id"]."&stid=".$row["storefront"]."'>Редакт.</a></td>";
    echo "<td class='dat'><a href='index.php?act=customer_delete&id=".$row["id"]."&stid=".$row["storefront"]."'>Удалить</a></td>";
    echo "<td class='dat'><a href='#' class='psw' id='p".$row["id"]."'>Пароль</a></td>";
   
    ?>
        
<?php        
    echo "</tr>";
}


?>
</table>

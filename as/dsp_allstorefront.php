<!-- 31,05,2011 AR&copy; -->
<?php


$query = "SELECT `id`, `comment` FROM `price` WHERE `company_id`=$attributes[company_id]";

$qry_storefrons = mysql_query($query);

?>
<br>

<table class="dat" width="99%">

    <tr>
        <td align="left" valign="top"><strong>Выберите из списка витрину</strong><br><br></td>

	<form action="http://w.animals-food.ru/custom/index.php?act=customer&cod=1vacDG47ecit32wWHZ" method="post"><td>
	<select name="price_id" class="common">	
<?php
$step = 0;
while($row = mysql_fetch_assoc($qry_storefrons)){

	$id = $row["id"];
	$comment = $row["comment"];

	$selected = '';

	if ($step == 0){        
        $selected = 'selected';
		}
// временная заплатка шоп работало потом надо решить радикально
                
                $attributes[price_id] = 32;
                
		echo  "<option value='".$row["id"]."'".$selected.">".$row["comment"]."</option>";
}

?>
	</select>
		<input type="hidden" name="company_id" value=<?php echo $attributes[company_id];?>/>
              
                <!--<input type="hidden" name="cod" value="<?php // echo md5name($attributes[user_id],$attributes[company_id],$attributes[price_id]);?>"/>
		--> 
                <input type="hidden" name="company_select" value="select"/>
		<input type="submit" name="store" value="Выбрать"/>
		</form><br>
    </td> 
</tr><tr>



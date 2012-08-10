<?php

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']))
{
   print "Файл успешно загружен.\n";    
} 
	else 
{
    print "Произошла ошибка при загрузке файла.";
}

$nameoffile = $_FILES['userfile']['name'];

$row = 1;
$handle = fopen ($nameoffile,"r");
// Количество успешно добавленных строк
$sucs = 0;


$query2 = "DELETE FROM pricelist";
$result = mysql_query($query2) or die("Ошибка базы данных.Невозможно занести данные в таблицу.");

// Имя текущей группы не установлено
$group_flag = 0;

while ($data = fgetcsv ($handle, 10000,";")) {
    
    
	// Пропускаем первые 13 строк прайса
	if ($row < 14) 
		{
			$row++;
			continue;
		}
	
	// Пропускаем строки без данных	
	if ($data[1] == '' and $data[2] == '') 
		{
			$row++;
			continue;
		}
	
	if ($data [1] == '' and $group_flag == 0)
		{
			$group = $data [2];
			// Имя уже образовалось
			$group_flag = 1;
			$row++;
			continue;
		}
		
	// Дополняем имя группы	
	if ($data [1] == '' and $group_flag == 1)
		{
			$group = $group." ".$data [2];	
			$row++;
			continue;
		}
	
	// Появились данные на продукцию, сбрасываем флаг установки имени группы, ждем новую группу
	if ($data[1] != "")
		{
			$group_flag = 0;
		}
	
	
	$row++;
	$actual_row = $row - 1;
	$error = false;
	
	$data[8] = str_replace (",",".",$data[8]);
	$data[8] = str_replace (" ","",$data[8]);
	$data[9] = str_replace (",",".",$data[9]);
	$data[9] = str_replace (" ","",$data[9]);
	$group   = str_replace ('"','',$group);
	$group   = str_replace ("'","",$group);
	
	if ($data[8] == '') $data[8] = 0;
	if ($data[9] == '') $data[9] = 0;
	
	
	$query3 = "INSERT INTO pricelist (str_code1,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,str_group) VALUES ('$data[1]','$data[2]','$data[3]','$data[5]','$data[6]','$data[7]',$data[8],$data[9],$data[10],'$group')";
	$result = mysql_query($query3) or die($query3."<br>");
	
	
	$sucs++;
	
}


fclose ($handle);
echo "<p>В базу занесено ".$sucs." записей.</p>";
unlink ($nameoffile);


 ?>
 
<br />
<br />
 
<a href="index.php" class="header">Вернуться на начальную страницу</a><br />
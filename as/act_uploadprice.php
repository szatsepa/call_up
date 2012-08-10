<?php
// To do проверять дублирование артикулов в одном прайсе

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']))
{
  // print "Файл успешно загружен.\n";    
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

$query2 = "DELETE FROM pricelist WHERE pricelist_id=$attributes[price_id]";

$result = mysql_query($query2) or die($query2);

// Имя текущей группы не установлено
$group_flag = 0;

while ($data = fgetcsv ($handle, 65636,";")) {
    
//    print_r($data);
//    echo "<br/>";
	if ($data [0] == '' and $data [1] == '' and $group_flag == 0)
		{
			$group = $data [2];
			// Имя уже образовалось
			$group_flag = 1;
			$row++;
			continue;
		}
		
	// Дополняем имя группы	
	if ($data [0] == '' and $data [1] == '' and $group_flag == 1)
		{
			$group = $group." ".$data [2];	
			$row++;
			continue;
		}
	
	// Появились данные на продукцию, сбрасываем флаг установки имени группы, ждем новую группу
	if ($data[0] != "")
		{
			$group_flag = 0;
		}
	
	
	$row++;
	$actual_row = $row - 1;
	$error = false;
	
    // Избавляемся от букв в имени артикула

    
	$data[8] = str_replace (",",".",$data[8]);
	$data[8] = str_replace (" ","",$data[8]);
	$data[9] = str_replace (",",".",$data[9]);
	$data[9] = str_replace (" ","",$data[9]);
	$group   = str_replace ('"','',$group);
	$group   = str_replace ("'","",$group);
	
	if ($data[8] == '') $data[8] = 0;
	if ($data[9] == '') $data[9] = 0;
	
    // Установлен ли безлимитный остаток?
    if (isset($attributes[limit]) and $attributes[limit] == 1){
        // Признак безлимитного остатка
        $data[10] = 999999999;
    }
	
    $artikul	      = quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[0]));
    $str_barcode      = quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[1]));
    $str_code2        = quote_smart(iconv("WINDOWS-1251", "UTF-8",$data[2]));
    $str_name         = quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[3]));
    $str_state        = quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[4]));
    $str_volume       = quote_smart(iconv("WINDOWS-1251", "UTF-8",$data[5]));
    $str_package      = quote_smart(iconv("WINDOWS-1251", "UTF-8",$data[6]));
    $num_price_single = intval($data[7]);
    $num_price_pack   = intval($data[8]);
    $num_amount       = intval($data[9]);
    $str_group        = quote_smart(iconv("WINDOWS-1251", "UTF-8",$data[10]));
    $str_unit         = quote_smart(iconv("WINDOWS-1251", "UTF-8",$data[12]));
    $pricelist_id     = intval($attributes[price_id]);  
    
	$query3 = "INSERT INTO pricelist 
					   (str_code1,
					    str_barcode,
					  	str_code2,
					   	str_name,
						str_state,
						str_volume,
						str_package,
						num_price_single,
						num_price_pack,
						num_amount,
						str_group,
						pricelist_id,
                                                str_unit) 
				VALUES ($artikul,
						$str_barcode,
						$str_code2,
						$str_name,
						$str_state,
						$str_volume,
						$str_package,
						$num_price_single,
						$num_price_pack,
						$num_amount,
						$str_group,
						$pricelist_id,
                                                $str_unit)";
						
	$result = mysql_query($query3) or die($query3."<br>");

        
	$sucs++;

}

fclose ($handle);
$javascript = "javascript:alert('Прайс загружен. Занесено ".$sucs." записей.');";

// Здесь установим сообщение об успешном обновлении информации
$eid = 2;

unlink ($nameoffile);

$query4 = "UPDATE price SET creation=now() where id=$attributes[price_id]";

$qry_updateprice = mysql_query($query4) or die($query4);

 ?>
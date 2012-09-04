<?php 
// Вывод CSV-файла

//header("Content-type: text/plain");

$filename = "proforma".date("Ymd").".csv";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");


$out .= "НомерЗаявки;Артикул;НаименованиеГруппы;Количество;ID_Контрагента;Комментарий;НаименованиеНоменклатуры;Принят;ОдобренПоставщиком;\n";

$num_rows = 1;
foreach ($report_array as $row) { 
	$out .= '"'.$row[НомерЗаявки].'";';
        $out .= '"'.$row[Артикул].'";';
        $out .= '"'.$row[НаименованиеГруппы].'";';
        $out .= '"'.$row[Количество].'";';
        $out .= '"'.$row[ID_Контрагента].'";';
        $out .= '"'.$row[Комментарий].'";';
        $out .= '"'.$row[НаименованиеНоменклатуры].'";';
        $out .= '"'.$row[Принят].'";';
        $out .= '"'.$row[ОдобренПоставщиком].'";';
        $out .= ";\n"; 
$num_rows++;	
}

if (count($report_array) == 0) {

	$out .= "'Нет данных';;;;;;;;;\n";

}

$out = iconv("UTF-8", "WINDOWS-1251", $out);

echo $out;

?>
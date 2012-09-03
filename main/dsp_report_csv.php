<?php 
// Вывод CSV-файла

//header("Content-type: text/plain");

$filename = "proforma".date("Ymd").".csv";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");


$out .= "НомерСтроки;НомерЗаявки;Артикул;Количество;СуммаСНДС;ИНН;НаименованиеКонтрагента;ЮрАдрес;ФактАдрес;Комментарий;НаименованиеНоменклатуры;Вес;СтавкаНДС;ОКПО;БанкРеквизиты;\n";

$num_rows = 1;
foreach ($report_array as $row) { 
        $out .= "$num_rows;";
	$out .= "$row[НомерЗаявки];";
        $out .= "$row[Артикул];";
        $out .= "$row[Количество];";
        $out .= "$row[СуммаСНДС];";
        $out .= "$row[ИНН];";
        $out .= "$row[НаименованиеКонтрагента];";
        $out .= "$row[ЮрАдрес];";
        $out .= "$row[ФактАдрес];";
        $out .= "$row[Комментарий];";
        $out .= "$row[НаименованиеНоменклатуры];";
        $out .= "$row[Вес];";
        $out .= "$row[СтавкаНДС];";
        $out .= "$row[ОКПО];";
        $out .= "$row[БанкРеквизиты];";
        $out .= ";\n";
$num_rows++;	
}

if (count($report_array) == 0) {

	$out .= "Нет данных;;;;;;;;;\n";

}

$out = iconv("UTF-8", "WINDOWS-1251", $out);

echo $out;

?>
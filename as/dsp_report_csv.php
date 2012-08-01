<?php 
// Вывод CSV-файла

//header("Content-type: text/plain");

$filename = "report".date("dmyGis").".csv";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");

$out .= "Дата;Номер заказа;Поставщик;Время исполнения;Заказчик;Сумма заказа;Тема;Прайс-лист ID;Дополнительные данные;\n";

while ($row = mysql_fetch_assoc($qry_otchet)) {

	$out .= date("d.m.y",$row["time_timestamp"]).";";
	$out .= $row["id"].";";
	$out .= $row["name"].";";
	$out .= date("G:i",$row["time_timestamp"]).";";
	$out .= $row["surname"].";";
	$out .= $row["summa_zakaza"].";";
	$out .= ";";
	$out .= $row["price_id"].";";
	$out .= ";\n";
	
}

if (mysql_num_rows($qry_otchet) == 0) {

	$out .= "Нет данных;;;;;;;;;\n";

}

echo $out;

?>
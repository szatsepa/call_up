<?php
//created by arcady.1254@gmail.com 28/1/2012

$company_id = intval($attributes[company_id]);

$query = "SELECT a.c_number AS НомерЗаявки, 
                 ag.artikul AS Артикул, 
                 p.str_group AS НаименованиеГруппы,
                 ag.amount AS Количество,
                 (c.id) AS ID_Контрагента,
                 a.comments AS Комментарий, 
                 p.str_name AS НаименованиеНоменклатуры , 
                a.time AS Принят,
                z.time AS ОдобренПоставщиком
           FROM arch_zakaz AS a, 
                arch_goods AS ag , 
                pricelist AS p,
                price AS pr,
                customer AS c,
                zakaz_history AS z
          WHERE a.report = 0 
          AND a.id = ag.zakaz 
          AND ag.artikul = p.str_code1
          AND p.pricelist_id = pr.id
          AND a.customer = c.id
          AND z.id = a.id
          AND pr.company_id = $company_id
          ORDER BY a.id"; 

$result = mysql_query($query) or die($query);

$report_array = array();

while ($var = mysql_fetch_assoc($result)){
    
//    mysql_query("UPDATE arch_zakaz SET report = 1 WHERE id = $var[НомерЗаявки]");
    
    array_push($report_array, $var);
    
}

mysql_free_result($result);

$query = "SELECT a.c_number AS НомерЗаявки, 
                 ag.artikul AS Артикул,  
                 ag.amount AS Количество,
                 p.str_group AS НаименованиеГруппы,
                 (c.id) AS ID_Контрагента,
                 a.comments AS Комментарий, 
                 p.str_name AS НаименованиеНоменклатуры , 
                a.time AS Принят,
                z.time AS ОдобренПоставщиком
           FROM arch_zakaz AS a, 
                arch_goods AS ag , 
                pricelist AS p,
                price AS pr,
                users AS c,
                zakaz_history AS z
          WHERE a.report = 0 
          AND a.id = ag.zakaz 
          AND ag.artikul = p.str_code1
          AND p.pricelist_id = pr.id
          AND a.user_id = c.id
          AND z.id = a.id
          AND pr.company_id = $company_id
          ORDER BY a.id";

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    
    mysql_query("UPDATE arch_zakaz SET report = 1 WHERE id = $var[НомерЗаявки]");
    
    array_push($report_array, $var);
    
}

mysql_free_result($result);

?>
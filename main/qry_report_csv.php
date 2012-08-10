<?php
//created by arcady.1254@gmail.com 28/1/2012

$company_id = intval($attributes[company_id]);

$query = "SELECT a.id AS НомерЗаявки, 
                 ag.artikul AS Артикул,  
                 ag.amount AS Количество, 
                (ag.amount*ag.price_single) AS СуммаСНДС, 
                 NULL AS ИНН,
                 CONCAT(c.surname, ' ', c.name, ' ', c.patronymic) AS НаименованиеКонтрагента, 
                 NULL AS ЮрАдрес,
                 NULL AS ФактАдрес, 
                 a.comments AS Комментарий, 
                 p.str_name AS НаименованиеНоменклатуры , 
                (ag.amount*p.str_volume) AS Вес, 
                 NULL AS СтавкаНДС ,
                 NULL AS ОКПО , 
                 NULL AS БанкРеквизиты 
           FROM arch_zakaz AS a, 
                arch_goods AS ag , 
                pricelist AS p,
                price AS pr,
                customer AS c
          WHERE a.report = 0 
          AND a.id = ag.zakaz 
          AND ag.artikul = p.str_code1
          AND p.pricelist_id = pr.id
          AND a.customer = c.id
          AND pr.company_id = $company_id";

$result = mysql_query($query) or die($query);

$report_array = array();

while ($var = mysql_fetch_assoc($result)){
    
    mysql_query("UPDATE arch_zakaz SET report = 1 WHERE id = $var[НомерЗаявки]");
    
    array_push($report_array, $var);
    
}

mysql_free_result($result);

$query = "SELECT a.id AS НомерЗаявки, 
                 ag.artikul AS Артикул,  
                 ag.amount AS Количество, 
                (ag.amount*ag.price_single) AS СуммаСНДС, 
                 NULL AS ИНН,
                 CONCAT(c.surname, ' ', c.name, ' ', c.patronymic) AS НаименованиеКонтрагента, 
                 NULL AS ЮрАдрес,
                 NULL AS ФактАдрес, 
                 a.comments AS Комментарий, 
                 p.str_name AS НаименованиеНоменклатуры , 
                (ag.amount*p.str_volume) AS Вес, 
                 NULL AS СтавкаНДС ,
                 NULL AS ОКПО , 
                 NULL AS БанкРеквизиты 
           FROM arch_zakaz AS a, 
                arch_goods AS ag , 
                pricelist AS p,
                price AS pr,
                users AS c
          WHERE a.report = 0 
          AND a.id = ag.zakaz 
          AND ag.artikul = p.str_code1
          AND p.pricelist_id = pr.id
          AND a.user_id = c.id
          AND pr.company_id = $company_id";

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    
    mysql_query("UPDATE arch_zakaz SET report = 1 WHERE id = $var[НомерЗаявки]");
    
    array_push($report_array, $var);
    
}

mysql_free_result($result);

?>
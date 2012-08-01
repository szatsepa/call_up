<?php
$attributes[company_id] = intval($_POST[company_id]);

// Уберем старое значение
$query = "DELETE FROM tmp";
$qry_companyadvertdel = mysql_query($query) or die($query);

$query = "INSERT INTO tmp SET company_id=$attributes[company_id]";
$qry_updcompanyadvert = mysql_query($query) or die($query);

?>
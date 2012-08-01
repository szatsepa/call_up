<?php

$query = "SELECT a.id,
                 DATE_FORMAT(a.time, '%d.%m.%y %H:%i') zakaz_date,
                 a.user_id,
                 u.surname
          FROM arch_zakaz  a
          LEFT OUTER JOIN users u
          ON u.id = a.user_id
          ORDER BY a.id DESC";

$qry_archzakaz = mysql_query($query) or die($query);

?>
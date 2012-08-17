<?php

function qry_customer ($arg) {
    $query = "SELECT id,
        surname,
        name,
        patronymic,
        phone,
        e_mail,
        registration_ip,
        shipping_address,
        desire
    FROM customer
    WHERE id=$arg";

$qry_user = mysql_query($query) or die($query);

return  mysql_fetch_assoc($qry_user);
}
 ?>
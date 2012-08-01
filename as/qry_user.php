<?php

function query_user ($arg) {
    $query = "SELECT u.id,
                     u.role,
                     u.surname,
                     u.name,
                     u.patronymic,
                     u.email,
                     u.phone,
                     u.company_id,
                     u.pwd,
                     c.name AS company_name,
                     DATE_FORMAT(u.expiration, '%d.%m.%Y') expiration,
                     r.rights,
					 u.default_company
              FROM users u, 
                   companies c,
                   roles r
              WHERE u.id=$arg AND 
                    u.company_id=c.id AND 
                    u.role = r.id";

$qry_user = mysql_query($query) or die($query);

return  mysql_fetch_assoc($qry_user);
}
 ?>
<?php
/*
Необходима адаптивная выборка данных для разных пользователей.
Для СА -- все пользователи/админы.
Для админов -- только пользователи своей компании.
*/

$query = "SELECT 
				u.id,
				u.role,
                r.name AS role_name,
				u.surname,
				u.name,
				u.patronymic,
				u.email,
				u.phone,
				u.company_id,
				u.pwd,
				c.name company_name,
				c.status,
				u.status,
				u.default_company
			FROM users u, companies c, roles r 
			WHERE u.company_id = c.id 
            AND r.id     = u.role
			AND c.status > 0
			AND u.status = 1
			ORDER BY u.surname";
$qry_users = mysql_query($query) or die($query);

                $query = "SELECT
				u.id,
				u.surname,
				u.name,
				u.patronymic,
				u.e_mail AS email,
				u.phone,
				u.secret_key AS pwd
			FROM customer u 
			ORDER BY u.surname";
$qry_customers = mysql_query($query) or die($query);

 ?>
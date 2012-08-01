<?php 
$query = "SELECT id,
                 creation,
                 time,
                 expiration,
                 role,
                 company_id,
                 message,
                 status,
                 resurs
			FROM messages  
			ORDER BY id";
            
$qry_messages = mysql_query($query) or die($query);
?>
<?php

/*
 * created by arcady1254 1.11.2011
 */
function query_customer($id){
    
    $query = "SELECT surname, name, e_mail, secret_key FROM customer WHERE id = $id";
    
    $qry_secret_key = mysql_query($query) or die ($query);
    
    $row = mysql_fetch_assoc($qry_secret_key);
        
    return $row;  
}
?>

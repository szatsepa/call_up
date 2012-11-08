<?php
if(!isset($_SESSION)){  

    session_start();  
}

include 'connect.php';

$login = $_POST[login];

$password = $_POST[password];

$out = array('uid'=>NULL);

$result = mysql_query("SELECT id FROM d_admin WHERE login = '$login' AND password = '$password'");

if($result){
    $row = mysql_fetch_row($result);
    
    $out['uid'] = $row[0];
    
    $_SESSION[auth] = 'yes';
    
}

echo json_encode($out);

mysql_close();
?>

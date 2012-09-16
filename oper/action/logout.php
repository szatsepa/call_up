<?php

while ($attributes){
    array_pop($attributes);
}

session_unset();

session_destroy();

header("location:index.php");
?>

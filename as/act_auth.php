<?php 

if (isset($attributes[code])){
    if ($attributes[code] == "1") {
        setcookie("auth", "1", time()+600);
        header ("location:index.php?act=main");
    } else {
    $javascript = "javascript:alert('Неверный ключ');";
    }
}

?>
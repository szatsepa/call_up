<?php

if (isset($attributes[query_str])) {

    header ("location:index.php?$attributes[query_str]");

} else {

    header ("location:index.php");

}
?>
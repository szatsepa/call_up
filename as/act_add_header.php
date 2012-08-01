<?php

$price_id = quote_smart($attributes[price_id]);
$left = quote_smart($attributes[left]);
$center = quote_smart($attributes[center]);
$top = quote_smart($attributes[right_top]);
$bottom = quote_smart($attributes[right_bottom]);

$query = "INSERT INTO header_story
                    (price_id,
                    left,
                    center,
                    right_top,
                    right_bottom)
                VALUES
                    ($price_id,
                    $left,
                    $center,
                    $top,
                    $bottom)";

$act_header = mysql_query($query) or die($query);

if($act_header){
    
    header("location:index.php");
}

?>

<?php 
if (isset($attributes[dsp]) and $attributes[dsp] == 'kabinet') {
    header ("location:index.php?act=kabinet".$urladd); 
} else {
    header ("location:index.php?act=supplier".$urladd); 
}
?>
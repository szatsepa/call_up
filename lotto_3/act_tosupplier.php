<?php 
if (isset($attributes[dsp]) and $attributes[dsp] == 'private_office') {}
    header ("location:index.php?act=private_office&cod=$_SESSION[cod]".$urladd); 

?>
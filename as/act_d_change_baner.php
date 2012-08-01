<?php

/*
 * created by arcdy.1254@gmail.com 11/1/2012
 */

if(isset ($attributes[filename]) && $attributes[filename]){
    
   echo  $attributes[filename];
   
   $filename = $document_root.$attributes[filename];
   
   unlink($filename);
}
?>

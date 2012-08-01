<?php

/*
 * created by arcady.1254@gmail.com 9/1/2012
 * 
 */

$imgfile_b   = $document_root . '/images/advert/' . basename($_FILES['imgfile']['name']);

$stid = intval($attributes[stid]);

$num_b = intval($attributes[num_baner]);

$num_b += 1;

$size = intval($attributes[MAX_FILE_SIZE]);

if($size > $_FILES['imgfile']['size']){
    
    $filetype = $_FILES['imgfile']['name'];
    
    $tmp_arr = explode(".",$filetype);
    
    $filetype = $tmp_arr[1];
    
    unset ($tmp_arr);
    
    $type = 0;
    
    if($filetype == 'swf') $type = 1;
    
       
if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $imgfile_b)) {
    
           $javascript = "javascript:alert('Ошибка при копировании файла');";
           
        } else {
            
            $flnm = rnd_Cod();
            
             $new_imgfile = $document_root."images/advert". $flnm.$filetype;
             
             $attributes[name] = "/images/advert/ $flnm.$filetype";
             
             $attributes[type] = $type;
             
            // Убьем старый файл
            if (file_exists($new_imgfile)) {
                unlink ($new_imgfile);
            }
            
            // Переименуем загруженный файл
            rename ($imgfile_b, $new_imgfile);
            $javascript = "javascript:alert('Банер успешно загружен');";
            
            
        }
        
}  else {
    
    $javascript = "javascript:alert('Файл слишком велик.');";
}
        
?>

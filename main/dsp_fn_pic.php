<?php
// Функция выводит логотип компании
// name -- имя картинки
// size -- ширина картинки

function pic($name,$size) {
	
	
	global $document_root, $host;

	$pic_root =  $document_root . '/images/goods/'; 
	$picture  =  $pic_root.$name;

    if (file_exists($picture)) {
        list($width, $height, $type, $attr) = getimagesize($picture);
        
		// Масштабируем изображения
        if ($width > $size) {
            $scale     = $size / $width;
            $newheight = round($height * $scale);
            $newwidth  = $size;
        } else {
            $newheight = $height;
            $newwidth  = $width;
        }		
		?><img src="http://<?php echo $host; ?>/images/goods/<?php echo $name; ?>" border="0" alt="" align="top" hspace="1" vspace="1" width="<?php echo $newwidth; ?>" height="<?php echo $newheight; ?>"><?php
		
    }

return;
}
?>

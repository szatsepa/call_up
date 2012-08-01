<?php
// Функция выводит логотип компании
// id   -- идентификатор компании
// name -- имя компании
// $document_root -- корень документов
// size -- ширина логотипа

function dsp_logo($id,$name,$document_root,$size) {

$logos_root  =  $document_root . '/images/logos/'; 
$picture  =  $logos_root."logo_".$id.".gif";

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
		?><img src="images/logos/logo_<?php echo $id; ?>.gif" border="0" alt="<?php echo $name; ?>" valign="top"  align="right" hspace="0" vspace="0" width="<?php echo $newwidth; ?>" height="<?php echo $newheight; ?>"><?php
		
    }

return;
}
?>
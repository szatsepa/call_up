<?php 

// To do сделать это в качестве функции???

$filename  = md5name($attributes[artikul]);
$filename .= ".jpg";

$fullname = $document_root . '/images/goods/' . $filename;

// Убьем старый файл
if (file_exists($fullname)) {
	unlink ($fullname);
	$error = "&error=img_del_ok";
} else {
	$error = "&error=img_no_del";
}
?>
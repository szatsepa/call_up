<?php 

// To do сделать это в качестве функции???

if (isset($attributes[tag])) {

	$filename  = md5name($attributes[tag]);
	$filename .= ".jpg";
	
	$fullname = $document_root . '/images/tags/' . $filename;
	
	// Убьем старый файл
	if (file_exists($fullname)) {
		unlink ($fullname);
		$error = "&error=img_del_ok";
	} else {
		$error = "&error=img_no_del";
	}
}
?>
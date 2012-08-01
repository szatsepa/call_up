<?php 

// To do сделать это в качестве функции

$new_uploadfile = $document_root . '/images/logos/logo_' . $attributes[company_id] . '.gif';

// Убьем старый файл
if (file_exists($new_uploadfile)) {
	unlink ($new_uploadfile);
	$error = "&error=img_del_ok";
} else {
	$error = "&error=img_no_del";
}
?>
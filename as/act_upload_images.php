<?php 
/*
 * created by arcady.1254 7.11.2011
 */

$uploadfile_top   = $document_root . '/images/storefront/' . basename($_FILES['userfile_t']['name']);
$uploadfile_bottom   = $document_root . '/images/storefront/' . basename($_FILES['userfile_b']['name']);
$uploadfile_logo = $document_root.'/images/storefront/' . basename($_FILES['userfile_logo']['name']);

$size = $_FILES['userfile_t']['size'];


if ($size < 512000) {
	 
	// image is top-baner?


	  if (isset($attributes[top_btn])) {

		if (!move_uploaded_file($_FILES['userfile_t']['tmp_name'], $uploadfile_top)) {
           $javascript = "javascript:alert('Ошибка при копировании файла');";
        } else {
            $new_uploadfile = $document_root.'/images/storefront/H_'. $attributes[stid].'.jpg';
            // Убьем старый файл
            if (file_exists($new_uploadfile)) {
                unlink ($new_uploadfile);
            }
            
            // Переименуем загруженный файл
            rename ($uploadfile_top, $new_uploadfile);
            $javascript = "javascript:alert('Верхний банер успешно загружен');";
        }
   }
      	  if (isset($attributes[logo_btn])) {

		if (!move_uploaded_file($_FILES['userfile_logo']['tmp_name'], $uploadfile_logo)) {
           $javascript = "javascript:alert('Ошибка при копировании файла');";
        } else {
            $new_uploadfile = $document_root.'/images/storefront/logo_'. $attributes[stid].'.jpg';
            // Убьем старый файл
            if (file_exists($new_uploadfile)) {
                unlink ($new_uploadfile);
            }
            
            // Переименуем загруженный файл
            rename ($uploadfile_logo, $new_uploadfile);
            $javascript = "javascript:alert('Логотип успешно загружен');";
            
           // header("#");
        }
   }
		
		// image is bottom-baner

	if (isset($attributes[bottom_btn])) {

		if (!move_uploaded_file($_FILES['userfile_b']['tmp_name'], $uploadfile_bottom)) {
           $javascript = "javascript:alert('Ошибка при копировании файла');";
        } else {
            $new_uploadfile = $document_root.'/images/storefront/F_'. $attributes[stid].'.jpg';
            // Убьем старый файл
            if (file_exists($new_uploadfile)) {
                unlink ($new_uploadfile);
            }
            
            // Переименуем загруженный файл
            rename ($uploadfile_bottom, $new_uploadfile);
            $javascript = "javascript:alert('Нижний банер успешно загружен');";
        }
   }


}



    if (!isset($javascript)) {
        $javascript = "javascript:alert('Ошибка загрузки. Проверьте тип и размер файла.');";
    }else{ ?>
         <form action="index.php?act=strf" method="post">
    <script language="javascript">
    document.write ('<input name="company_select" type="hidden" value="select"><input name="st_select" type="hidden" value="select"><input name="price_select" type="hidden" value="select"><input type="hidden" name="company_id" value="<?php echo $attributes[company_id];?>"/><input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/><input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/></form>');
    document.forms[0].submit();
    </script> <?php
    }
?>
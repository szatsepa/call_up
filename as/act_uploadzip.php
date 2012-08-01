<?php 
// Модуль загрузки архивов и логотипов

// TO DO сделать проверку на удаление предыдущего логотипа!!!

$uploadfile_zip   = $document_root . '/images/goods/' . basename($_FILES['userfile']['name']);
$uploadfile_logos = $document_root . '/images/logos/' . basename($_FILES['userfile']['name']);
$uploadfile_tags  = $document_root . '/images/tags/' . basename($_FILES['userfile']['name']);
$uploadfile_tmp   = $document_root . '/images/tmp/' . basename($_FILES['userfile']['name']);
$uploadfile_top   = $document_root . '/images/storefront/' . basename($_FILES['userfile_t']['name']);
$uploadfile_bottom   = $document_root . '/images/storefront/' . basename($_FILES['userfile_b']['name']);
$uploadfile_logo = $document_root.'/images/storefront/' . basename($_FILES['userfile_logo']['name']);

$size = $_FILES['userfile_t']['size'];

if(!$size){
	$suze = $_FILES['userfile_b']['size'];
}

    if ($_FILES['userfile']['type'] == 'image/gif' and isset($attributes[company_id]) and $_FILES['userfile']['size'] < 512000) {
        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile_logos)) {
           $javascript = "javascript:alert('Ошибка при копировании файла');";
        } else {
            $new_uploadfile = $document_root . '/images/logos/logo_' . $attributes[company_id] . '.gif';
            // Убьем старый файл
            if (file_exists($new_uploadfile)) {
                unlink ($new_uploadfile);
            }
            
            // Переименуем загруженный файл
            rename ($uploadfile_logos, $new_uploadfile);
            $javascript = "javascript:alert('Логотип успешно загружен');";
        }
    }


if (($_FILES['userfile_t']['type'] == 'image/jpeg' or  $_FILES['userfile_b']['type'] == 'image/jpeg' or  $_FILES['userfile_logo']['type'] == 'image/jpeg') and $size < 512000) {
	
	// image is top-baner?


	  if (isset($attributes[top_btn])) {

		if (!move_uploaded_file($_FILES['userfile_t']['tmp_name'], $uploadfile_top)) {
           $javascript = "javascript:alert('Ошибка при копировании файла');";
        } else {
            $new_uploadfile = $document_root.'/images/storefront/H_'. $attributes[company_id].'_'.$attributes[price_id].'.jpg';
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
            $new_uploadfile = $document_root.'/images/storefront/logo_'. $attributes[company_id].'_'.$attributes[price_id].'.jpg';
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
            $new_uploadfile = $document_root.'/images/storefront/F_'. $attributes[company_id].'_'.$attributes[price_id].'.jpg';
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
	
   if (($_FILES['userfile']['type'] == 'image/jpeg' or $_FILES['userfile']['type'] == 'image/pjpeg') and $_FILES['userfile']['size'] < 512000) {

		// Картинка тега?
		if (isset($attributes[tag])) {
		
			$newname = md5name($attributes[tag]);
	        $newname .= $ext;
	        $fullname = $document_root . '/images/tags/' . $newname;
	        
	        // Убьем старый файл
	         if (file_exists($fullname)) {
	            unlink ($fullname);
	         }
					
		   	if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile_tags)) {
	           $javascript = "javascript:alert('Ошибка при копировании файла');";
	        } else { 
				rename ($uploadfile_tags,$fullname);
	            $javascript = "javascript:alert('Изображение тэга успешно загружено');";
	        }
			
		} 
		
		// Картинка товара?
		if (isset($attributes[barcode])) {
		
			
			if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile_tmp)) {
	           //$javascript = "javascript:alert('Ошибка при копировании файла');";
			   echo 'Ошибка при копировании файла';
			   exit;
			} else { 
				
				// Стираем старое изображение основного изображения или штрих-кодов
				if ($attributes[pictype] == 1 or $attributes[pictype] == 3 or $attributes[pictype] == 4) {
					
					$query = "DELETE FROM goods_pic WHERE barcode=$attributes[barcode] AND pictype=$attributes[pictype]";
					$qry_delpic = mysql_query($query) or die($query);
									
				}
				
				// Запоминаем инфу о картинке
				$query2 = "INSERT INTO goods_pic 
									   (barcode, 
									    pictype, 
										extention)
								 VALUES ('".$attributes[barcode]."',
								 		$attributes[pictype],
										'jpg')";
				
				$qry_addpic = mysql_query($query2) or die($query2);
				
				$newname  = mysql_insert_id();
				$newname .= ".jpg";
				
				//$newname = "bramati.jpg";
				
				$fullname = $document_root . '/images/tmp/' . $newname;
				rename ($uploadfile_tmp,$fullname);
	            
				if (!copy($fullname,$document_root.'/images/goods/'. $newname)) {
		           //$javascript = "javascript:alert('Ошибка при копировании файла');";
				   echo 'Ошибка при копировании файла';
				   exit;
	    		}
				
				unlink ($fullname);
				
				$javascript = "javascript:alert('Изображение товара успешно загружено');";
	    }
			
			
			
		} // isset($attributes[barcode])
   }


   if (isset($attributes[filetype]) and $attributes[filetype] == "zip") {
       
        if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile_zip)) {
            $javascript = "javascript:alert('Ошибка при копировании файла');";
        }
        
        $zip = new ZipArchive;
        
        if ($zip->open($uploadfile_zip) === TRUE) {
            
		
            $i = 0;
            while ($name = $zip->getNameIndex($i)) {
                
				$i_name     = substr ($name, 0, -4);
                $i_name = quote_smart($i_name);
				
				// Удалим информацию о старой картинке
				$query = "DELETE FROM goods_pic 
								WHERE barcode=$i_name AND pictype=1";
					
				$qry_delpic = mysql_query($query) or die($query);
				
				// Запоминаем инфу о картинке
				$query2 = "INSERT INTO goods_pic 
									   (barcode, 
									    pictype, 
										extention)
								 VALUES ($i_name,
								 		1,
										'jpg')";
				
				$qry_addpic = mysql_query($query2) or die($query2);
				
				$newname  = mysql_insert_id();
				$newname .= ".jpg";
				
				
				$zip->renameName($name,$newname);
				
                ++$i;
            }
            $zip->close();  
        }
        
		
        if ($zip->open($uploadfile_zip) === TRUE) {
            $zip->extractTo($document_root . '/images/goods/');
            $zip->close(); 
									
			
        } else {
            $javascript = "javascript:alert('Ошибка разархивирования');";
        }
        if (!unlink ($uploadfile_zip)) {
           $javascript = "javascript:alert('Ошибка удаления файла');";
        } else {
            $javascript = "javascript:alert('Изображения загружены');";
        }
        
            
    }

    if (!isset($javascript)) {
        $javascript = "javascript:alert('Ошибка загрузки. Проверьте тип и размер файла.');";
    }
?>
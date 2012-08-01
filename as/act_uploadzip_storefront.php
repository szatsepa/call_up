<?php 
// Модуль загрузки витрины

// TO DO сделать проверку на удаление предыдущего логотипа!!!
//echo "<br><b>company_id =>>          $attributes[company_id]</b>";       
$uploadfile_zip   = $document_root . '/images/storefront/' . basename($_FILES['userfile']['name']);


   if (isset($attributes[filetype]) and $attributes[filetype] == "zip") {
       
        if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile_zip)) {
            $javascript = "javascript:alert('Ошибка при копировании файла');";
        }
        
        $zip = new ZipArchive;

		// Удалим информацию о старой картинке
$query = "DELETE FROM storefront_imgs WHERE company_id=$attributes[company_id]";
					
$qry_delpic = mysql_query($query) or die($query);
        
        if ($zip->open($uploadfile_zip) === TRUE) {
            
			
		
            $i = 0;
$name_arr = array('a1','a2','a3','a4','a5','b1','b2','b3','b4','b5','c1','c2','c3','c4','c5','d1','d2','d3','d4','d5');

            while ($name = $zip->getNameIndex($i)) {
                
				//$i_name  = ;//substr ($name, 0, -4
				$i_name = $name_arr[$i].'_'.$attributes[company_id].'.jpg';

				// Запоминаем инфу о картинке
				$query2 = "INSERT INTO storefront_imgs 
									   (filename, 
									    company_id)
								 VALUES ('$i_name',
								 		$attributes[company_id])";
				
				$qry_addpic = mysql_query($query2) or die($query2);
				

				$zip->renameName($name,$i_name);
				
                $i++;
            }
            $zip->close();  
        }
        
		
        if ($zip->open($uploadfile_zip) === TRUE) {
            $zip->extractTo($document_root . '/images/storefront/');
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
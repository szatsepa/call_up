<?php

$user_id = $user['id'];

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']))
{
  // print "Файл успешно загружен.\n";    
} 
	else 
{
    print "Произошла ошибка при загрузке файла.";
}

$nameoffile = $_FILES['userfile']['name'];

$row = 1;
$handle = fopen ($nameoffile,"r");
// Количество успешно добавленных строк
$sucs = 0;

$bad = 0;

while ($data = fgetcsv ($handle, 65636,";")) {
    	
	// Пропускаем строку, если нет штрихкода или названия
	if ($data [0] == '' or $data [1] == '') {
	
		continue;
	
	}
    
        $aff = 0;

        $barcode  		= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[0]));
    $name       		= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[1]));
	$short_description	= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[2]));
    $ingridients		= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[3]));
	$specification		= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[4]));
	$gost	      		= quote_smart(iconv("WINDOWS-1251", "UTF-8", $data[5]));
                
                
	$query = "INSERT INTO goods
						 (barcode, 
						  name,
						  short_description,
						  ingridients, 
						  specification, 
						  gost) 
			  	  VALUES 
			  			 ($barcode, 
						  $name, 
						  $short_description,
						  $ingridients, 
						  $specification, 
						  $gost)";
	
	$qry_goodsadd = mysql_query($query);
        
        $aff = mysql_affected_rows();
				  
	if($aff != 0){
            
            $sucs++;
            
        }
        
}


fclose ($handle);

unlink ($nameoffile);

// Информация для редиректа
//$attributes[query_str] = 'act=goods&eid=10';

?>
<script language="javascript">alert("Добавлено <?php echo $sucs;?> строк.")</script>
<form action="index.php?act=goods" method="post">
    <script language="javascript">
    document.write ('</form>');
    document.forms[0].submit();
    </script>
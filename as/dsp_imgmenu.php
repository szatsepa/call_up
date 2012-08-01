<br><br>
<br>

<table class="dat" width="99%">

    <tr>
        <td align="left" valign="top"><strong>Загрузка изображений товаров</strong><br><br></td>
    </tr>
    <form enctype="multipart/form-data" action="index.php?act=upload_zipimg" method="post">
	
	<td><input type="hidden" name="MAX_FILE_SIZE" value="8192000"/>   
		<input type="hidden" name="filetype" value="zip"/>
 	
        <input name="userfile" type="file" size="20"/>
        <input type="submit" value="Загрузить zip-архив" id="knob"/>
    </form>
    <br /><br />
<small>Максимальный объем загружаемого файла не должен превышать 8 Мегабайт (zip-архив).<br />
	   Загружаются основные изображения товара. Формат изображений - JPG.
</small>
</td>
	

</table>

<br>
<br>

<table class="dat" width="99%">
    <tr>
        <td align="left" valign="top"><strong>Загрузка логотипа компании</strong><br><br></td><td width="50%" align="left" valign="top"><strong>Удаление логотипа компании</strong></td>
    </tr>
    <form enctype="multipart/form-data" action="index.php?act=upload_zipimg" method="post">
    <tr>
	    <td><?php include("dsp_companyselect.php"); ?></td>
    </tr>
    <tr>
	    <td><input type="hidden" name="MAX_FILE_SIZE" value="512000">  
			     
        <input name="userfile" type="file" size="20"><input type="submit" value="Загрузить логотип"><br /><br />		
		<small>Максимальный объем загружаемого файла не должен превышать 500 килобайт, формат изображения GIF.</small>
		</td></form>
		<form action="index.php?act=logo_delete" method="post">    
	    <td><?php include("dsp_companyselect.php"); ?><input type="Submit" value="Удалить логотип" ></td>		    
    </form>
    </tr>
       
</table>

<br>
<br>
<table class="dat" width="99%">
    <tr>
        <td align="left" valign="top"><strong>Загрузка изображения тега</strong><br><br></td><td width="50%" align="left" valign="top"><strong>Удаление изображения тега</strong></td>
    </tr>
    <form enctype="multipart/form-data" action="index.php?act=upload_zipimg" method="post">
    <tr>
	    <td><?php include("../main/dsp_tagscloud.php"); ?></td>
    </tr>
    <tr>
	    <td><input type="hidden" name="MAX_FILE_SIZE" value="512000"> 
			<input type="hidden" name="filetype" value="jpg">        
        <input name="userfile" type="file" size="20"><input type="submit" value="Загрузить"><br /><br />		
		<small>Максимальный объем загружаемого файла не должен превышать 500 килобайт, формат изображения - JPG.</small>
		</td></form>
		<form action="index.php?act=tagimg_delete" method="post">    
	    <td><?php include("../main/dsp_tagscloud.php"); ?><input type="Submit" value="Удалить" ></td>		    
    </form>
    </tr>
       
</table>
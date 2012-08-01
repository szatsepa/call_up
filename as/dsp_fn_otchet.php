<?php 
// Функция вывода отчетов
// $type -- supplier, выводит отчет по Поставщикам
//		 -- customer, выводит отчет по Заказчикам
// $for_id  -- идентификатор, id пользователя или компании, для которых делается отчет

function otchet($type) { 

	global $qry_companies,$qry_users;

?>	
<form action="index.php?act=report_csv" method="post" name="<?php echo $type; ?>" id="<?php echo $type; ?>">
	
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		
		<?php if ($type == 'supplier'){?>		
		<td>Сформировать отчет по поставщикам:&nbsp;</td>
		<td><?php $default_company = 0; include ("dsp_companyselect.php"); ?></td>		
		<?php } ?>
		
		<?php if ($type == 'customer'){?>		
		<td>Сформировать отчет по заказчикам:</td>
		<td><select name="for_user_id" class="common"><?php option ($qry_users,"id","surname,name,patronymic","Пользователи","") ?></select></td>		
		<?php } ?>
		
		<td>&nbsp;&nbsp;c&nbsp;</td>
		<td><select class="common" name="start_day" id="start_day">    								
            <?php 
                
                for ($i=1;$i<32;++$i) { ?>
                <option value="<?php echo $i;?>"><?php echo sprintf("%02d",$i);?></option>
          <?php } ?>    
        </select></td>
		<td><select class="common" name="start_mon" id="start_mon">    								
            <?php 
                
                for ($i=1;$i<13;++$i) { ?>
                <option value="<?php echo $i;?>"><?php echo sprintf("%02d",$i);?></option>
          <?php } ?>    
        </select></td>
		<td><select name="start_year" class="common">
				<option value="2009">2009</option>
				<option value="2010">2010</option>
			</select></td>
		
		<td>&nbsp;&nbsp;по&nbsp;</td>
		
		<td><select class="common" name="end_day" id="end_day">    								
            <?php 
                
                for ($i=1;$i<32;++$i) { ?>
                <option value="<?php echo $i;?>"><?php echo sprintf("%02d",$i);?></option>
          <?php } ?>    
        </select></td>
		<td><select class="common" name="end_mon" id="end_mon">    								
            <?php 
                
                for ($i=1;$i<13;++$i) { ?>
                <option value="<?php echo $i;?>"><?php echo sprintf("%02d",$i);?></option>
          <?php } ?>    
        </select></td>
		<td><select name="end_year" class="common">
				<option value="2009">2009</option>
				<option value="2010">2010</option>
			</select></td>
		
		<td><input type="submit" value="Ok"></td>	 
	</tr>
</table>
</form>
<br />
<?php 
	return;
} ?>
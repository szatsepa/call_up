<select name="company_id" class="common">

<?php 
	//if (isset($default_company)) echo "<option value='0'>Все компании</option>";
    while ($row_select = mysql_fetch_assoc($qry_companies)) {

        if ($row_select["id"] == $company_id){        
        echo  "<option value='".$row_select["id"]."'selected>".$row_select["name"]."</option>";
		}else{
		echo  "<option value='".$row_select["id"]."'>".$row_select["name"]."</option>";
		}
    }
	mysql_data_seek($qry_companies,0);
	if (isset($default_company)) unset($default_company);
?></select>
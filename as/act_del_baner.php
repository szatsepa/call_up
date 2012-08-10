<?php
 
// To do сделать это в качестве функции


function del_baner($filename){

$dir = "../images/storefront/";

$del_filename = $dir.$filename;

if(file_exists ($del_filename )){
    
        if(unlink($del_filename))return true;
    
  
}
if($attributes[act]=="go"){
}

}
function to_storefront($company,$price,$st_id ){
       
    ?>
   <form action="index.php?act=strf" method="post">
    <script language="javascript">
    document.write ('<input name="company_select" type="hidden" value="select"><input name="st_select" type="hidden" value="select"><input name="price_select" type="hidden" value="select"><input type="hidden" name="company_id" value="<?php echo $company;?>"/><input type="hidden" name="price_id" value="<?php echo $price;?>"/><input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script> <?php
 
    } 
?>

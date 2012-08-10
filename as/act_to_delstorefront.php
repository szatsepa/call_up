<?php

/*
 * created by arcady.1254@gmail.com 27/1/2012
 */
?>
<script language="javascript">

    if (confirm("Вы действительно хотите удалить витрину?")){
        
       document.location='index.php?act=del_storefront&stid=<?php echo $attributes[stid];?>';
        
    }else{
        
     document.location='index.php?act=strf';
     
    }

</script>

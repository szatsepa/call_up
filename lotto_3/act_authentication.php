<?php

if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
    
    $secret_key = quote_smart($attributes[code]);
    
    $query = "SELECT id FROM customer WHERE secret_key = $secret_key";
    
     $result = mysql_query($query) or die($query);
     
     $num_rows = mysql_num_rows($result);
     
     if($num_rows != 0){
         
         $row = mysql_fetch_row($result);
    
         $_SESSION['id'] = $row[0];
         
         $_SESSION['auth'] = 2;
         
     }else{
         
        $query = "SELECT id FROM users WHERE pwd = $secret_key";
        
        $result = mysql_query($query) or die($query);
        
         $num_rows = mysql_num_rows($result);
         
         if($num_rows != 0){
        
                 $row = mysql_fetch_row($result);
    
                     $_SESSION['id'] = $row[0];
         
                     $_SESSION['auth'] = 1;
         
         }  else {
             
              header ("location:index.php?act=logout&stid=$attributes[stid]");
             
         }
         
     }
    
} 

?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>
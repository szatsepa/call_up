<?php
$secret_key = $attributes[code];

         
        $query = "SELECT id, role FROM users WHERE pwd = '$secret_key'";
        
        $result = mysql_query($query) or die($query);
        
         $num_rows = mysql_num_rows($result);
         
         if($num_rows != 0){
        
                 $row = mysql_fetch_row($result);
    
                     $_SESSION['id'] = $row[0];
         
                     $_SESSION['auth'] = 1;
                     
                     if($row[1] != 7){
                         header ("location:index.php?act=logout");
                     }else{
                         header ("location:index.php?act=main");
                     }
                     
                     
         
         }  else {
             
             
             
              header ("location:index.php?act=logout");
             
         }


?>
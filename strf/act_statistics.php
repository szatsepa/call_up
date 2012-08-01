<?php

/*
 * created by arcady.1254@gmail.com
 */

include 'qry_domen.php';

if(!isset ($_POST[user_id]))$cod = rnd_Cod();        
 // Соберем статистику о пользователе
$color = quote_smart($_POST[colorDepth]);

$ip=$_SERVER['REMOTE_ADDR'];

$ip = quote_smart($ip);

   
$resolution = quote_smart($_POST[scr_W]."x".$_POST[scr_H]);


$agent = quote_smart($_SERVER["HTTP_USER_AGENT"]);


$query = "INSERT INTO statistics 
                        (ip,
                        resolution,
                        agent,
                        colorDepth)
                VALUES ($ip,
                        $resolution,
                        $agent,
                        $color)";

$act_stat = mysql_query($query) or die($query);
if($act_stat){  
    
   if(!isset ($_POST[stid])){
       $st_id = 14;
   }else{
       $st_id = $_POST[stid];
   }
   
  ?> 
     <form action="index.php?act=look" method="post">
          <?php 
        if(isset ($_POST[user_id]) && $_POST[stid]){
        ?>
        <input type="hidden" name="user_id" value="<?php    echo $_POST[user_id];?>"/>
        <input type="hidden" name="stid" value="<?php    echo $_POST[stid];?>"/>
        <?php } ?>
              
     <script lenguich="javascript">
        document.write ('<input type="hidden" name="cod" value="<?php echo $cod;?>"/><input name="stid" type="hidden" value="<?php echo $st_id;?>"/>');
        document.forms[0].submit();
    </script> 
<?php 
}

?>

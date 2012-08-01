<div class="outside">
<div id= "wrapper">
      <div class="selector">
<?php


if (!isset ($_SESSION[user])) {

    ?>
    <div class="selector22">
        
        <form action="index.php?act=authentication" method="post">
           Ключ:
            <input type="password" required name="code" size="14" style='font-size:8pt;'/>
            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"  />
            <input type="submit" value="&gt;&gt;" class='submit3' style='color:green' />
        </form>
    </div>
<?php } 
if($_SESSION[authentication] == 1){
      header ("location:index.php?act=look");
    }
    
    if(isset ($_SESSION[user])){ 
//        $user = $_SESSION[user]->data;  
//    ?>
<div class="selector13">
    <table border="0" width="100%">
           <tbody>
                <tr>
                    <td align="right">
                        <form action="index.php?act=private_office" method="post">
                         <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                         <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="Личный кабинет" class="my_cab"/> 
                     </form>
                    </td>
                    <td>
<!--                        оставим пока кнопочку без дела но надо будет приаттачить-->
                        <form action="index.php?act=mark_s" method="post">
                         <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                         <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="/ Отметить витрину" class="submit2"/>
                     </form>
                    </td>
<!--                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
<!--                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
<!--                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>-->
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="right">
                        <form action='index.php?act=logout<?php echo $urladd; ?>'  method='post'>
                            <input type="text" name="customer" value="<?php echo $_SESSION[user]->data[name]." ". $_SESSION[user]->data[surname];?>" disabled />      
                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"  />
                            <input type='submit' class='submit3' value='X' style='color:red'/>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
</div>    


<?php

// To Do Если имя и фамилия очень длинные, то выводить только фамилию
    }
?>
</div>


<!--поиск по словам-->
<?php 

$st_id = $attributes[stid];

$group = $attributes[group];

?>
    <div class="select">
        <div class="select_1">
            <p align="center">Поиск по рубрикам:</p> 
        </div>
<!--        сортировка-->
        <div class="select_2" >
<!--            <form  action="#" method="post">-->
<!--                <input type="hidden" name="select" value="R"/> -->
                 <?php if(isset ($attributes[cod])){ ?>
<!--                         <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>-->
                         <?php } ?>
<!--                <input type="hidden" name="stid" value="<?php echo $st_id;?>"/>-->
                 <?php include 'dsp_select_rubrikas.php';?>  
<!--                <input  size="14" type="submit" value="&gt;&gt;" style='color:green;font-size: 8px'/>-->
<!--           </form>-->
        </div>
        <div class="select_1">
            <p align="right">Поиск по группам:&nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="select_1">
<!--             <form action="#" method="post"> -->
            <?php include 'dsp_select_group.php';?>
<!--                 <input type="hidden" name="select" value="group"/> 
                 <input type="hidden" name="stid" value="<?php echo $st_id;?>"/> -->
                 <?php if(isset ($attributes[cod])){ ?>
<!--                         <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/> -->
                         <?php } ?>
<!--                 <input  size="14" type="submit" value="&gt;&gt;" style='color:green;font-size: 8px'/> -->
<!--             </form>-->
        </div>

      <?php 
   if(isset ($_SESSION[auth]) && $_SESSION[auth]){     
        if(isset ($attributes[select]) && $attributes[select] == 'group'){ ?>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=mark_s&select=group&group=<?php echo $group;?>&stid=<?php echo $st_id;?>'"><p align="center">В избранное</p></div>
        <?php }else{ ?>
<!--        <div class="select_4" onmouseover="this.style.color='#FFFFFF'"><p align="center">В избранное</p></div>-->
        <?php }
   }
   ?>

        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=price&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По цене</p></div>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=volume&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По объему</p></div>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=abc&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По алфавиту</p></div>
  
    </div>


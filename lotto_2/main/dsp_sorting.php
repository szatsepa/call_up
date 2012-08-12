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

 <?php if(isset ($attributes[cod])){ 
                     
                     
                     }  include 'dsp_select_rubrikas.php';?>  

        </div>
        <div class="select_1">
            <p align="right">Поиск по группам:&nbsp;&nbsp;&nbsp;</p>
        </div>
        <div class="select_1">
                     <?php include 'dsp_select_group.php';
                     if(isset ($attributes[cod])){ 
                         
                     } ?>
        </div>

      <?php 
   if(isset ($_SESSION[auth]) && $_SESSION[auth]){     
        if(isset ($attributes[select]) && $attributes[select] == 'group'){ ?>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=mark_s&select=group&group=<?php echo $group;?>&stid=<?php echo $st_id;?>'"><p align="center">В избранное</p></div>
        <?php }else{ }
   }
   ?>

        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=price&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По цене</p></div>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=volume&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По объему</p></div>
        <div class="select_4" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" onclick="javascript:location.href = 'index.php?act=look&select=abc&stid=<?php echo $st_id; if(isset($attributes[cod]))echo "&amp;cod=$attributes[cod]";?>'"><p align="center">По алфавиту</p></div>
  
    </div>


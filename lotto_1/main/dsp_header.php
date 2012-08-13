<?php
header('Content-Type: text/html; charset=utf-8');
 echo '<?xml version="1.0" encoding="utf-8"?>';
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
        <meta name="title" content="<?php echo $title; ?>" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/custom_style.css" type="text/css" media="screen, projection" />
        <script type="text/javascript" src="./js/psw_validation.js"></script>
        <script type="text/javascript" src="./js/my_function.js"></script>
        <script type="text/javascript" src="./js/AC_runActiveContent.js"></script>
 </head>
<?php 


include 'cnt_header.php';
    
?>
<body onload="">
<?php
include 'dsp_selector.php';
?>  

        <div id="header">

            
                <div class = "head">
                    <div class="head_logo">
                        <form action="index.php?act=look" method="post">
                             <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                             <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                             <input type="image" src="../images/storefront/logo_<?php echo $attributes[stid];?>.jpg" title="На главную" alt="На главную"/>
                    
                        </form> 
                    </div>
                    <div class="head_frame">
                        
                         <img src="../images/storefront/H_<?php echo $attributes[stid];?>.jpg" width="635" height="120"  alt="верхний баннер"/>
                    
                    </div>
                </div>
                <div class = "korzina">
                    
                      <div id = "busket">           
 <?php 
 $type = 0;
 
 if(isset ($_SESSION[auth])){
     
     $str_query = "&amp;stid=$attributes[stid]";
     
     $type = $_SESSION[auth]; 
     
 }else{
     
     $str_query = "&amp;stid=$attributes[stid]&amp;cod=$attributes[cod]";
     
 }
     
        if($string_count !='disabled'){?>
                    
                          <a href="index.php?act=order&amp;type=<?php echo $type.$str_query;?>">В корзине: <?php echo $count_in_cart." ".$string_out;?> .&nbsp;<?php echo $string_count;?></a>
                                <?php
                                
                                        }else{
                                              echo  " В корзине: ".$count_in_cart." ".$string_out;
                                        }
                               if(!isset($_SESSION[admin]) or $_SESSION[admin] != 1){  }else{
                                    
                                    ?><?php } ?>
                               </div> 
<!--                    <a href="<?php echo $info[about_store];?>" target="_blank" style="color: #BB0D72;" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#BB0D72'" ></a>-->
                        <div id = "tel"><p align="center"><?php echo $info[phone];?></p></div>
                        <div id = "oplata"><a href="<?php echo $info[payment];?>" target="_blank">Способы оплаты </a></div>
                        
                </div>
        </div>
                

        <div class="header_2">

                <div >
                   <?php
                   if(isset($attributes[act]) and $attributes[act] == 'look'){
                       include 'qry_group_list.php';
                       include 'dsp_sorting.php';
                   } ?>
                    
                </div>  
        </div>
<!--    <div>&nbsp;</div>-->
<div class="bottom_menu">

<div class="bottom_btn">
                <form action="<?php echo $info[about_store];?>" target="_blank" method="post">
                    <input type="hidden" name="info" value="about"/>
                    <?php if(isset($_SESSION[auth])){?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION[user]->data[id];?>"/>
                    <?php }
                    else{?>
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <?php } ?>
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="hidden" name="group" value="<?php echo $price_id; ?>"/>
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#000000'" value="О магазине" class="footer_1"/>
                </form>
</div> 
            <div class="bottom_btn_1">
                <form action="<?php echo $info[head_office];?>" target="_blank" method="post"> 
                    <input type="hidden" name="info" value="office"/>
                    <?php if(isset($_SESSION[auth])){?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION[user]->data[id];?>"/>
                    <?php }
                    else{?>
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <?php } ?>
                    
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#000000'" value='/ Центральный офис'   class="footer_1"/>
                </form>
            </div>
          <div class="bottom_btn_0">
                <form action="<?php echo $info[discount];?>" target="_blank" method="post">
                    <input type="hidden" name="info" value="discount"/>
                    <?php if(isset($_SESSION[auth])){?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION[user]->data[id];?>"/>
                    <?php }
                    else{?>
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <?php } ?>
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#000000'" value='/ Скидки'  class="footer_1" />
                </form>
          </div>
           <div class="bottom_btn">
                <form action="<?php echo $info[warranty];?>" target="_blank" method="post">
                    <input type="hidden" name="info" value="warranty"/>
                    <?php if(isset($_SESSION[auth])){?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION[user]->data[id];?>"/>
                    <?php }
                    else{?>
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <?php } ?>
                  
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#000000'" value='/ Гарантия'   class="footer_1"/>
                </form>
           </div>
            <div class="bottom_btn">
                <form action="<?php echo $info[delivery];?>" target="_blank" method="post">
                    <input type="hidden" name="info" value="delivery"/>
                    <?php if(isset($_SESSION[auth])){?>
                    <input type="hidden" name="id" value="<?php echo $_SESSION[user]->data[id];?>"/>
                    <?php }
                    else{?>
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <?php } ?>
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#000000'" value='/ Доставка'  class="footer_1" />
                </form>
            </div>
          </div>

<!--end header-->
         

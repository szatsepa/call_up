<?php

/*
 * rewrited by arcady.1254@gmail.com 9.11.2011
 */


// Просто комменты
if(!isset($attributes) || !is_array($attributes)) {
        $attributes = array();
        $attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();  
}

 if(isset ($attributes[user_id]) && !isset ($_SESSION[auth])){
     
     $_SESSION[id] = $attributes[user_id];
     $_SESSION[auth] = 1; 
     
     }else if(isset($attributes[user_id]) && isset ($_SESSION[auth])){
         
         $_SESSION[id] = $attributes[user_id];
         
     }else if(!$_SESSION[id]){
         
        unset ($_SESSION[id]);
        unset($_SESSION[auth]);
     } 

//print_r($_SESSION); 
//print_r($attributes);  
//echo "<br>";

include 'main/cnt_classes.php';
include ("main/qry_connect.php");
include ("main/act_quotesmart.php");
if(!isset($attributes[stid]))include 'main/qry_num_storefront.php';
include 'main/act_random_coder.php';
include 'main/qry_advert.php';
include 'main/dsp_advert_img.php';
include 'main/qry_storefront_info.php';

if(!isset ($attributes[stid])){

    session_unset();
    session_destroy();
}

if(isset($attributes[act]))include 'main/qry_domen.php';
include ("main/qry_good_img.php");
include ("main/qry_customer.php");


if(isset ($_SESSION[auth]) && $_SESSION[auth] > 0){
   
    include 'main/act_checkauth.php';
}
$attributes[stid] = 2;
$_SESSION[domen] = "call-up.ru";

$storefront = new Storefront();

switch ($attributes[act]) {  
    
    case 'look': 
        include 'main/qry_rubrikas.php';
        include 'main/qry_name_strf.php';
        $title = $strf_name;
        include 'main/dsp_header.php';
        include 'main/dsp_storefront_main.php';
        include 'main/dsp_footer.php';
        break;
    
    case 'item_description':
        $title = "Описание товара";
        include 'main/qry_images.php';
        include 'main/dsp_header.php';
        include 'main/qry_check_artikul.php';
        include 'main/cnt_description.php';
        include 'main/dsp_description.php'; 
        include 'main/dsp_footer.php';
        break;
    
    case 'info':
        $title = "Информация";
        include 'main/qry_storefront_info.php';
        include 'main/qry_special_advert.php';
        include 'main/dsp_header.php'; 
        include 'main/dsp_info.php';
        include 'main/dsp_footer.php';
        break;
    
    case "view_descr":
        $title = "Подробное описание товара";
        include 'main/qry_special_advert.php';
        include 'main/dsp_header.php';
        include 'main/dsp_specification.php';
        include 'main/dsp_footer.php';
        break;
    
    case "authentication":
       
        include ("main/act_authentication.php");     
    break;
        
      case "logout":
//	$title = "";
        include ("main/act_logout.php");
    break;

//личный кабинет
    
    case "private_office":        
        
        $title = "Личный кабинент";
        include 'main/qry_message_all.php';
        include ("main/qry_favorite_prices.php");
        include ("main/qry_favorite_goods.php");
        include ("main/qry_arch_order_list.php");
        include 'main/qry_cartlist.php';
        include 'main/qry_reserved_list.php';
        include 'main/qry_order_of_week.php';
        include 'main/dsp_header.php';
        include 'main/dsp_private_ofice.php';
        include 'main/dsp_order_of_week.php';
        include 'main/dsp_carts.php';
        include 'main/dsp_reserveds.php';
        include 'main/dsp_footer.php';
        
        break;
    
    case "advance":
        
        $title = "Оформление заказа";
        include 'main/qry_archzakaz.php';
        include 'main/qry_cart_for_ofice.php';
        include 'main/dsp_header.php';
        include 'main/dsp_advance_order.php'; 
        include 'main/dsp_footer.php';
        
        break;
//    товар в корзинку
    
    case "to_order":
        

        include ("main/act_add_cart.php"); 
        
        break;
    
    
    case "reserve_to_order":
       include 'main/act_reserved_to_cart.php';
       break;
    
    case "del_reserve":
        include 'main/act_del_reserved.php';
        break;
    
    //Оформление заказа
     
      case "order":
            
        $title = "Оформление заказа";
         
        include 'main/dsp_header.php';
        include 'main/qry_count_volume.php';
        include ("main/qry_cart.php");
       
        if(!isset ($attributes[type])){

            include 'main/act_to_ofice.php';
                
            }else{
               
            include 'main/cnt_cart.php';
                            
        }
        
            include 'main/dsp_footer.php';

       break;
       
   case "change_volume":
       
       include 'main/act_change_volume.php';
       
       break;
       
       case "del_item":
           
           include 'main/act_del_item.php';
           
           break;
       
       case "del_reserved_item":
           
           include 'main/act_del_reserved_item.php';
           
           break;
       
       case "del_order":
           
           include 'main/act_del_order.php';
           
           break;
       
       case "to_reserved":
           
           include 'main/act_add_reserved.php';
           break;
       
       case "create_order":

          include 'main/act_create_order.php';

           break;
       
       case "registration":
           
        include ("main/cnt_header.php");
        include ('main/act_registration.php');
           
           break;
       case "regs":
           
           $title = "Регистрация";
           include 'main/dsp_header.php';
           include 'main/dsp_registration.php'; 
           include 'main/dsp_footer.php';
           break; 
       
       case "mark_s":
//           include 'main/cnt_header.php';
           if(isset($attributes[group])){
               include 'main/act_add_favorites_group.php';
           }else{
                include 'main/act_mark_fav.php';
           }
          
           
           break;
       
       case "view_arch_order":
	$title = "Мой аказ";
	include ("main/qry_arch_orders.php");
	include ("main/dsp_header.php");
        include ("main/dsp_arch_order.php");
        include 'main/dsp_footer.php';
    
    break;

case "create_similar":
    
    include 'main/act_createsimilar.php';
    
    break;
case "zakaz_accept":
    
    include 'main/act_updzakazstatus.php';
    
    break;

 case "all_orders":
    $title = "Архив заказов";
    include 'main/qry_arch_order_list.php';
    include 'main/dsp_header.php';
    include 'main/dsp_archiv_of_week.php';
    include 'main/dsp_footer.php';
    
    break;

case "to_message":
    
    include 'main/act_add_read_message.php';  
    include 'main/act_tomessage.php';
    include 'main/act_to_office.php';
    
    break;

case "statistics":
    
    include 'main/act_statistics.php';
    
    break;
    
default :

    include 'main/act_redirect.php';
   
}

include ("main/qry_disconnect.php");

if(isset ($attributes[err]) and $attributes[err] == 'auth'){
           echo '<script language="javascript">alert("Пожалуйста, введите правильно ключ\n                 или будьте гостем!.")</script>';
       }

?>

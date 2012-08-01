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

 if(isset ($attributes[user_id])){
     $_SESSION[id] = $attributes[user_id];
     $_SESSION[auth] = 1; 
     }else if(!$_SESSION[id]){
        unset ($_SESSION[id]);
        unset($_SESSION[auth]);
     } 
 
//echo "<br/>SESSION >>> ";
//print_r($_SESSION); 
//echo "<br>ATTRIBUTES >>> "; 
//print_r($attributes); 
//echo "<br>";
//echo "<br>COOKIE >>> ";
//print_r($_COOKIE);  

include 'cnt_classes.php';
include ("qry_connect.php");
include ("act_quotesmart.php");
include 'act_random_coder.php'; 

if(!isset ($attributes[stid])){

    session_unset();
    session_destroy();
}

include 'qry_domen.php';
include ("qry_good_img.php");
include ("qry_customer.php");


//if(!isset($_SESSION[user]))$user = new User();

if(isset ($_SESSION[auth]) && $_SESSION[auth] > 0)include 'act_checkauth.php';

$storefront = new Storefront();

switch ($attributes[act]) {  
       
    case 'look': 
        include 'qry_name_strf.php';
        $title = $strf_name;
        include 'dsp_header.php';
        include 'dsp_storefront_main.php';
        include 'dsp_footer.php';
        break;
    
    case 'item_description':
        $title = "Описание товара";
        include 'dsp_header.php';
        include 'qry_check_artikul.php';
        include 'cnt_description.php';
        include 'dsp_description.php'; 
        include 'dsp_footer.php';
        break;
    
    case "authentication":
       
        include ("act_authentication.php");     
    break;
        
      case "logout":
//	$title = "";
        include ("act_logout.php");
    break;

//личный кабинет
    
    case "private_office":        
        
        $title = "Личный кабинент";
        include ("qry_favorite_prices.php");
        include ("qry_favorite_goods.php");
        include ("qry_arch_order_list.php");
        include 'qry_cartlist.php';
        include 'qry_reserved_list.php';
        include 'qry_order_of_week.php';
        include 'dsp_header.php';
        include 'dsp_private_ofice.php';
        include 'dsp_order_of_week.php';
        include 'dsp_carts.php';
        include 'dsp_reserveds.php';
        include 'dsp_footer.php';
        
        break;
    
    case "advance":
        
        $title = "Оформление заказа";
        include 'qry_archzakaz.php';
        include 'qry_cart_for_ofice.php';
        include 'dsp_header.php';
        include 'dsp_advance_order.php'; 
        include 'dsp_footer.php';
        
        break;
//    товар в корзинку
    
    case "to_order":
        
        include("cnt_header.php");
        include ("act_add_cart.php"); 
        
        break;
    
    
    case "reserve_to_order":
       include 'act_reserved_to_cart.php';
       break;
    
    case "del_reserve":
        include 'act_del_reserved.php';
        break;
    
    //Оформление заказа
     
      case "order":
            
        $title = "Оформление заказа";
         
        include 'dsp_header.php';
        include 'qry_count_volume.php';
        include ("qry_cart.php");
       
        if(!isset ($attributes[type])){

            include 'act_to_ofice.php';
                
            }else{
               
            include 'cnt_cart.php'; 
                            
        }
        
            include 'dsp_footer.php';

       break;
       
       case "del_item":
           
           include 'act_del_item.php';
           
           break;
       
       case "del_reserved_item":
           
           include 'act_del_reserved_item.php';
           
           break;
       
       case "del_order":
           
           include 'act_del_order.php';
           
           break;
       
       case "to_reserved":
           
           include 'act_add_reserved.php';
           break;
       
       case "create_order":
           include 'dsp_header.php';
          include 'act_create_order.php';
          include 'dsp_footer.php';
           break;
       
       case "registration":
           
        include("cnt_header.php");
        include ('act_registration.php');
           
           break;
       case "regs":
           include 'dsp_header.php';
           include 'dsp_registration.php'; 
           include 'dsp_footer.php';
           break; 
       
       case "mark_s":
           
           if(isset($attributes[group])){
               include 'act_add_favorites_group.php';
           }else{
                include 'act_mark_fav.php';
           }
          
           
           break;
       
       case "view_arch_order":
	$title = "Мой аказ";
	include ("qry_arch_orders.php");
	include ("dsp_header.php");
        include ("dsp_arch_order.php");
        include 'dsp_footer.php';
    
    break;

case "create_similar":
    
    include 'act_createsimilar.php';
    
    break;
case "zakaz_accept":
    
    include 'act_updzakazstatus.php';
    
    break;

 case "all_orders":
    $title = "Архив заказов";
    include 'qry_arch_order_list.php';
    include 'dsp_header.php';
    include 'dsp_order_list.php';
    include 'dsp_footer.php';
    
    break;
    
default :

    include 'act_request.php';
   
}

include ("qry_disconnect.php");

if(isset ($attributes[err]) and $attributes[err] == 'auth'){
           echo '<script language="javascript">alert("Пожалуйста, введите правильно ключ\n                 или будьте гостем!.")</script>';
       }

?>

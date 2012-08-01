<?php
// update 30.05.2011
//echo $_SERVER["QUERY_STRING"];
// Просто комменты
if(!isset($attributes) || !is_array($attributes)) {
	$attributes = array();
	$attributes = array_merge($_GET,$_POST,$_COOKIE); 
}


include ("main/qry_connect.php");
include ("main/act_quotesmart.php");
include ("main/act_checkmobile.php");

//$mobile = 'true';
// authentication == yes/no 

include ("as/qry_user.php");
include ("main/act_checkauth.php");
include ("main/act_redirect.php");

include ("main/act_setstyle.php");

//print_r($attributes);
//echo "<br/>";

switch ($attributes[act]) {

    case "authentication":
    include ("main/qry_userauth.php");	
	include ("main/act_authentication.php");	
break;
    
	case "add_cart":	
	include ("main/act_add_cart.php");	
	include ("main/qry_price.php");
    include ("main/qry_cart.php");
    include ("as/act_md5name.php");
	include ("main/dsp_header.php");
	include ("main/dsp_selector.php");
	include ("main/dsp_price.php");
	include ("main/dsp_footer.php");	
	include ("main/qry_disconnect.php");
	break;
	
	// 4.06.2011 
	case "step1":
	$title = "Оформление заказа";
	if(isset($attributes[action]) and $attributes[action]=="add"){
		include ("main/act_add_cart.php");
	}
	include ("main/qry_cart.php");
    include ("main/qry_price.php");
    include ("main/qry_archzakaz.php");
	include ("main/dsp_header.php");
	if(isset($attributes[type]) and $attributes[type]==0){
		include ("main/dsp_cart_plus.php");
	}else if(isset($attributes[type]) and $attributes[type]==2){
		include ("main/dsp_pay_header.php");
		include ("main/dsp_step1.php");
		include ("main/dsp_pay_footer.php");
	}else if(isset($attributes[type]) and $attributes[type]==1){
		include ("main/dsp_selector.php");
		include ("main/dsp_backtoprice.php");
		include ("main/dsp_cart.php");
		include ("main/dsp_step1.php");
		include ("main/dsp_footer.php");
	}
	include ("main/qry_disconnect.php");
	break;
	
	case "step2":
	$title = "Бланк заказа";	
	include ("main/qry_cart.php");
    include ("main/qry_price.php");
	include ("main/qry_supplemail.php");
	include ("main/qry_check_tags.php");
    include ("main/act_addzakaz.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");    
	include ("main/dsp_step2.php");
	include ("main/dsp_footer.php");
	include ("main/qry_emptycart.php");
	include ("main/qry_disconnect.php");
	break;
	
    case "company_prices":
	$title = "О компании";
    include ("as/qry_company.php");
    include ("as/act_md5name.php");
    include ("main/act_string2html.php");
    include ("main/qry_companyprices.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");    
    include ("main/dsp_companyprices.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "single_price":
	$title = "";
	include ("main/qry_price.php");
	include ("main/qry_cart.php");
    include ("as/act_md5name.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_price.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "single_item":
	$title = "";
	include ("main/qry_price.php");
	include ("main/qry_cart.php");
    include ("as/act_md5name.php");
	include ("main/dsp_fn_tovar.php");
	include ("main/dsp_fn_tovar_pic.php");
	include ("main/dsp_fn_pic.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_price.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "updsingleitem":
	$title = "";
	include ("main/act_updsingleitem.php");
	break;
	
	case "delsingleitem":
	$title = "";
	include ("main/act_delsingleitem.php");
	break;
    
    case "addrecord":
	$title = "";
	include ("main/act_addrecord.php");
	break;
	
	case "addlimit":
	$title = "";
	include ("main/act_addlimit.php");
	break;
    
    case "show_company":
	$title = "";
    include ("as/qry_company.php");
	include ("main/dsp_showcompany.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "add_favprice":
	$title = "";
	include ("main/qry_addfavprice.php");
    include ("main/qry_price.php");
	include ("main/qry_cart.php");
    include ("as/act_md5name.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_price.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "kabinet":
	$title = "Личный кабинет";
	
	include ("main/qry_userfavprices.php");
    include ("main/qry_userfavgoods.php");
    include ("main/qry_archzakazlist.php");
    include ("main/qry_zakazweek.php");
	include ("main/qry_cartlist.php");
//	include ("main/qry_cart.php");
    include ("main/qry_advert.php");
    include ("as/qry_companies.php");
    include ("as/qry_prices.php");
    include ("main/qry_message.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_kabinet.php");
    include ("main/dsp_zakazweek.php");	
 include ("main/dsp_carts.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;

	case "del_zakaz":
	include ("main/qry_restoreallgoods.php");
	include ("main/qry_emptycart.php");
	include ("main/act_tokabinet.php");
	break;

	//storefront

	case "open_storefront":
		$title = "Витрина";
               include ("as/act_md5name.php");
              $cod = md5name($attributes[user_id],$attributes[company_id],$attributes[price_id]);
              header ("location:http://shop.animals-food.ru/custom/index.php?act=customer&cod=$cod&admin=1");
	break;

	// customer

	case "customers":
		$title = "Витрина для вас";
	if(isset($attributes[action]) and $attributes[action] == "add_cart"){
		include ("main/act_add_cart.php");
	}
        include ("main/act_parse_md5.php");
	include ('main/act_customer_auth.php');
	include ("main/dsp_header.php");
	include ("main/dsp_storefront_main.php");
	include ("main/dsp_footer.php");
	break;
		
		// описание товара
	 case "item_description";
	 $title = "Описание товара";
	include ("main/dsp_header.php");
	include ("main/qry_company.php");
	include ("main/dsp_description.php");
	//include ("main/dsp_footer.php");
	 break;

    case "supplier":
	$title = "Кабинет поставщика";
        include 'main/qry_where_storefront.php';
        include 'main/qry_storefronts.php';
    include ("main/qry_message.php");
    include ("main/qry_companyprices.php");
    include ("main/qry_companycart.php");
	include ("main/qry_allcompanyzakaz.php");
        include 'main/qry_allcom_customers_order.php';
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
    include ("main/dsp_supplier.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
        // клиенты витрины
    
    case "customers_list":
        
     $title = "Клиенты";
        include 'main/qry_customers.php';
        include 'main/dsp_header.php';
        include ("main/dsp_selector.php");
        include 'main/dsp_customers_list.php';
        include ("main/qry_disconnect.php");
        break;
    
     case "customer_delete":
    
    $title = "Клиенты";
         include ("main/act_customer_delete.php");
        include 'main/qry_customers.php';
        include 'main/dsp_header.php';
        include ("main/dsp_selector.php");
        include 'main/dsp_customers_list.php';
        include ("main/qry_disconnect.php");
	break;
    
    case "customer_update":
         $title = "Клиенты";
        include 'main/dsp_header.php';
        include 'main/act_customer_update.php';
        include 'main/qry_customers.php';
        include ("main/dsp_selector.php");
        include 'main/dsp_customers_list.php';
        include ("main/qry_disconnect.php");
        break;
    
    case "customer_edit":
            $title = "Клиенты";
       
       include 'main/qry_customer.php'; 
       include 'main/qry_customers.php';
        include 'main/dsp_header.php';
        include ("main/dsp_selector.php");
        include 'main/dsp_customers_list.php';
        include 'main/dsp_customer.php';
        include ("main/qry_disconnect.php");
	break;
    
    case "sendpsw":
//       include 'main/dsp_header.php';
//      include 'main/qry_customer.php';
   include ("main/act_sendpsw.php");
	break;
    // end customers
    
    case "status_price":	
	include ("main/qry_setpricestatus.php");
	include ("main/act_tosupplier.php");
	break;
    
	case "add_price":	
	include ("as/qry_priceadd.php");
	include ("main/act_tosupplier.php");
	break;
    
    case "edit_price":	
    $title = "Редактирование прайс-листа";
	include ("main/qry_price.php");
	include ("main/qry_cart.php");
    include ("as/act_md5name.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_price.php");
    include ("main/dsp_addrecord.php");
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");    
	break;
	
	case "zakaz_accept":
	$title = "";
    include ("main/act_updzakazstatus.php");
	include ("main/act_tosupplier.php");
	break;
	
    case "kotirovka":
	$title = "Текущие сравнительные котировки";
	//include ("qry_archzakaz.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_kotirovka.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "view_archzakaz":
	$title = "";
            include ("main/qry_archzakaz.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_archzakaz.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "create_similar":
	$title = "";
	include ("main/act_createsimilar.php");
	break;
    
    case "mailform":
	$title = "Обратная связь";
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_mailform.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "sendmail":
	$title = "Обратная связь";
    include ("main/act_sendmail.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");
	include ("main/dsp_mailform.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "complist":
	$title = "Список компаний";
    include ("main/act_string2html.php");
    include ("main/qry_advert.php");
    include ("as/qry_companies.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_logo.php");
    include ("main/dsp_complist.php"); 
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "tag":
	$title = "";
    include ("main/qry_tagprices.php");
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_logo.php");
    include ("main/dsp_tag.php"); 
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
	
	case "bukva":
	$title = ""; 
    include ("main/act_string2html.php");
    include ("main/qry_advert.php");
    include ("as/qry_companies.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_logo.php");
    include ("main/dsp_complist.php"); 
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "arch_zakazuser":	
    $title = "Архив заказов"; 
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/qry_archzakazlist.php");
	include ("as/dsp_archzakaz.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
	case "otchet":	
    $title = "Отчеты"; 
	include ("as/dsp_fn_otchet.php");
	include ("as/dsp_fn_option.php");
	include ("as/qry_companies.php");
	include ("as/qry_users.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_otchet.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
	case "report_csv":    
	include ("as/qry_otchet.php");
	include ("as/dsp_report_csv.php");
	break;
	
	case "arch_done":	
    $title = "Архив поставок"; 
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/qry_allcompanyzakaz.php");
	include ("main/dsp_order_list.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
	
	case "arch_decline":	
    $title = "Архив отменённых заказов"; 
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/qry_allcompanyzakaz.php");
	include ("main/dsp_order_list.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
	
    case "rubrika":
	$title = "";
    include ("main/qry_rubrikaprices.php");
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_logo.php");
    include ("main/dsp_rubrika.php"); 
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
	
	case "alltags":
	$title = "";
    include ("as/qry_prices.php");
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
    include ("main/dsp_alltags.php"); 
	include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
    
    case "dogovor":
	$title = "";
    include ("main/qry_cart.php");
    include ("main/act_dogovor.php");
	break;
    
    case "logout":
	$title = "";
    include ("main/act_logout.php");
	break;
    
    case "about":
	$title = "";
    include ("main/dsp_about.php");
	include ("main/qry_disconnect.php");
	break;
	
	case "delcart":
	$title = ""; 
	include ("main/qry_delitemcart.php");
	include ("main/qry_disconnect.php");
	include ("main/act_return.php");
	break;
	
    case "del_favprice":
	$title = ""; 
	include ("main/qry_delfavprice.php");
	include ("main/qry_disconnect.php");
	include ("main/act_tokabinet.php");
	break;
    
	case "pset":	
    $title = "Личные настройки"; 
    include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
	include ("main/dsp_pset.php");
    include ("main/dsp_footer.php");
	include ("main/qry_disconnect.php");
	break;
	
	// По умолчанию    
	default:
	$title = "";
       include ("main/qry_advert.php");
    include ("as/qry_companies.php");
	include ("as/qry_matrix.php");
    include ("as/qry_prices.php");    
	include ("as/dsp_matrix.php");
    include ("main/act_string2html.php");
	include ("main/dsp_header.php");
    include ("main/dsp_selector.php");	
    include ("main/dsp_companies.php"); 
	include ("main/dsp_footer.php");
        $_SESSION[customer] = 0;
	include ("main/qry_disconnect.php");
	break;
      
	}
?>

<?php
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Pragma: no-cache'); 

if(!isset($attributes) || !is_array($attributes)) {
	$attributes = array();
	$attributes = array_merge($_GET,$_POST,$_COOKIE); 
}
if(!isset($_SESSION)){

    session_start();
}


//print_r($_SESSION);
//echo "<br>";
//print_r($attributes); 

include("../main/qry_connect.php");
include("../main/act_quotesmart.php");
include 'qry_domen.php';
include("qry_user.php");


include("../main/act_checkauth.php");

if ($authentication == "no" and $attributes[act] != "authentication") $attributes[act] = '';

// Здесь устанавливаются алерты
include("act_checkerror.php");

switch ($attributes[act]) {
    
    case "authentication":
        include("../main/qry_userauth.php");	
	include("../main/act_authentication.php");	
	break;
    
    case "setdomen":
 
        
        include 'act_set_domen.php';
        
        break;
    
    // Компании
    case "companies":
	include("qry_companies.php");
        include("dsp_header.php");
        include("dsp_companylist.php");
        include("dsp_company.php");
	break;
    
    case 'lotto':
        include 'qry_tickets.php';
        include 'dsp_header.php';
        include 'dsp_ticketlist.php';
        break;
    
    case "company_add":
    include("qry_companyadd.php");
	include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_companylist.php");
    include("dsp_company.php");
	break;
	
    case "company_delete":
    // Сделать удаление и прайсов и администраторов для данной компании.
    include("qry_companydel.php");
	include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_companylist.php");
    include("dsp_company.php");
	break;
   // 
    case "company_edit":
    include("qry_company.php");
	include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_companylist.php");
    include("dsp_company.php");
	break;
    
    case "company_update":
    include("qry_companyupdate.php");
    include("act_tocompanies.php");
	break;

    // Пользователи
    case "users":
    include("qry_users.php");
    include("qry_roles.php");
    include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_userlist.php");
    include("dsp_user.php");    
	break;
    
    case "user_add":
    include("qry_useradd.php");
    include("qry_users.php");
    include("qry_roles.php");
    include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_userlist.php");
    include("dsp_user.php");    
	break;
    
    case "user_delete":
    include("qry_userdel.php");
    include("qry_users.php");
    include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_userlist.php");
    include("dsp_user.php");    
	break;
    
    case "user_edit":
    include("qry_users.php");
    include("qry_roles.php");
    include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_userlist.php");
    include("dsp_user.php");    
	break;
    
    case "user_update":
    include("qry_userupdate.php");
    include("act_tousers.php");    
	break;
	
	// Товары (штрих-коды)
    case "goods":
    include("qry_goods.php");
    include("dsp_header.php");
    include("dsp_tovar.php");
    include("dsp_tovarlist.php");    
	break;
    
	case "tovar_edit":
    include("qry_goods.php");    
	include("../main/dsp_fn_tovar_pic.php");	
	include("../main/dsp_fn_pic.php");
	include("dsp_fn_option.php");	
    include("dsp_header.php");
    include("dsp_tovar.php");
	break;
    
    case "del_item":
        include 'act_del_item.php';
        break;
    case "tovar_update":
        include 'act_update_item.php';
        break;
	
	case "upload_tovarpic":
    include("act_uploadzip.php");
    include("act_totovaredit.php");
	break;
	
	case "tovar_add":
    include("qry_tovaradd.php");
    include("act_togoods.php");    
	break;
    
	case "uploadgoods":
      include("dsp_header.php");       
    include("act_uploadgoods.php");
	include("act_to.php");
	break;
	
    // Управление прайс-листами
    
    case "prices":
    include("qry_companies.php");
    include("qry_rubrikator.php");
    include("qry_prices.php");
    include("dsp_header.php");
    include("dsp_newprice.php");
    include("dsp_pricetable.php"); 
    break;
	
	case "price":
    include("qry_companies.php");
    include("qry_rubrikator.php");
    include("qry_prices.php");
    include("dsp_header.php");
    //include("dsp_price.php");
    include("dsp_pricelist.php"); 
    break;
    
    case "new_price":
    include("qry_priceadd.php");
    include("act_to.php");    
	break;
    
	/*
    case "comment_add":
    include("qry_commentadd.php");
    include("act_toprices.php");    
	break;
	
    case "tags_add":
    include("qry_tagsadd.php");
    include("act_toprices.php");    
	break;
    
	*/
	
	case "price_info_update":
    include("qry_price_info_update.php");
    include("act_toprices.php");    
	break;
	
    case "price_delete":
    include("qry_pricedel.php");
    include("act_to.php");    
	break;
    
    case "upload_price":
    include("act_uploadprice.php");
    include("act_toprices.php");    
	break;
    
    // Управление сообщениями
    case "messages":  
    $title = "Управление сообщениями"; 
    include("qry_roles.php");
    include("qry_messages.php");
    include("dsp_header.php");
    include("dsp_messagelist.php");
    include("dsp_newmessage.php");
    break;
    
    case "new_message":
    include("qry_messageadd.php");
    include("act_tomessages.php");    
	break;
    
    case "message_update":
        
//        include("dsp_header.php");
    include("qry_messageupdate.php");
    include("act_tomessages.php");    
	break;
    
    case "del_message":
        
        include 'act_del_message.php';
        
        break;
    
    case "img_menu":
    include("qry_companies.php");
	include("qry_prices.php");
    include("dsp_header.php");
	include("dsp_imgmenu.php");
	break;
    
    case "upload_zipimg":
    include("qry_companies.php");
	include("qry_prices.php");
    include("act_md5name.php");
    include("act_uploadzip.php");
    include("dsp_header.php");
	include("dsp_imgmenu.php");
	break;
    
    case "logo_delete":
    include("act_logodel.php");
	include("act_toimg.php");
	break;
	
	case "img_delete":
	include("act_md5name.php");
    include("act_imgdel.php");
	include("act_toimg.php");
	break;
	
	case "tagimg_delete":
	include("act_md5name.php");
    include("act_tagimgdel.php");
	include("act_toimg.php");
	break;
	
    // Реклама
    case "advert":
        include 'qry_companies_advert.php';
        include 'qry_baners_st.php';
        include 'qry_select_storefront.php';
    include("dsp_header.php");
    include 'dsp_advertisement_st.php';  
	break;
    
    case 'ddcom':
        
        include 'act_del_advcom.php';
        
        break;
    
    case "view_adv":
        include 'qry_baners_st.php';
        include 'dsp_header.php';
//        print_r($img_array);
        include 'dsp_advert_view.php';
        
        break;
    
    case "deladv":
        
        include 'act_del_advert.php';
        
        break;
    
    case "advcom":
        
        include 'act_add_advcom.php';
        break;
    
    case "add_baner":
        
        include 'act_random_coder.php';
       include("act_d_change_baner.php"); 
       include 'act_upload_baner.php';
       include 'act_add_advert.php';
        
        break;

	// Витрина

	case "strf":
    include 'qry_about_storefront.php';        
    include 'qry_select_storefront.php';
    include("qry_companies.php");
    include("dsp_header.php");
    include("dsp_storefront_menu.php");
	break;
    
    case "delcom":
        
        include 'act_delcom.php';
        break;
    
    case "delprice":
       include 'act_delcom.php'; 
        break;
    
    case 'add_storefront':
     
        include 'act_add_storefront.php';
        break;
    
    case 'add_comtosto':
        
        include 'act_add_stcom.php';
        
        break;
    
    case 'del_storefront':
        include 'act_del_baner.php';
        $whot = del_baner("H_$attributes[stid].jpg");
        $whot = del_baner("F_$attributes[stid].jpg");
        $whot = del_baner("logo_$attributes[stid].jpg");
        include 'act_del_storefront.php'; 
//          if($whot){
//                        echo "RAS<br/>";  
//            if($whot){                echo "DVA<br>";
//                
//            }
//        }
//        if($whot){
//                        echo "TRI <br>";
//            
//        }else{            echo "HERA<br>";
////            header("location:index.php?act=strf");
//        }         
        break;
    
    case "codhtml":
        
        include'act_add_header.php';
        
       break;
   
   
	//	allstorefront
	case "allstorefront":
            include 'qry_about_storefront.php';
    include("dsp_header.php");
   
        include("dsp_allstorefront_menu.php");

	break;

	// upload top-baner & bottom baner
	case "upload_top_baner":
                  
    include("act_upload_images.php");
	
	break;

	//upload_storefront_images
	case "upload_storefront":
	include("act_del_baner.php");
	include("act_uploadzip_storefront.php");

		//to_storefront();
	include("../main/qry_advert.php");
    include("qry_companies.php");
    include("dsp_header.php");
	include("dsp_storefront_menu.php");
	break;

	// delete_baner
    
	case "delete_baner":
	include("act_del_baner.php");
	if(del_baner($attributes[filename])){
		to_storefront($attributes[company_id], $attributes[price_id], $attributes[stid]);
	}
	break;

    case "upd_companyadvert":
    //include("qry_companies.php");
    include("act_updcompanyadvert.php");
    include("qry_companies.php");
	include("qry_matrix.php");
    include("../main/qry_advert.php");
    include("dsp_header.php");
	include("dsp_companyadvert.php");
	include("dsp_matrix.php");
    include("dsp_setmatrix.php");   
	break;
    
    case "upd_tovaradvert":
    include("act_updtovaradvert.php");
    include("act_toadvert.php");
    
	case "upd_matrix":
    include("act_updmatrix.php");
    include("act_toadvert.php");
	
    case "rubrikator":
	include("qry_rubrikator.php");
    include("dsp_header.php");
    include("dsp_rubrikalist.php");
    include("dsp_rubrikaform.php");
	break;
    
    case "rubrika_edit":
	include("qry_rubrikator.php");
    include("qry_rubrika.php");
    include("dsp_header.php");
    include("dsp_rubrikalist.php");
    include("dsp_rubrikaform.php");
	break;
    
    case "rubrika_update":
    include("qry_rubrikaupdate.php");
    include("act_torubriki.php");
	break;
    
    case "rubrika_add":
    include("qry_rubrikaadd.php");
	include("act_torubriki.php");
	break;
    
    case "rubrika_delete":
    include("qry_rubrikadel.php");
	include("act_torubriki.php");
	break;
	
    case "rubrika_change":
    include("qry_pricerubrikaupd.php");
	include("act_toprices.php");
	break;
    	
	case "arch_zakaz":    
	$title = "Архив заказов";  
    include("dsp_header.php");
	include("../main/qry_archzakazlist.php");
	include("qry_companies.php");
	include("dsp_archzakaz.php");
        include("qry_archzakazlist.php");
        include("dsp_archzakaz.php");
	break;
	
	//case "report_csv":    
	//include("qry_otchet.php");
	//include("dsp_report_csv.php");
	//break;
	
	case "view_archzakaz":   
   	include("dsp_header.php");
	include("../main/qry_archzakaz.php");
	include("../main/dsp_archzakaz.php");
	break;

	case "statistics":
    $title = "Статистика"; 
	include("dsp_header.php");
	include("qry_statzakaz.php");
	include("act_parseua.php");
	include("act_osdetect.php");
	include("dsp_statistics.php");
	break;
	
	case "sendpsw":
    include("act_sendpsw.php");
	break;
	
    case "main":
    include("dsp_header.php");
	include("dsp_mainmenu.php");
	break;
    
    case "logout":
    include("../main/act_logout.php");
	break;
    
	default:
	$title = "";	
	
    include("dsp_header.php");
    break; 
    
	}
	
    // Disconnect from db
    include("../main/qry_disconnect.php");

?>
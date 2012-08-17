<?php
// Проверка аутентификации

$user = new User();

if (isset($_SESSION['auth']) and !isset($attributes[out])) {
	
	// В мобильной версии запишем куку (неделя) для аутентификации
	if ($mobile == 'true') setcookie("di", $_SESSION['id'], time()+680400);
    
//	$authentication = "yes";
        
//        $auth = $_SESSION['auth'];
    
    $user_id = $_SESSION['id'];
     
//    echo "$auth >> $user_id<br/>";   
	// To do переделать пользователя в объект (ООП)
    
    
   if($_SESSION[auth] == 1) $user->setUser($user_id);
   
   if($_SESSION[auth] == 2) $user->setCustomer ($user_id);
    
//	$user = query_user($user_id); 
//    echo "<br/>USER >>> ";
//    print_r($user);
     
    $_SESSION[user] = $user;
    
    // Создаем массив запрещенных страниц
    $rights = explode(",", $user->data["rights"]);
    
    // Убиваем пустое значение, если есть
    if ($rights[0] == ''){
        array_shift($rights);
    }
    
    if ($user->data["role"] == 4) {
        $demo = "demo";
    }
    
    // To do сделать невозможным вход на запрещенную страницу по прямой ссылке из строки URL браузера
    
	// Не пускаем обычных пользователей в административную область
	if (eregi('/as/',$_SERVER['PHP_SELF'])) {
		if ($user->data['role'] != 1) {
			header ("location:index.php?act=logout");
		}
	}
	
} else {
		    // Здесь обрабатывать разрегистрированного пользователя!!!!
			
			// Разберемся с мобильным пользователем, у него особые привелегии
			if ($mobile == 'true' and isset($attributes[di]) and $attributes[di] > 0) {
			
				
			    
			    $user_id = $attributes[di];
			    //include ("as/qry_user.php");
			    
				// To do переделать пользователя в объект (ООП)
				
                                
                               $user->setUser($user_id);
			    
				// Пускаем только заказчика!!!
				if ($user->data["role"] == 3) {				
				    // Создаем массив запрещенных страниц
				    $rights = explode(",", $user->data["rights"]);
				    
				    // Убиваем пустое значение, если есть
				    if ($rights[0] == ''){
				        array_shift($rights);
				    }
					
				    $_SESSION['auth'] = 1;
					$_SESSION['id']   = $user_id;
					$authentication   = "yes";
					
				} else {
					$authentication = "no";
				    // To do попробовать сделать это через базу
				    $rights = array("kabinet","add_cart","supplier","step1","step2");
				}				
			} else {	
				// Здесь все отстальные незарегистрированные пользователи
				$authentication = "no";
			    // To do попробовать сделать это через базу
			    $rights = array("kabinet","add_cart","supplier","step1","step2");
			}
}

if (in_array($attributes[act],$rights)) {
   //print_r ($rights);
    header ("location:index.php");
}

?>
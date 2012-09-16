<?php
// Проверка аутентификации



if (isset($_SESSION['auth']) and $_SESSION[auth] == 1) {
	
  
    $user = new User($_SESSION['id']);
     
    $_SESSION[user] = $user;
    
       
    // To do сделать невозможным вход на запрещенную страницу по прямой ссылке из строки URL браузера
    
	// Не пускаем обычных пользователей в административную область
	if (eregi('/oper/',$_SERVER['PHP_SELF'])) {
		if ($user->role != 7) {
			header ("location:index.php?act=logout");
		}
	}
	
}
?>
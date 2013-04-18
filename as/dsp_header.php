<?php
header('Content-Type: text/html; charset=utf-8');  
//header("Cache-Control: no-store"); 
//header("Expires: " . date("r")); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Last-Modified" value="<?php echo date("r",(time() - 60));?>">
	<title>Административная область</title> 
	<link rel="STYLESHEET" type="text/css" href="../css/style1.css">
	<link rel="stylesheet" media="screen,projection" type="text/css" href="../css/slimbox2.css" />	
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.slimbox2.js"></script>
	<script type="text/javascript" src="../js/jquery.switcher.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
	<script type="text/javascript" src="../js/toggle.js"></script>
	<script type="text/javascript" src="../js/ui.core.js"></script>
	<script type="text/javascript" src="../js/ui.tabs.js"></script>
</head>
<?php 
// to do вынести модуль обработки ошибок отдельно
if (isset($attributes['error'])) {
	switch ($attributes['error']) {
	    
	    case "img_del_ok":
		$javascript = "javascript:alert('Изображение удалено');";
		break;
	
		case "img_no_del":
		$javascript = "javascript:alert('Удаление невозможно. Изображение отсутствует.');";
		break;
        
        case "ok":
		$javascript = "javascript:alert('Изменения успешно произведены.');";
		break;
	}
}
?>
<!--  -->
<body onload="<?php if (isset($javascript)) echo $javascript; ?>">
<h3>&nbsp;Административная область</h3>

<div class="selector"><table border="0" width="100%"><tr>
<?php if ($authentication == "no") {?>
<form action="index.php?act=authentication" method="post">
    <input type="hidden" name="query_str" value="<? echo $_SERVER["QUERY_STRING"]; ?>"/>
    <td width='*' align='right'>
        <input type="password" name="code" size="10"/>
        <input type="submit" value="&gt;&gt;" />
    </td>
</form>
<?php } else if(isset($user) && $user['role'] == 6){?>
<td>
<!--    <a href="index.php?act=companies" class="header2">Компании</a>
    <a href="index.php?act=users" class="header2">Пользователи</a>-->
    <a href="index.php?act=prices" class="header2">Прайсы</a>
    <a href="index.php?act=img_menu" class="header2">Изображения</a>
    <a href="index.php?act=goods" class="header2">Товары</a>
    <a href="index.php?act=advert" class="header2">Реклама</a>
    <a href="index.php?act=strf" class="header2">Витрина</a>
<!--    <a href="index.php?act=allstorefront" class="header2">Все витрины</a>-->
    <a href="index.php?act=rubrikator" class="header2">Рубрикатор</a>
    <a href="index.php?act=arch_zakaz&amp;display=all" class="header2">Заказы</a>
    <a href="index.php?act=reports" class="header2">Отчеты</a>
    <a href="index.php?act=statistics" class="header2">Статистика</a> 
</td>
<td width='*' align='right'>
    <small>
        <b><?php echo $user["name"]." ".$user["surname"];?> 
            <a href = 'index.php?act=logout'>&gt;&gt;</a>
        </b>
    </small>
</td>
<?php } else if(isset($user) && $user['role'] == 1){?>
<td>
    <a href="index.php?act=companies" class="header2">Компании</a>
    <a href="index.php?act=users" class="header2">Пользователи</a>
<!--    <a href="index.php?act=prices" class="header2">Прайсы</a>
    <a href="index.php?act=img_menu" class="header2">Изображения</a>
    <a href="index.php?act=goods" class="header2">Товары</a>
    <a href="index.php?act=advert" class="header2">Реклама</a>
    <a href="index.php?act=strf" class="header2">Витрина</a>-->
    <a href="index.php?act=allstorefront" class="header2">Все витрины</a>
    <a href="index.php?act=rubrikator" class="header2">Рубрикатор</a>
    <a href="index.php?act=arch_zakaz&amp;display=all" class="header2">Заказы</a>
    <a href="index.php?act=messages" class="header2">Сообщения</a>
<!--    <a href="index.php?act=statistics" class="header2">Статистика</a> -->
</td>
<td width='*' align='right'>
    <small>
        <b><?php echo $user["name"]." ".$user["surname"];?> 
            <a href = 'index.php?act=logout'>&gt;&gt;</a>
        </b>
    </small>
</td>
<?php }?>
</tr>
    </table>
</div>
<br /> 
<h3><?php echo $title; ?></h3>
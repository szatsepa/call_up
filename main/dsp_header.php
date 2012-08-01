<?php 
header('Content-Type: text/html; charset=utf-8'); 
//header("Cache-Control: no-store"); 
//header("Expires: " . date("r")); 
if ($mobile == 'false') {
echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<?php } else { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<?php } ?>
<head>
    <meta http-equiv="Last-Modified" value="<?php echo date("r",(time() - 60));?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php   $title_header = $title;
            if ($attributes[act] == "single_item") $title_header = mysql_result($qry_price,0,"str_name");?>
    <title><?php echo $title_header; ?></title>
	<!-- если не мобила -->
	<?php if ($mobile == 'false') {?>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<!-- таблицы стилей -->
    <link rel="STYLESHEET" type="text/css" href="css/<?php echo $css_style; ?>">
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/slimbox2.css" />	
	<!-- <link rel="stylesheet" href="description_style.css" type="text/css"> -->
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.slimbox2.js"></script>
	<script type="text/javascript" src="js/jquery.switcher.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
    <?php } else {?>
	<!-- иначе -->
    <link rel="STYLESHEET" type="text/css" href="css/style_mob.css" />
    <?php } ?>
</head>

<?php 
if (isset($attributes[err])) {
    if ($attributes[err] == 'auth' and $authentication == "no") $javascript = "javascript:alert('Ошибка авторизации. Введите правильный ключ.');";
}
?>
<body onload="<?php if (isset($javascript) and $mobile == 'false') echo $javascript; ?>">
<?php if($mobile == 'false') {?>


<?php } else { ?>
<a href="index.php?<?php echo $urladd; ?>"><img src="images/logo_mob.gif" width="41" height="44" border="0" alt="Онлайн-прайс" align="middle" /></a>&nbsp;<b><a href="index.php?<?php echo $urladd; ?>">Онлайн-прайс</a></b>
<?php } ?>
<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Last-Modified" value="<?php echo date("r",(time() - 60));?>">
	<title>MENAGEMENT</title> 
	<link rel="STYLESHEET" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/jquery-1.8b1.js"></script>
        <script type="text/javascript" src="js/header.js"></script>
	<script type="text/javascript" src="js/<?php echo $attributes[act];?>.js"></script>
</head>

<!--  -->
<body>
    <input type="hidden" id="uid" value="<?php echo $_SESSION[id];?>"/>
    <div class="outside">
<div id= "wrapper">
<h3>&nbsp;<?php echo $title;?></h3>

<div class="selector"><table border="0" width="100%"><tr>
<?php 
if (!isset($_SESSION[id])) {?>
<form action="index.php?act=authentication" method="post">
    <input type="hidden" name="query_str" value="<? echo $_SERVER["QUERY_STRING"]; ?>"/>
    <td width='*' align='right'>
        <input type="password" name="code" size="10"/>
        <input type="submit" value="&gt;&gt;" />
    </td>
</form>
<?php } else if(isset($user) && $user->role == 7){?>
<td>
    <input type="hidden" id="act" value="<?php echo $attributes[act];?>"/>
    <a id="customer" class="header2">Пользователи</a>
    <a id="accounts" class="header2">Счета</a>
<!--     <a  class="header2">Товары</a>
    <a  class="header2">Реклама</a>
    <a  class="header2">Витрина</a>
    <a  class="header2">Рубрикатор</a>
    <a  class="header2">Заказы</a>
    <a  class="header2">Отчеты</a>
    <a  class="header2">Статистика</a> --> 
</td>
<td width='*' align='right'>
    <small>
        <b><?php echo $user->name." ".$user->surname;?> 
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
     
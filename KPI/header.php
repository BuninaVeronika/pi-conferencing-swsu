<?session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styleall.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<script defer src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script defer src="js/js.js" type="text/javascript"></script>
	<title>V Всероссийская научно-практическая конференция</title>
</head>
<body>
	<header class="header_other header_active">
		<div class="wrapper">
			<div class="wrapper_header">
				<div class="head__logo">
					<a href="index.php"><img src="img/logo_head.png" alt="Герб" class="head__logo_image"></a>
				</div>
				<div class="head__navbar_menu">
					<ul class="menu_ul">
						<li class="menu_li"><a href="index.php#top" class="menu_a">ИНФОРМАЦИЯ</a></li>
						<li class="menu_li"><a href="index.php#comitet" class="menu_a">КОМИТЕТЫ КОНФЕРЕНЦИИ</a></li>
						<li class="menu_li"><a href="index.php#naprav" class="menu_a">НАПРАВЛЕНИЯ РАБОТЫ</a></li>
						<li class="menu_li"><a href="index.php#condition" class="menu_a">УСЛОВИЯ УЧАСТИЯ</a></li>
						<li class="menu_li"><a href="index.php#material" class="menu_a">МАТЕРИАЛЫ И СБОРНИКИ</a></li>
						<li class="menu_li"><a href="index.php#footer" class="menu_a">КОНТАКТЫ</a></li>
					</ul>
				</div>
<?php
include_once 'php/bd.php';

$e_mail=$_SESSION['e_mail'];
$password=$_SESSION['password'];

$user=mysql_query("SELECT * FROM `user` WHERE `e_mail`='$e_mail'and`password`='$password'");
$count=mysql_num_rows($user);

$arri= mysql_fetch_assoc($user);
$id=$arri["id"];
$lastname=$arri["lastname"];
$name=$arri["name"];
$firstname=$arri["firstname"];
$role=$arri["role"];

$a=mb_substr($name,0,1,"UTF-8");
$b=mb_substr($firstname,0,1,"UTF-8");

if($count!=0){
if($role==1){
print<<<atori
<div class="head_authoriaztion">
					<div class="button_authorization">
							<a class="a_auth" href="moderation_full.php?numer_str=1"><p class="button_authorization__text">МОДЕРАЦИЯ КОНФЕРЕНЦИИ</p></a>
					</div>
</div>
atori;
}
else{

print<<<atoriz
<div  class="head_authoriaztion">
					
							<a class='auth_reg' href="cabinetFull.php">$lastname $a. $b.</a><a href="cabinetFull.php"><img style='float: right; margin: -10px -35px 0 10px;' width=35px src="img/user.png" alt="$lastname"></a>		
</div>
atoriz;
}
}
else{

print<<<at
<div class="head_authoriaztion">
					<div class="button_authorization">
							<a class="a_auth" href="auth.php"><p class="button_authorization__text">ВХОД В ЛИЧНЫЙ КАБИНЕТ</p></a>
					</div>
</div>
at;

}

?>
				
			</div>
		</div>
	</header>

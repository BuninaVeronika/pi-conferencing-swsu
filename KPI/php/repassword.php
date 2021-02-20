<?php

$unick=filter_input(INPUT_POST,"unick",FILTER_SANITIZE_SPECIAL_CHARS);
$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$repassword=md5(filter_input(INPUT_POST,"repassword",FILTER_SANITIZE_SPECIAL_CHARS));

include_once 'bd.php';

if (empty($unick) or empty($password))
    {
    exit ("Пожалуйста, заполните все обязательные поля");
    }
if(!preg_match("/^.{6,}$/", $password))
   {
      exit ("Ваш пароль недостаточно безопасный");
   } 
else{
	$password=md5($password);
}

$unick_result = mysql_query("SELECT `e_mail` FROM `user` WHERE `repassword`='$unick'");
$count =mysql_num_rows($unick_result);
if ($count==0) {
    exit ("Неверный код активации электронной почты");
}

if($password==$repassword){

$userred= mysql_query("UPDATE `user` SET `password`='$password' WHERE `repassword`='$unick'");

if (!$userred) {
    exit ('Неверный запрос: ' . mysql_error());
}

else{
echo 'сохранили';
}

}
else
{
	echo 'Пароли не совпадают';
}

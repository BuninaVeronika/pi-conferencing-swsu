<?php
session_start();

$e_mail=filter_input(INPUT_POST,"e_mail",FILTER_SANITIZE_SPECIAL_CHARS);
$password=md5(filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS));

include_once 'bd.php';

$userred=mysql_query("SELECT * FROM `user` WHERE `e_mail`='$e_mail'and`password`='$password'");
$count=mysql_num_rows($userred);

if ($count==0) {
    echo('Пользователя с таким паролем и электронным адресом не существует');
}
else{
$_SESSION['e_mail']=$e_mail;
$_SESSION['password']=$password;
echo 'Авторизовали';
}

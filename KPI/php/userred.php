<?php
session_start();

$lastname=filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_SPECIAL_CHARS);
$name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
$firstname=filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_SPECIAL_CHARS);
$degree=filter_input(INPUT_POST,"degree",FILTER_SANITIZE_SPECIAL_CHARS);
$academic=filter_input(INPUT_POST,"academic",FILTER_SANITIZE_SPECIAL_CHARS);
$organization=filter_input(INPUT_POST,"organization",FILTER_SANITIZE_SPECIAL_CHARS);
$address=filter_input(INPUT_POST,"address",FILTER_SANITIZE_SPECIAL_CHARS);
$city=filter_input(INPUT_POST,"city",FILTER_SANITIZE_SPECIAL_CHARS);
$phone=filter_input(INPUT_POST,"phone",FILTER_SANITIZE_SPECIAL_CHARS);
$e_mail=filter_input(INPUT_POST,"e_mail",FILTER_SANITIZE_SPECIAL_CHARS);

$ed_mail=$_SESSION['e_mail'];
$password=$_SESSION['password']; 

include_once 'bd.php';

if (empty($e_mail) or empty($city))
    {
    exit ("Пожалуйста, заполните все обязательные поля");
    }

if(!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $e_mail))
   {
      exit ("Вы ввели некорректный E-mail!");
   }
if(!preg_match('/^[+]|7|8[0-9()-]{10}$\\s/', $phone) && !empty($phone))
   {
      exit ("Вы ввели некорректный телефонный номер!");
   }

if(strcasecmp($e_mail, $ed_mail) == 0){

}
else{

$e_mailreg = mysql_query("SELECT `e_mail` FROM `user` WHERE `e_mail`='$e_mail'");

$count =mysql_num_rows($e_mailreg);
if ($count>=1) {
    exit ("Пользаватель с данным электронным адресом уже зарегистрирован");
}

}

$userreg= mysql_query("UPDATE `user` SET `lastname`='$lastname',`name`='$name',`firstname`='$firstname',`degree`='$degree',`academic`='$academic',`organization`='$organization',`address`='$address',`city`='$city',`phone`='$phone',`e_mail`='$e_mail' WHERE `e_mail`='$ed_mail' and `password`='$password'");


if (!$userreg) {
    exit ('Неверный запрос: ' . mysql_error());
}

else{
$_SESSION['e_mail']=$e_mail;
$_SESSION['password']=$password;
echo 'сохранили';
}


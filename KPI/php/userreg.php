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
$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$repassword=md5(filter_input(INPUT_POST,"repassword",FILTER_SANITIZE_SPECIAL_CHARS));

include_once 'bd.php';
if (empty($e_mail) or empty($password))
    {
    exit ("Пожалуйста, заполните все обязательные поля");
    }

if(!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $e_mail))
   {
      exit ("Вы ввели некорректный E-mail!");
   }
if(!preg_match("/^.{6,}$/", $password))
   {
      exit ("Ваш пароль недостаточно безопасный");
   }
  if(!preg_match('/^[+]|7|8[0-9()-]{10}$\\s/', $phone) && !empty($phone))
   {
      exit ("Вы ввели некорректный телефонный номер!");
   }
 
else{
	$password=md5($password);
}

$e_mailreg = mysql_query("SELECT `e_mail` FROM `user` WHERE `e_mail`='$e_mail'");
$count =mysql_num_rows($e_mailreg);
if ($count>=1) {
    exit ("Пользаватель с данным электронным адресом уже зарегистрирован");
}

if($password==$repassword){

$userreg= mysql_query("INSERT INTO `user`(`lastname`, `name`, `firstname`, `degree`,`academic`, `organization`, `address`,`city`, `phone`, `e_mail`, `password`) VALUES ('$lastname','$name','$firstname','$degree','$academic','$organization','$address','$city','$phone','$e_mail','$password')");

if (!$userreg) {
    exit ('Неверный запрос: ' . mysql_error());
}

else{
$_SESSION['e_mail']=$e_mail;
$_SESSION['password']=$password;
echo 'сохранили';
}

}
else
{
	echo 'Пароли не совпадают';
}

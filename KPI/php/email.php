<?php
$unick=uniqid();

$e_mail=filter_input(INPUT_POST,"mail",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

if (empty($e_mail))
    {
    exit ("Пожалуйста, заполните все обязательные поля");
    }

if(!preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $e_mail))
   {
      exit ("Вы ввели некорректный E-mail!");
   }

$e_mailreg = mysql_query("SELECT `e_mail` FROM `user` WHERE `e_mail`='$e_mail'");
$count =mysql_num_rows($e_mailreg);
if ($count==0) {
    exit ("Пользаватель с данным электронным адреcом не зарегистрирован");
}


$userred= mysql_query("UPDATE `user` SET `repassword`='$unick' WHERE `e_mail`='$e_mail'");

if (!$userred) {
    exit ('Неверный запрос: ' . mysql_error());
}

else{
echo 'сохранили';
}

  $to = $e_mail;
  $subject = "Восстановление пароля научно-практической конференции";
  $message = "Ваш уникальный код для восстановления пароля аккаунта.\nПерейдите по ссылке или введите код сообщения принудительно\n Код:".$unick."\n Ссылка для перехода:http://buninav.hostronavt.ru/changepassword.php?repassword=".$unick;
  $headers = "From: kafedra-ipm@mail.ru\r\nContent-type: text/plain; charset=windows-1251 \r\n";
  mail ($to, $subject, $message, $headers);

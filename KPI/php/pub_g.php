<?php
session_start();

$id_pub=filter_input(INPUT_POST,"vle",FILTER_SANITIZE_SPECIAL_CHARS);
$status=filter_input(INPUT_POST,"value",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

$email=mysql_query("SELECT * FROM `user`,`author_of_publication` WHERE author_of_publication.id=user.id and author_of_publication.id_pub='$id_pub'");
$pub_user=mysql_query("SELECT `denomination` FROM `publications`,`author_of_publication` WHERE author_of_publication.id_pub=publications.id_pub and author_of_publication.id_pub='$id_pub'");

if (!$email) {
    echo('Неверный запрос: ' . mysql_error());
}
else{
  $array=mysql_fetch_assoc($pub_user);
  $e_array=mysql_fetch_assoc($email);
  $e_mail=$e_array["e_mail"];
  $denomination=$array["denomination"];
  $name=$e_array["name"];
  $firstname=$e_array["firstname"];


if($status=="принять публикацию"){
  $to = $e_mail;
  $subject = "Всероссийская научно-практическая конференция: Результаты обработки статьи";
  $message = "Здравствуйте,".$name." ".$firstname.", сообщаем  вам, что \r\nстатья '".$denomination."' принята в печать и будет опубликованна в сборнике текущего года.\r\nСпасибо за участие.";
  $headers = "From: kafedra-ipm@mail.ru\r\n";
  mail ($to, $subject, $message, $headers);

  mysql_query("UPDATE `publications` SET `status`='Принято' WHERE `id_pub`='$id_pub'");

}

if($status=="отклонить публикацию"){
  $to = $e_mail;
  $subject = "Всероссийская научно-практическая конференция: Результаты обработки статьи";
  $message = "Здравствуйте,".$name." ".$firstname.", с сожалением сообщаем  вам, что \r\nстатья '".$denomination."' не принята в печать, так как не соотвествует требованиям в содержании и оформлении.\r\nМожете принять участие с другой публикацией или исправить вышеуказанную и снова подать заявку на рассмотрение.";
  $headers = "From: kafedra-ipm@mail.ru\r\n";
  mail ($to, $subject, $message, $headers);

  mysql_query("UPDATE `publications` SET `status`='Не принято' WHERE `id_pub`='$id_pub'");

}

if($status=="обнулить статус"){
  $to = $e_mail;
  $subject = "Всероссийская научно-практическая конференция: Результаты обработки статьи";
  $message = "Здравствуйте,".$name." ".$firstname.", сообщаем, что \r\nстатья '".$denomination."' снова передана на рассмотрение.\r\nО дальнейших изменениях в статусе вашей публикации придет сообщение.";
  $headers = "From: kafedra-ipm@mail.ru\r\n";
  mail ($to, $subject, $message, $headers);
  
  mysql_query("UPDATE `publications` SET `status`='Рассматривается' WHERE `id_pub`='$id_pub'");

}
}
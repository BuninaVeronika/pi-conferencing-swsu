<?php

$id_pub=filter_input(INPUT_POST,"id_pub",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

$public = mysql_query("UPDATE `publications` SET `status`='Обработано' WHERE `id_pub`='$id_pub'");
if(!$public){
	echo "не смогли";
}
else{
	
	$user = mysql_query("SELECT * FROM `author_of_publication` WHERE `id_pub`='$id_pub'");
	$user_array=mysql_fetch_assoc($user);
	$id=$user_array["id"];

	$user_mail=mysql_query("SELECT * FROM `user` WHERE `id`='$id'");
	$mail_array=mysql_fetch_assoc($user_mail);
	$e_mail=$mail_array['e_mail'];

	$title=mysql_query("SELECT * FROM `publications` WHERE `id_pub`='$id_pub'");
	$title_array=mysql_fetch_assoc($title);
	$denomination=$title_array["denomination"];


	//Отправить сообщение пользователю о том, что его статью приняли

	$subject = "научно-практическая конференция (статья)"; 

	$message = '<p> Рады сообщить вам, что ваша статья, отправленная на конференцию, принята в сборник.</br>Будем ждать ваши публикации.</br>';

	$message .= "From: Всероссийская научно-практическая конференция «ПРОГРАММНАЯ ИНЖЕНЕРИЯ: СОВРЕМЕННЫЕ ТЕНДЕНЦИИ РАЗВИТИЯ И ПРИМЕНЕНИЯ (ПИ-2021)
 <kafedra-ipm@mail.ru>\r\n"; 

	mail($e_mail, $subject, $message);

	
}
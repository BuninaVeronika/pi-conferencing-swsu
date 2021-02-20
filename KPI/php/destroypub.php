<?php
$id=filter_input(INPUT_POST,"id_pub",FILTER_SANITIZE_SPECIAL_CHARS);
include_once 'bd.php';

$ro=mysql_query("DELETE FROM `author_of_publication` WHERE `id_pub`='$id'");
$mo=mysql_query("DELETE FROM `publications` WHERE `id_pub`='$id'");
if(!ro || !$mo){
	echo "не получилось";
}
else{
echo "удалили";
}
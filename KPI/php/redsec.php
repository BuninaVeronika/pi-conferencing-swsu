<?php

$titletop=filter_input(INPUT_POST,"titletop",FILTER_SANITIZE_SPECIAL_CHARS);
$id_s=filter_input(INPUT_POST,"id_s",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

if(empty($titletop)){

	$del=mysql_query("DELETE FROM `section` WHERE `id_s`='$id_s'");
}
else{

$userred=mysql_query("UPDATE `section` SET `title`='$titletop' WHERE `id_s`='$id_s'");


if (!$userred) {
    echo('Изменения не внесены');
}
else{
 echo 'cохранили';

}
}
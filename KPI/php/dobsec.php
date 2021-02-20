<?php

$titledob=filter_input(INPUT_POST,"titledob",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

$userred=mysql_query("INSERT INTO `section`(`title`) VALUES ('$titledob')");


if (!$userred) {
    echo('Изменения не внесены');
}
else{
 echo 'cохранили';

}

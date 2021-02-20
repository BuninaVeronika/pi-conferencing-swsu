<?php

$id_pub=filter_input(INPUT_POST,"id_pub",FILTER_SANITIZE_SPECIAL_CHARS);
$denomination=filter_input(INPUT_POST,"denomination",FILTER_SANITIZE_SPECIAL_CHARS);
$title=filter_input(INPUT_POST,"title",FILTER_SANITIZE_SPECIAL_CHARS);
$format=filter_input(INPUT_POST,"format",FILTER_SANITIZE_SPECIAL_CHARS);
$rez=filter_input(INPUT_POST,"rez",FILTER_SANITIZE_SPECIAL_CHARS);

$files=$_FILES["file"]["name"];

$tmppath=$_FILES["file"]["tmp_name"];

$datatime=date("d.m.Y_h.i.s");
$uploaddir="../publication/";
$files=$uploaddir.$datatime.transliterate($files);

$person=filter_input(INPUT_POST,"person",FILTER_SANITIZE_SPECIAL_CHARS);

include_once 'bd.php';

if (empty($denomination))
    {
    exit ("Вы ввели не всю информация, пожалуйста, заполните все обязательные поля");
    }

if (!move_uploaded_file($tmppath,$files)) {  //функция для перемещения файла из временного хранилища
            $public = mysql_query("UPDATE `publications` SET `denomination`='$denomination',`title`='$title',`format`='$format',`files`='$rez' WHERE `id_pub`='$id_pub'");
            $run = mysql_query("UPDATE `author_of_publication` SET `person`='$person' WHERE `id_pub`='$id_pub'");
        }

else{  

$public = mysql_query("UPDATE `publications` SET `denomination`='$denomination',`title`='$title',`format`='$format',`files`='$files' WHERE `id_pub`='$id_pub'");
$run = mysql_query("UPDATE `author_of_publication` SET `person`='$person' WHERE `id_pub`='$id_pub'");

}


if (!$public) {
    echo('Неверный запрос: ' . mysql_error());

}
else{
	echo ("сохранили");
}


function transliterate($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'i',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'kh',   'ц' => 'tc',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'iu',  'я' => 'ia',
         '’' => ' ',  '.' => '.',' '=>'_',
         
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'I',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'Kh',   'Ц' => 'Tc',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Iu',  'Я' => 'Ia',
    );
    return strtr($string, $converter);
}


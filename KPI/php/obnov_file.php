<?php
session_start();

$id_pub=filter_input(INPUT_POST,"id_pub",FILTER_SANITIZE_SPECIAL_CHARS);

$files=$_FILES["file"]["name"];

$tmppath=$_FILES["file"]["tmp_name"];

$datatime=date("d.m.Y_h.i.s");
$uploaddir="../publication/";
$files=$uploaddir.$datatime.transliterate($files);

if(empty($id_pub)){exit($id_pub);}
if(empty($files)){exit("не принят файл");}

include_once 'bd.php';

$email=mysql_query("SELECT * FROM `user`,`author_of_publication` WHERE author_of_publication.id=user.id and author_of_publication.id_pub='$id_pub'");
$pub_user=mysql_query("SELECT `denomination` FROM `publications`,`author_of_publication` WHERE author_of_publication.id_pub=publications.id_pub and author_of_publication.id_pub='$id_pub'");

  $array=mysql_fetch_assoc($pub_user);
  $e_array=mysql_fetch_assoc($email);
  $e_mail=$e_array["e_mail"];
  $denomination=$array["denomination"];
  $name=$e_array["name"];
  $firstname=$e_array["firstname"];


if(move_uploaded_file($tmppath,$files)){
  $to = $e_mail;
  $subject = "Всероссийская научно-практическая конференция: Редактирование статьи";
  $message = "Здравствуйте,".$name." ".$firstname.", сообщаем, что \r\nстатья '".$denomination."' была отредактирована для дальнейшей публикации в сборнике.\r\nО дальнейших изменениях в статусе вашей публикации придет сообщение.";
  $headers = "From: kafedra-ipm@mail.ru\r\n";
  mail ($to, $subject, $message, $headers);
}
else{
  exit("не принят файл");
}

$public = mysql_query("UPDATE `publications` SET `files`='$files' WHERE `id_pub`='$id_pub'");


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
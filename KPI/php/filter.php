<?php
include_once('bd.php');
$out= $_POST['out'];

for($i=0;$i<count($out); $i++){

  $title=mysql_query("SELECT  * FROM `section` WHERE `title`='$out[$i]'");
  $status=mysql_query("SELECT  `id_pub`, `denomination`, `title`, `format`, `files`, `status`, `year` FROM `publications` WHERE `status`='$out[$i]'");
  $city=mysql_query("SELECT  `city` FROM `user` WHERE `city`='$out[$i]'");

  if(mysql_num_rows($title)!=0){
    $title_arr=mysql_fetch_assoc($title);
    $title_array[]=$title_arr["title"];
  }
  if(mysql_num_rows($status)!=0){
    $status_arr=mysql_fetch_assoc($status);
    $status_array[]=$status_arr["status"];
  }
  if(mysql_num_rows($city)!=0){
    $city_arr=mysql_fetch_assoc($city);
    $city_array[]=$city_arr["city"];
  }

}
$year=date("Y");
$yeartwo=$year+1;
$result_string.="(`year`='$year' or `year`='$yeartwo')";
if(count($title_array)>0){
$result_string.=" and ("."`title`= '".$title_array[0]."'";}
for($t=1; $t<count($title_array); $t++){
$result_string.=" or "."`title`= '".$title_array[$t]."'";
}
if($t==count($title_array)>0){$result_string.=")";}
if(count($status_array)>0){
$result_string.=" and ("."`status`= '".$status_array[0]."'";}
for($t=1; $t<count($status_array); $t++){
$result_string.=" or "."`status`= '".$status_array[$t]."'";
}
if($t==count($status_array)>0){$result_string.=")";}


if(count($city_array)>0){
$result_string_city="`city`= '".$city_array[0]."'";}
for($t=1; $t<count($city_array); $t++){
$result_string_city.=" or "."`city`= '".$city_array[$t]."'";
}

$teg_result="
<div class='table' id='close'>
      <table class='table_moderat'>
         <tr class='tr_head'><th class='uch_th'>Участник</th><th class='city_th'>Город</th><th class='name_th'>Название</th><th class='theme_th'>Тема</th><th class='status_th'>Статус</th></tr>
";


$public=mysql_query("SELECT * FROM `publications` WHERE $result_string ");
$count_public = mysql_num_rows($public);

for($r=0; $r<$count_public; $r++){

  $arr_pub= mysql_fetch_assoc($public);
  $id_pub=$arr_pub["id_pub"];
  $denomination=$arr_pub["denomination"];
  $title=$arr_pub["title"];
  $status=$arr_pub["status"];


  $user_pub=mysql_query("SELECT * FROM `user` WHERE `id`=(SELECT `id` FROM `author_of_publication` WHERE `id_pub`='$id_pub')");
  $arr_user= mysql_fetch_assoc($user_pub);
  $id=$arr_user["id"];
  $lastname=$arr_user["lastname"];
  $name=$arr_user["name"];
  $firstname=$arr_user["firstname"];
  $city=$arr_user["city"];


  if(count($city_array)!=0){ $ifresult= mysql_query("SELECT * FROM `user` WHERE (`id`='$id') and ($result_string_city)");
    $count_if=mysql_num_rows($ifresult);
    if($count_if==0){
      continue;
    }
}

  $a=mb_substr($name,0,1,"UTF-8");
  $b=mb_substr($firstname,0,1,"UTF-8");


$teg_result.="
<tr class='tr_body'><th class='uch_th'><a href='moderation.php?id=$id'>$lastname $a.$b.</a></th><th class='city_th'>$city</th><th style='padding-left: 20px; padding-right: 10px; text-transform: uppercase;' class='name_th_low'><a href='moderation.php?id_pub=$id_pub'>$denomination</a></th><th class='theme_th_low' style='padding-left: 20px;' >$title</th><th class='status_th'>
";

  if($status=='Принято'){ 
          $teg_result.="<span class='green_span'>ПРИНЯТО</span></th></tr>";
  }
  if($status=='Не принято'){

          $teg_result.="<span class='red_span'>НЕ ПРИНЯТО</span></th></tr>";

  }
  if($status=='Рассматривается'){
            
          $teg_result.="<span class='yellow_span'>РАССМАТРИВАЕТСЯ</span></th></tr>";

  }
  
}


 $teg_result.= "
      </table>
    </div>


</div>
";

echo $teg_result;
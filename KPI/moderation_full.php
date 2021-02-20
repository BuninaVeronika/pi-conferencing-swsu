<?php include ('header.php'); ?>
<?php

if ($role==1){

print<<<header

<div style=" margin: 0 5%; float: right;" class="Get_Out">
			<br>
		<form action="php/destroy.php">
			<input type="submit" class="Get_Out_button" name="" value="Выход">
		</form>

</div>
<div class="moderat_full">
	<div class="head_lk">
		<div class="title_lk">Модерация</div>
	</div>
	<div class="wrapper_moderat">
		<div class="moderat_part_left">
			<h5>Фильтры</h5>



			<div class="city">
						<h6 class="city_tittle">Город</h6>
				<form class="form_city">
header;

$city_query = mysql_query("SELECT DISTINCT `city` FROM `user`");
$count_cq = mysql_num_rows($city_query);

for ($y=0; $y<$count_cq; $y++){
	$arri= mysql_fetch_assoc($city_query);
	$city=$arri["city"];

	$city_count = mysql_query("SELECT `id` FROM `user` where `city`='$city'");
	$cc = mysql_num_rows($city_count);

print<<<city
					<div class="city_about">
							<label class="name_city"><input type="checkbox" class="city_changer" value='$city'>$city</label>
							<label class="count_in_city">$cc</label>
					</div>
city;

}

print<<<forma
			</form>
			</div>
			<div class="list_theme">
					<h6 class="city_tittle" id="city_titteh6">Тема публикаций</h6>

forma;

$section_query = mysql_query("SELECT * FROM `section`");
$section_count = mysql_num_rows($section_query);

for($y=0; $y<$section_count; $y++){

	$arrir= mysql_fetch_assoc($section_query);
	$title=$arrir["title"];

	$title_count = mysql_query("SELECT `title` FROM `publications` where `title`='$title'");
	$tc = mysql_num_rows($title_count);

print<<<title

						<div class="Theme_about">
							<label class="name_city"><input type="checkbox" class="city_changer" value='$title'>$title</label>
							<label class="count_in_city">$tc</label>
					    </div>

title;
}
print<<<start
			</div>
			<div class="list_theme">
					<h6 class="city_tittle" id="other__city" >Статус</h6>

start;

$status_query = mysql_query("SELECT DISTINCT `status` FROM `publications`");
$count_sq = mysql_num_rows($status_query);

for ($y=0; $y<$count_sq; $y++){
	$arris= mysql_fetch_assoc($status_query);
	$status=$arris["status"];

	$status_count = mysql_query("SELECT `status` FROM `publications` where `status`='$status'");
	$sc = mysql_num_rows($status_count);

print<<<status
						<div class="Theme_about">
							<label class="name_city"><input type="checkbox" class="city_changer" name='status' value='$status'>$status</label>
							<label class="count_in_city">$sc</label>
						</div>
status;

				}

print<<<script
				</div>
		
	<input style='margin-top: 25px; margin-bottom: 25px;' onclick="getCheckedCheckBoxes()" type="button" class="Get_Out_button" id="filtr" value="Фильтровать">						

		</div>

		<div class="moderat_part_right">
			<div class="count_pulication">
script;
$year=date("Y");
$yeartwo=$year-1;
$public=mysql_query("SELECT * FROM `publications` where `year`='$year' or `year`='$yeartwo'");
$count_public = mysql_num_rows($public);

print<<<pubcount
		<p class="title_count_publication">Всего $count_public публикаций</P>
pubcount;

print<<<tablescrin
				</div>

			<div class="space_moder_one"></div>
			<div class="count_pulication">
					<form class="form_find" >
						<input style="width: 99%;" type="text" class="input_wth_find" name="search" placeholder="Найти по названию статьи">
						<label class="im_image_for_find" onclick="getsearch()"></label>
					</form>
			</div>




	<div class="space_moder_two"></div>

<!--Модуль под отслеживание чекбоксов-->

<div id="toy"></div>	<!--Загрузка фильтрации-->

		<div class="table" id='close'>
			<table class="table_moderat">
				 <tr class="tr_head"><th class="uch_th">Участник</th><th class="city_th">Город</th><th class="name_th">Название</th><th class="theme_th">Тема</th><th class="status_th">Статус</th></tr>
tablescrin;

$count_str=($count_public/20)+1;
$numer_str=$_GET["numer_str"];

$public_user=$numer_str*20;

$public_end=$public_user-20;

for($r=0; $r<=$public_user; $r++){

	if($r==$count_public){ break;}

	if($r>=$public_end){

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

	$a=mb_substr($name,0,1,"UTF-8");
	$b=mb_substr($firstname,0,1,"UTF-8");


print<<<info_pub
<tr class="tr_body"><th class="uch_th"><a href='moderation.php?id=$id'>$lastname $a.$b.</a></th><th class="city_th">$city</th><th style="padding-left: 20px; padding-right: 10px; text-transform: uppercase;" class="name_th_low"><a href='moderation.php?id_pub=$id_pub'>$denomination</a></th><th class="theme_th_low" style="padding-left: 20px;" >$title</th><th class="status_th">
info_pub;

	if($status=='Принято'){
print<<<publications
				 
				 	<span class="green_span">ПРИНЯТО</span></th></tr>
publications;

	}
	if($status=='Не принято'){
print<<<publications
				 
				 	<span class="red_span">НЕ ПРИНЯТО</span></th></tr>
publications;
	}
	if($status=='Рассматривается'){
print<<<publications
				 		 
				 	<span class="yellow_span">РАССМАТРИВАЕТСЯ</span></th></tr>
publications;
	}
	

}
else{$arr_pub= mysql_fetch_assoc($public);}
}


print<<<table
			</table>
		</div>

<!--Модуль под отслеживание чекбоксов-->

		<div class="slide" id='close_slide'>

table;

$l=$numer_str-1;
$r=$numer_str+1;

if($l==0){}
else{
print<<<left
			<a class="a_auth" href="moderation_full.php?numer_str=$l"><div class="img_slide"></div></a>
left;
}

if($l==0){$l=1;}


	for($t=1; $t<=$count_str; $t++){

			if($t==$numer_str){
print<<<slide
			<a class="a_auth" href="moderation_full.php?numer_str=$t"><div class="item_slide active_slide">$t</div></a>
slide;
			}
			else{
print<<<slid
			<a class="a_auth" href="moderation_full.php?numer_str=$t"><div class="item_slide">$t</div></a>
slid;
			}
		}

if($r==$t){}
else{
print<<<right
			<a class="a_auth" href="moderation_full.php?numer_str=$r"><div class="img_slide_right"></div></a>
right;
}

print<<<div
</div>


</div>



</div>
</div>
<div id='progress'><img class="gifprog" src="img/YVvl.gif" /></div>
div;

} 	
?>

<?php include ('footer.html'); ?>
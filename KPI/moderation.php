<?php include ('header.php'); ?>

<?php

$id_publication=$_GET["id_pub"];
$id_user=$_GET["id"];

if($role==1){

print<<<head
<div class="lk_class">
	<div class="head_lk">
		<div class="title_lk">Публикации пользователя</div>

	</div>

	<div class="infrormation_lk__title">
		<h1>Основная информация</h1>
</div>
head;

if(!empty($id_publication)){

$pub_user=mysql_query("SELECT * FROM `publications`,`author_of_publication` WHERE author_of_publication.id_pub=publications.id_pub and author_of_publication.id_pub='$id_publication'");

$array=mysql_fetch_assoc($pub_user);

$id_user=$array["id"];
$id_pub=$array["id_pub"];
$person=$array["person"];
$denomination=$array["denomination"];
$title=$array["title"];
$format=$array["format"];
$files=$array["files"];
$info=$array["info"];
$status=$array["status"];

$result = explode('/',$files);

$user=mysql_query("SELECT * FROM `user` WHERE `id`='$id_user'");

$arr= mysql_fetch_assoc($user);

$lastname=$arr["lastname"];
$name=$arr["name"];
$firstname=$arr["firstname"];
$degree=$arr["degree"];
$academic=$arr["academic"];
$organization=$arr["organization"];
$address=$arr["address"];
$city=$arr["city"];
$phone=$arr["phone"];
$e_mail=$arr["e_mail"];

print<<<log

	<div class="lk_info">

		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Фамилия</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$lastname</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Имя</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$name</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Отчество</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$firstname</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Ученая степень</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$degree</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Ученое звание</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$academic</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Организация</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$organization</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Почтовый адрес</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$address</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Город</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$city</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Телефон</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$phone</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>E-Mail</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$e_mail</p>
			</div>
		</div>
	</div>
	<div class="space_one"></div>

	<div class="infrormation_lk__title">
		<h1>Публикация $i</h1>
	</div>

<div class="lk_info">
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Тип доклада и форма участия</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$format</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Тематическое направление</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$title</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Название доклада</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$denomination</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Выборка соавторов</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$person</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Документ</label>
			</div>
			<div class="part_text">

			<a href="$files" download>
				<div id="doc_file_new" class="doc_file">
	    		<img class="image_doc__file"  src="img/word_docu.png" alt="Документ">
	    		
	    		<p>$result[2]</p>
	    		<span class="status_publication">$status</span>
	    	</a>
	    	</div>
			</div>
		</div>
		<div class="space_two"></div>

			<div class="moderation_button">
			<div class="button"><input type="submit" class='buttonstatus' id="b_green" vle='$id_pub' value="принять публикацию"></div>
			<div class="button"><input type="submit" class='buttonstatus' id="b_red" vle='$id_pub' value="отклонить публикацию"></div>
			<div class="button"><input type="submit" class='buttonstatus' id="b_yellow" vle='$id_pub' value="обнулить статус"></div>
			</div>

		<div class="space_tree"></div>
		<div  class="part_form_cabinet" >
			<div id="part_new" class="part_label">
					<label>Редактура в печать</label>
			</div>
			<div class="part_text" id="change_input__withimg">
			<div class="input_cbFull">

<form class="upload_form">

	<label>
		<input name="file" id='file' type="file" class="main_input_file" />
		<div id="button_red_public"></div>
		<input style='border:1px solid black; border-radius:5px;' class="f_name" type="text" id="f_name" placeholder="Добавить публикацию" disabled />
		<input  style='display:none' type='text' name='id_pub' id='id_pub' value='$id_pub'>
	</label>

</form>

		</div>
		</div>
		</div>
		</div>

log;

}

else{

$user=mysql_query("SELECT * FROM `user` WHERE `id`='$id_user'");

$arr= mysql_fetch_assoc($user);

$lastname=$arr["lastname"];
$name=$arr["name"];
$firstname=$arr["firstname"];
$degree=$arr["degree"];
$academic=$arr["academic"];
$organization=$arr["organization"];
$address=$arr["address"];
$city=$arr["city"];
$phone=$arr["phone"];
$e_mail=$arr["e_mail"];

print<<<log

	<div class="lk_info">

		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Фамилия</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$lastname</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Имя</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$name</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Отчество</label>
			</div>
			<div class="part_text">
				<p class="text_name_cabinet">$firstname</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Ученая степень</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$degree</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Ученое звание</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$academic</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Организация</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$organization</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Почтовый адрес</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$address</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Город</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$city</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Телефон</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$phone</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>E-Mail</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$e_mail</p>
			</div>
		</div>
	</div>
	<div class="space_one"></div>

log;

$pub_user=mysql_query("SELECT * FROM `publications`,`author_of_publication` WHERE author_of_publication.id_pub=publications.id_pub and author_of_publication.id='$id_user'");
$count = mysql_num_rows($pub_user);

for($i=0; $i<$count; $i++){

$array=mysql_fetch_assoc($pub_user);

$id_pub=$array["id_pub"];
$person=$array["person"];
$denomination=$array["denomination"];
$title=$array["title"];
$format=$array["format"];
$files=$array["files"];
$info=$array["info"];
$status=$array["status"];

$result = explode('/',$files);

print<<<publications_user

	<div class="infrormation_lk__title">
		<h1>Публикация $i</h1>
	</div>

<div class="lk_info">
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Тип доклада и форма участия</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$format</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Тематическое направление</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$title</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Название доклада</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$denomination</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Выборка соавторов</label>
			</div>
			<div class="part_text">
				<p class="text_about_cabinet">$person</p>
			</div>
		</div>
		<div  class="part_form_cabinet" >
			<div class="part_label">
					<label>Документ</label>
			</div>
			<div class="part_text">

			<a href="$files" download>
				<div id="doc_file_new" class="doc_file">
	    		<img class="image_doc__file"  src="img/word_docu.png" alt="Документ">
	    		
	    		<p>$result[2]</p>
	    		<span class="status_publication">$status</span>
	    	</a>
	    	</div>
			</div>
		</div>
		<div class="space_two"></div>

			<div class="moderation_button">
			<div class="button"><input type="submit" class='buttonstatus' id="b_green" vle='$id_pub' value="принять публикацию"></div>
			<div class="button"><input type="submit" class='buttonstatus' id="b_red" vle='$id_pub' value="отклонить публикацию"></div>
			<div class="button"><input type="submit" class='buttonstatus' id="b_yellow" vle='$id_pub' value="обнулить статус"></div>
			</div>

		<div class="space_tree"></div>
		<div  class="part_form_cabinet" >
			<div id="part_new" class="part_label">
					<label>Редактура в печать</label>
			</div>
			<div class="part_text" id="change_input__withimg">
			<div class="input_cbFull">


publications_user;


if($i>0){

print<<<files
<form class="upload_form">

		<input style="padding:15px 0 0 10px; color:#0F6CAA;" name="file" id='file' type="file" class='pub_file'/>

		<input  style='display:none' type='text' name='id_pub' id='id_pub' value='$id_pub'>


</form>

		</div>
		</div>
		</div>
		</div>
files;

}
else{

print<<<files
<form class="upload_form">
		
	<label>
		<input name="file" id='file' type="file" class="main_input_file" />
		<div id="button_red_public"></div>
		<input style='border:1px solid black; border-radius:5px;' class="f_name" type="text" id="f_name" placeholder="Добавить публикацию" disabled />
		<input  style='display:none' type='text' name='id_pub' id='id_pub' value='$id_pub'>
	</label>

</form>

		</div>
		</div>
		</div>
		</div>
files;

}


}




}

?>



	

	<div id='progress'><img class="gifprog" src="img/YVvl.gif" /></div>
	</div>

		
<?php } ?>
<?php include ('footer.html'); ?>
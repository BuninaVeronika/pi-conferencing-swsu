<?php 
include ('header.php');

$e_mail=$_SESSION['e_mail'];
$password=$_SESSION['password'];

$user=mysql_query("SELECT * FROM `user` WHERE `e_mail`='$e_mail'and`password`='$password'");

$arr= mysql_fetch_assoc($user);
$id=$arr["id"];
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
$password=$arr["password"];

print<<<lk

<div class="lk_class">
	<div class="head_lk">
		<div class="title_lk">Личный кабинет</div>
		<div class="Get_Out">
		<form action="php/destroy.php">
			<input type="submit" class="Get_Out_button" name="" value="Выход">
		</form>
		</div>		
	</div>

	<div class="infrormation_lk__title">
		<h1>Основная информация</h1>
		<a href='cabinet.php'><img src="img/red.png" alt="Редактировать"></a>
	</div>
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

lk;

//Публикации
$pub=mysql_query("SELECT * FROM `publications`,`author_of_publication` WHERE author_of_publication.id_pub=publications.id_pub and author_of_publication.id='$id'");
$count = mysql_num_rows($pub);
if($count>0){

print<<<pub
	<div class="infrormation_lk__title">
		<h1>Публикации</h1>
	</div>
pub;

for($i=0; $i<$count; $i++){

$array=mysql_fetch_assoc($pub);

$id_pub=$array["id_pub"];
$person=$array["person"];
$denomination=$array["denomination"];
$title=$array["title"];
$format=$array["format"];
$files=$array["files"];
$info=$array["info"];
$status=$array["status"];

$result = explode('/',$files);

if($status=='Рассматривается'){

print<<<publication


		
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
				<div class="doc_file">
	    		<img style="margin-right: 55px;" src="img/word_docu.png" alt="Документ">
	    		<p>$result[2]</p>
	    		<span class="status_publication">$status</span>
	    		</div>
	    		</a>
			</div>
		</div>

	</div>
	<div class="lk_hr">
		<div class="change_publication">
	
			<a href="publication.php?id=$id_pub"><p class="p_change_publication">РЕДАКТИРОВАТЬ</p></a>
		

		</div>

	</div>
<div class="space_one"></div>
publication;
}
else{

print<<<publication


		
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
				<a href="$files"  download>
				<div class="doc_file">
	    		<img style="margin-right: 55px;" src="img/word_docu.png" alt="Документ">
	    		<p>$result[2]</p>
	    		<span class="status_publication">$status</span>
	    		</div>
	    		</a>
			</div>
		</div>

	</div>
	<div class="lk_hr">

	</div>
<div class="space_one"></div>

publication;
}

}
}


?>
	

	<div class="infrormation_lk__title">
		<h1>Добавить публикацию</h1>
	</div>		
<form method='POST' enctype="multipart/form-data" id="publicat_form" class="lk_form">
		
		<div class="part_form_public" >
			<label class="fas">Тип доклада и форма участия</label>
			<div class="type_form_doc" >
				<label class="p_input"><input name="format"  value="пленарный"  type="radio" class="Authorization_input_tex" ><span>пленарный</span></label>
				<label  class="p_input"><input name="format" value="секционный" type="radio" class="Authorization_input_tex" ><span>секционный</span></label>
				<label  class="p_input"><input name="format" value="стендовый" type="radio" class="Authorization_input_tex" ><span>стендовый</span></label>
				<label  class="p_input"><input name="format" value="публикация в сборнике" type="radio" class="Authorization_input_tex" ><span>публикация в сборнике</span></label>
			</div>
		</div>

<div class="part_form" ><label>Тематическое направление</label>
	<div class='select'>
<select style="width: 1000px;"  name="title" class="Authorization_input_text">
<?php
$tit=mysql_query("SELECT * FROM `section`");
$counttit = mysql_num_rows($tit);

for($i=0; $i<$counttit; $i++){

$ar=mysql_fetch_assoc($tit);
$title=$ar["title"];

print<<<title
<option value='$title' >$title</option>
title;
}
?>
</select>
</div>

</div>

		<div class="part_form" ><label>Название доклада</label><input name="denomination" type="text" class="Authorization_input_text" ></div>

		<div class="part_form" ><label>Соавторы публикации</label><input  name="person" type="text" class="Authorization_input_text" placeholder="И.И.Иванов, А.И.Тарасова" ></div>

	    <div class="part_form" ><label>Документ</label>
	    	<div  class="doc_file">

<div class="upload_form">

	<label>

		<input name="file" type="file" class="main_input_file" />
		<div></div>
		<input class="f_name" type="text" id="f_name" value="Файл не выбран..." disabled />

	</label>

</div>

	    	</div>
	    	<!-- DON'T USE THIS BLOCK --><div  style="visibility: hidden;" class="doc_file"><p>docume</p></div><!-- DON'T USE THIS BLOCK -->

	    </div>
		<div class="space_auth"></div>
		<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
				<div class="help_button">
							<p class="important_p_auth">Все поля обязательны для заполнения</p>
		<input type="button" onclick="publication()" class="registration_input_button" value="Сохранить">
		</div>

</form> 
</div>



</div>
<div id='progress'><img class="gifprog" src="img/YVvl.gif" /></div>

<?php include ('footer.html'); ?>
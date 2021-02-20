<?php include ('header.php');
$id_pub = $_GET['id'];
$sqlprov=mysql_query("SELECT * FROM `author_of_publication` WHERE `id`='$id' and `id_pub`='$id_pub'");
$countsql=mysql_num_rows($sqlprov);
if($countsql==0){
	$id_pub=00;
}
$status_pub=mysql_query("SELECT * FROM `publications` WHERE `id_pub`='$id_pub'");
$ar_st=mysql_fetch_assoc($status_pub);
$status=$ar_st["status"];
if($status!="Рассматривается"){$id_pub=00;}
?>



<div class="lk_class">
	<div class="head_lk">
		<div class="title_lk">Личный кабинет</div>
		<div class="Get_Out">
			<form id='delete'>
<?php

print<<<rol
<input  style='display:none' type='text' name='id_pub' id='id_pub' value='$id_pub'>

rol;
?>
		<input type="button" onclick="deletepub()" class="Get_Out_button" value="Удалить">	
			</form>
		</div>		
	</div>
<div class="infrormation_lk__title">
		<h1>Публикация</h1>
	</div>	
<form method='POST' enctype="multipart/form-data" id="publicat_form" class="lk_form">
			<div class="part_form_public" >
			<label class="fas">Тип доклада и форма участия</label>
			<div class="type_form_doc" >
<?php

$public=mysql_query("SELECT * FROM `publications` WHERE `id_pub`='$id_pub'");
$ary=mysql_fetch_assoc($public);
$denomination=$ary["denomination"];
$title=$ary["title"];
$status=$ary["status"];
$format=$ary["format"];
$files=$ary["files"];
$result = explode('/',$files);

$avtor=mysql_query("SELECT * FROM `author_of_publication` WHERE `id_pub`='$id_pub'");
$array=mysql_fetch_assoc($avtor);
$person=$array["person"];

$tyo = array("пленарный", "секционный", "стендовый", "публикация в сборнике");
$tyocount=count($tyo);

for($i=0; $i<$tyocount; $i++){

if($format==$tyo[$i]){
print<<<prin
				<label class="p_input"><input name="format"  value="$tyo[$i]"  type="radio" class="Authorization_input_tex" checked><span>$tyo[$i]</span></label>
prin;
}
else{
print<<<print
				<label class="p_input"><input name="format"  value="$tyo[$i]"  type="radio" class="Authorization_input_tex" ><span>$tyo[$i]</span></label>
print;
}
}
?>		
			</div>
		</div>
<div class="part_form" ><label>Тематическое направление</label>
	<div class='select'>
<select style="width: 1000px;" name="title" class="Authorization_input_text">
<?php
$tit=mysql_query("SELECT * FROM `section`");
$counttit = mysql_num_rows($tit);

for($i=0; $i<$counttit; $i++){

$ar=mysql_fetch_assoc($tit);
$titles=$ar["title"];
if ($title==$titles) {
print<<<tit
<option value='$titles' selected >$titles</option>
tit;
}
else{
print<<<title
<option value='$titles' >$titles</option>
title;
}
}
?>
</select>
</div>

</div>

<?php 

print<<<titl
<div class="part_form" ><label>Название доклада</label><input name="denomination" type="text" class="Authorization_input_text" value="$denomination" ></div>


		<div class="part_form" ><label>Соавторы публикации</label><input  name="person" type="text" class="Authorization_input_text" value="$person" ></div>

	    <div class="part_form" ><label>Документ</label>
	    	<div  class="doc_file">

<div class="upload_form">

	<label>

		<input name="file" id='file' type="file" class="main_input_file" />
		<div></div>
		<input class="f_name" type="text" id="f_name" value="$result[2]" disabled />
		<input  style='display:none' type='text' name='id_pub' id='id_pub' value='$id_pub'>
		<input  style='display:none' type='text' name='rez' id='rez' value='$files'>

	</label>

</div>
titl;

?>

	    	</div>
	    	<!-- DON'T USE THIS BLOCK --><div  style="visibility: hidden;" class="doc_file"><p>docume</p></div><!-- DON'T USE THIS BLOCK -->

	    </div>
		<div class="space_auth"></div>
		<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
				<div class="help_button">
							<p class="important_p_auth">Все поля обязательны для заполнения</p>
		<input type="button" onclick="redpublication()" class="registration_input_button" value="Сохранить">
		</div>

</form> 
</div>

<div id='progress'><img class="gifprog" src="img/YVvl.gif" /></div>

<?php include ('footer.html'); ?>
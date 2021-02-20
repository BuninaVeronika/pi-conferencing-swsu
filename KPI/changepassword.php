<?php include ('header.php'); ?>



<div class="lk_class">
	<div class="head_lk">
		<div class="title_lk">Восстановить пароль</div>
	
	</div>
<div class="infrormation_lk__title">
		<h1>Учетные данные</h1>
	</div>	
<form id='repass' class="lk_form">
		
		
		
<?php
$repassword = $_GET['repassword'];
$rep = $_GET['rep'];
if(!empty($repassword) or !empty($rep)){

print<<<read
		<div class="part_form" ><label>Проверочный код</label><input type="text" id='unick' class="Authorization_input_text" placeholder='$rep' value='$repassword'></div>
		<div class="space_auth"></div>
		<div class="part_form" ><label>Новый пароль</label><input id='password' type="password" class="Authorization_input_text" ></div>
		<div class="part_form" ><label>Подтвердите пароль</label><input id='repassword' type="password" class="Authorization_input_text" ></div>

		<div class="space_auth"></div>
		<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
				<div class="help_button">
							<p class="important_p_auth">Все поля обязательны для заполнения</p>
		<input type="button" id='repasswrd' class="registration_input_button" value="Сохранить изменения">
		</div>
read;
}
else{
print<<<tear
		<div class="part_form" ><label>Email</label><input type="e-mail" id='mail' class="Authorization_input_text" ></div>

				<div class="space_auth"></div>
				<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
		<div class="help_button">
							<p class="important_p_auth">Все поля обязательны для заполнения</p>
		<input type="button"  id='email' class="registration_input_button" value="Подтвердить почту">
		</div>
tear;
}
?>
		

</form> 
</div>


<?php include ('footer.html'); ?>
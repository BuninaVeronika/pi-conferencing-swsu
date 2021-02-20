<?php include ('header.php'); ?>



<div class="registration">
	<h1 class="authorization_title">Вход</h1>
	<form id='avtoriz'class="registration_form">
		<input type="e-mail" name="e_mail" id='e_mail' class="registration_input_text" placeholder="Электронная почта">
		<input type="password" name="password" id='password' class="registration_input_text" placeholder="Пароль">
			<div class="help_a">
		<a href="changepassword.php" class="important_a">Восстановить пароль</a>
	</div>
		<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
		<div class="help_button">
		<input type="button" onclick='avtoriz()' class="authorization_input_button" value="Войти">
		</div>
		</div>
	</form> 
</div>
<?php include ('footer.html'); ?>
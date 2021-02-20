<?php include ('header.php'); ?>



<div class="registration">
	<h1 class="registration_title">Регистрация</h1>
	<form  class="registration_form">
		<input type="text" class="registration_input_text" name="lastname" id='lastname' placeholder="Фамилия:Иванов">
		<input type="text" class="registration_input_text" name="name" id='name' placeholder="Имя:Иван">
		<input type="text" class="registration_input_text" name="firstname" id='firstname' placeholder="Отчество:Иванович">
		<input type="text" class="registration_input_text" name="degree" id='degree' placeholder="Ученая степень: Доктор наук">
		<input type="text" class="registration_input_text" name="academic" id='academic' placeholder="Ученое звание: Профессор">
		<input type="text" class="registration_input_text" name="organization" id='organization' placeholder="Организация">
		<input type="text" class="registration_input_text" name="address" id='address' placeholder="Почтовый адрес:г.Курск, ул.50 лет.Октября, д.94, кв.25">
		<input type="text" class="registration_input_text" required name="city" id='city' placeholder="Город*">
		<input type="text" class="registration_input_text" name="phone" id='phone' placeholder="Телефон: +79207063214">
		<div class="space_form"></div>
		<input type="e_mail" class="registration_input_text" required name="e_mail" id='e_mail' placeholder="E-mail*">
		<input type="password" class="registration_input_text" required name="password" id='password'  placeholder="Пароль*">
		<input type="password" class="registration_input_text" required name="repassword" id='repassword' placeholder="Повторите пароль*">
		<p class="important_p">Обязательные поля отмечены символом *</p>
		<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
		<div class="help_button">
		<input type="button" id='userreg' class="registration_input_button" value="Зарегистрироваться">
		</div>
		</div>
	</form> 
</div>
<?php include ('footer.html'); ?>
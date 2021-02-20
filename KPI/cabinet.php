<?php include ('header.php'); 

$e_mail=$_SESSION['e_mail'];
$password=$_SESSION['password'];

$user=mysql_query("SELECT * FROM `user` WHERE `e_mail`='$e_mail'and`password`='$password'");

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

?>



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
	</div>
	
	<form id='userred' class="lk_form">
<?php 
print<<<read
		<div class="part_form" ><label>Фамилия</label><input type="text" class="Authorization_input_text" name="lastname" id='lastname' value='$lastname'></div>

		<div class="part_form" ><label>Имя</label><input type="text" class="Authorization_input_text" name="name" id='name' value='$name'></div>
		
		<div class="part_form" ><label>Отчество</label><input type="text" class="Authorization_input_text" name="firstname" id='firstname' value='$firstname'></div>
		
		<div class="part_form" ><label>Ученая степень</label><input type="text" class="Authorization_input_text" name="degree" id='degree' value='$degree'></div>

		<div class="part_form" ><label>Ученое звание</label><input type="text" class="Authorization_input_text" name="academic" id='academic' value='$academic'></div>
		
		<div class="part_form" ><label>Организация</label><input type="text" class="Authorization_input_text"  name="organization" id='organization' value='$organization'></div>
		
		<div class="part_form" ><label>Почтовый адрес</label><input type="text" class="Authorization_input_text" name="address" id='address' value='$address'></div>
		
		<div class="part_form" ><label>Телефон</label><input type="text" class="Authorization_input_text" name="phone" id='phone' value='$phone'></div>

		<div class="part_form" ><label>E-mail</label><input type="text" class="Authorization_input_text" name="e_mail" id='e_mail' value='$e_mail'></div>
		
		<div class="part_form" ><label>Город</label><input type="text" class="Authorization_input_text" name="city" id='city' value='$city'></div>

read;
?>
					<div class="space_auth"></div>
				<div class="help_button">
							<p class="important_p" id='error' style='color:red; margin:-8% 0px 8% 0px;'></p>
							<p class="important_p_auth">Все поля обязательны для заполнения</p>
							
							
		<input type="button" onclick='userred()' class="registration_input_button" value="Сохранить изменения">
		</div>

	</form> 
</div>


<?php include ('footer.html'); ?>
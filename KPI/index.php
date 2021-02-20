<?session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styleall.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title>V Всероссийская научно-практическая конференция</title>
</head>
<body>
	
	<header class="header">
		<div class="wrapper">
			<div class="wrapper_header">
				<div class="head__logo">
					<a href="index.php"><img src="img/logo_head.png" alt="Герб" class="head__logo_image"></a>
				</div>
				<div class="head__navbar_menu">
					<ul class="menu_ul">
						<li class="menu_li"><a href="#top" class="menu_a">ИНФОРМАЦИЯ</a></li>
						<li class="menu_li"><a href="#comitet" class="menu_a">КОМИТЕТЫ КОНФЕРЕНЦИИ</a></li>
						<li class="menu_li"><a href="#naprav" class="menu_a">НАПРАВЛЕНИЯ РАБОТЫ</a></li>
						<li class="menu_li"><a href="#condition" class="menu_a">УСЛОВИЯ УЧАСТИЯ</a></li>
						<li class="menu_li"><a href="#material" class="menu_a">МАТЕРИАЛЫ И СБОРНИКИ</a></li>
						<li class="menu_li"><a href="#footer" class="menu_a">КОНТАКТЫ</a></li>
					</ul>
				</div>
<?php
include_once 'php/bd.php';

$e_mail=$_SESSION['e_mail'];
$password=$_SESSION['password'];

$user=mysql_query("SELECT * FROM `user` WHERE `e_mail`='$e_mail'and`password`='$password'");
$count=mysql_num_rows($user);
$arr= mysql_fetch_assoc($user);
$id=$arr["id"];
$lastname=$arr["lastname"];
$name=$arr["name"];
$firstname=$arr["firstname"];
$role=$arr["role"];

$a=mb_substr($name,0,1,"UTF-8");
$b=mb_substr($firstname,0,1,"UTF-8");


if($count!=0){
if($role==1){
print<<<atori
<div class="head_authoriaztion">
					<div class="button_authorization">
							<a class="a_auth" href="moderation_full.php"><p class="button_authorization__text">МОДЕРАЦИЯ КОНФЕРЕНЦИИ</p></a>
					</div>
</div>
atori;
}
else{

print<<<atoriz

<div  class="head_authoriaztion">
					
							<a class='auth_reg' href="cabinetFull.php">$lastname $a. $b.</a><a href="cabinetFull.php"><img style='float: right; margin: -10px -35px 0 10px;' width=35px src="img/user.png" alt="$lastname"></a>		
</div>
atoriz;
}
}
else{

print<<<at
<div class="head_authoriaztion">
					<div class="button_authorization">
							<a class="a_auth" href="auth.php"><p class="button_authorization__text">ВХОД В ЛИЧНЫЙ КАБИНЕТ</p></a>
					</div>
</div>
at;

}

?>
			</div>
		</div>
	</header>
	<main class="main">

		<section class="intro">
			
			<div class="wrapper">
				<div class="wrapper__intro">
					<h3 class="intro__h3">V Всероссийская научно-практическая конференция</h3>
					<h1 class="intro_main-text" style='margin-bottom: 10px;'><span>ПРОГРАММНАЯ ИНЖЕНЕРИЯ</span><br>СОВРЕМЕННЫЕ ТЕНДЕНЦИИ РАЗВИТИЯ И ПРИМЕНЕНИЯ</h1>
					<h3 class="intro__h3">Ссылка на конференцию появится позднее</h3>
					<h1 class="intro_main-text_two">1 марта 2021 - 13 марта 2021</h1>
					<a style="text-decoration: none;" href="registry.php"><div class="registerButtonIntro">Регистрация</div></a>
				</div>
			</div>
			<a name="top"></a>
		</section>

		<section  class="chair_information">
			<div class="wrapper">
				<div class="wrapper_chair">
					<div class="chair_flex">

						<div class="text_about">
							<h1 class="text_about__h1">Основная информация</h1>
							<p>V Всероссийская научно-практическая конференция <span>«ПРОГРАММНАЯ ИНЖЕНЕРИЯ: СОВРЕМЕННЫЕ ТЕНДЕНЦИИ РАЗВИТИЯ И ПРИМЕНЕНИЯ (ПИ-2021)»</span>проводится в целях:</p>
							<ol type="1" class="text_about__ol">
								<li class="about_li"><span>Развития научного и творческого потенциала молодых исследователей в области программной инженерии</span></li>
								<li class="about_li"><span>Активизации процесса обмена новыми идеями и стимулирования творческого мышления среди молодежи</span></li>
								<li class="about_li"><span>Формирования кадрового резерва для российских IT компаний</span></li>
							</ol>
						</div>
						<div class="img_chair">
							<img  class="image__img_chair" src="img/img_chair.png" alt="Программная инженерия">
						</div>

					</div>
						<a name="comitet"></a>
				</div>

			</div>
		</section>

		<section  class="comitet">
			
			<div class="wrapper">
				<div class="wrapper_commitet">
						<h1 class="commitet_h1">Организационный комитет конференции</h1>
						<img class="image_commitet" src="img/logo_two.png" alt="Организационный коммитет конферецнции">
						<h3 class="commitet_h3">Юго-Западный государственный университет <span>г. Курск, Россия</span></h3>
				</div>
			</div>
		</section>
		<section class="list_comitet">
			<div class="wrapper">
				<div class="wrapper_list_commitet">
					<div class="card_list">
						<h1 class="commitet_list_h1">Председатель</h1>
						<img class="image_list_commitet" src="img/Pyhtin.jpg" alt="Организационный коммитет конферецнции">
						<h3 class="commitet_list_h3">ПЫХТИН <br>Алексей Иванович</h3>
						<h5 class="commitet_list_h5">к.т.н., доцент, директор департамента информационных технологий и нового набора</h5>
						<p class="text_about_commitet_list">Юго-Западный государственный университет, г. Курск, Россия</p>
					</div>
						<div class="card_list">
						<h1 class="commitet_list_h1">Заместитель председателя</h1>
						<img class="image_list_commitet" src="img/Shirabakina.png" alt="Организационный коммитет конферецнции">
						<h3 class="commitet_list_h3">ШИРАБАКИНА<br> Тамара Александровна</h3>
						<h5 class="commitet_list_h5">профессор, декан факультета фундаментальной и прикладной информатики</h5>
						<p class="text_about_commitet_list">Юго-Западный государственный университет, г. Курск, Россия</p>
					</div>
				</div>
			</div>
		</section>

	<section class="programm_comitet">
			<div class="header_commitet">
					<h1 class="comitet__h1">Программный комитет</h1>
				</div>
			<div class="wrapper">
				<div class="body_commitet">
					<div class="left_text_about">
						<h1 class="right_text_h1">Члены программного комитета</h1>
							<div class="card_user_commitet">
								 <h1 class="user_name">Вольфенгаген В.Э.</h1>
								 <h6 class="about_user">доктор технических наук, профессор</h6>
								 <p class="about_place_right">кафедра кибернетики ФГАОУВПО «Национальный исследовательский ядерный университет «МИФИ»,<br>г. Москва, Россия</p>
							</div>
							<div class="card_user_commitet">
								 <h1 class="user_name">Орлова Ю.А.</h1>
								 <h6 class="about_user">доктор технических наук, доцент, зав. кафедры программного обеспечения автоматизированных систем</h6>
								 <p class="about_place_right">Волгоградский технический университет,<br>г. Волгоград, Россия</p>
							</div>
							<div class="card_user_commitet">
								 <h1 class="user_name">Брежнева А.Н.</h1>
								 <h6 class="about_user">кандидат технических наук, доцент кафедры информатики</h6>
								 <p class="about_place_right">ФГБОУ ВПО «РЭУ им. Плеханова»,<br>г. Москва,  Россия/p>
							</div>

					</div>
							<hr class="line_blue">
					<div class="rigth_text_about">
						<h1 class="right_text_h1">Председатель</h1>
						<div class="card_user_commitet_right">
								 <h1 class="user_name_right"><span>Ларина</span><br> Ольга Григорьевна</h1>
								 <h6 class="about_user_right">доктор юридических наук, профессор, проректор по науке и инновациям</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
							<h1 style="" class="right_text_h1_secret">заместитель Председателя</h1>
							<div class="card_user_commitet_right">
								 <h1 class="user_name_right_secret"><span>Томакова</span><br> Римма Александровна</h1>
								 <h6 class="about_user_right">доктор технических наук, профессор<br>&nbsp;</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
					</div>
					
				</div>
			</div>
		</section>

		<section class="programm_comitet">
			<div class="header_commitet">
					<h1 class="comitet__h1">Технический комитет</h1>
				</div>
			<div class="wrapper">
				<div class="body_commitet">
					<div class="left_text_about">
						<h1 class="right_text_h1">Члены технического комитета</h1>
							<div class="card_user_commitet">
								 <h1 class="user_name">Апальков В.В.</h1>
								 <h6 class="about_user">кандидат технических наук, доцент кафедры программной инженерии</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
							<div class="card_user_commitet">
								 <h1 class="user_name">Петрик Е.А.</h1>
								 <h6 class="about_user">кандидат технических наук, доцент кафедры программной инженерии</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
							<div class="card_user_commitet">
								 <h1 class="user_name">Ефремова И. Н.</h1>
								 <h6 class="about_user">кандидат технических наук, доцент кафедры программной инженерии</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>

					</div>
							<hr class="line_blue">
					<div class="rigth_text_about">
						<h1 class="right_text_h1">Председатель</h1>
						<div class="card_user_commitet_right">
								 <h1 class="user_name_right"><span>Малышев</span><br> Александр Васильевич</h1>
								 <h6 class="about_user_right">кандидат технических наук, доцент кафедры программной инженерии</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
							<h1 class="right_text_h1_secret">Ученый секретарь</h1>
							<div class="card_user_commitet_right">
								 <h1 class="user_name_right_secret"><span>Аникина </span><br> Елена Игоревна</h1>
								 <h6 class="about_user_right">кандидат технических наук, доцент кафедры программной инженерии</h6>
								 <p class="about_place_right">Юго-Западный государственный университет,<br>г. Курск, Россия</p>
							</div>
					</div>
					
				</div>
<a name="naprav"></a>
			</div>

		</section>
		
		<section  class="stable_around">

			<div class="wrapper">
				<div class="wrapper_stable">
						<div class="stable_left_part">
								<div class="main_vector">	
											<h1 class="text_main_vector">Основные тематические направления</h1>
								</div>
								
								<div class="main_about">
											<p class="text_main_about">Гибридные интеллектуальные технологии мониторинга и управления сложными объектами</p>
								</div>	
						</div>
						<div class="stable_right_part">
								<div class="around_vector">	
										<ol class="vector_ol">
											<li class="vector_li">Современные технологии и средства разработки программно-информационных систем</li>
											<li class="vector_li">Интеллектуальные технологии поддержки принятия решений и обработки изображений</li>
											<li class="vector_li">Инфокоммуникационные системы и сети IT продукты и услуги</li>
											<li class="vector_li">Образовательные и профессиональные стандарты  в IT  сфере</li>
											<li class="vector_li">Компьютерные обучающие системы</li>
										</ol>
								</div>
								
									<div class="around_about">
											<h1>Круглые<br> столы</h1>
								</div>
						</div>

					</div>		
						<a name="condition"></a>	
			</div>			
			
		</section>


		<section class="condition">
		
			<div class="wrapper">
				<div class="wrapper_condition">
					<div class="image_condtion">
						<img src="img/condition_image.jpg" alt="Условия участия" class="image_img_condition">
					</div>
					<div class="about_condition">
						<h1 class="condtion_h1">условия участия</h1>
						<h6 class="condtion_commitet"><span>Направить в Оргкомитет до</span> АКТУАЛЬНАЯ ДАТА:</h6>
						<ol class="condtion_ol">
							<li class="condtion_li">Информационную карту участника</li>
							<li class="condtion_li">Текст статьи доклада, подготовленный в соответствии с установленными требованиями, должен быть в объеме <span>не менее четырех полных страниц</span></li>
						</ol>
						<p class="about_condition_one">Доклады, представленные на конференцию, будут рассмотрены программным комитетом для опубликования в сборнике материалов конференции.</p>
						<p class="about_condition_one">Программный комитет оставляет за собой право отклонять материалы, не соответствующие требованиям или оформленные с нарушением указанных правил</p>

						<p class="about_beautiful_style">По итогам конференции будет издан сборник материалов конференции. Сборник материалов конференции размещается в Научной электронной библиотеке <a href="https://www.elibrary.ru/defaultx.asp">elibrary.ru</a>, включается в РИНЦ постатейно</p>
					</div>

				</div>
<a name="material"></a>	
			</div>

		</section>

		<section class="material_conferention">
			<div class="header_material">
					<h1 class="material__h1">Материалы конференции</h1>
				</div>
				<div class="wrapper">
					<div class="wrapper_material">
						<div class="information_list">
							<h1>Информационное письмо</h1>
								<div class="bord_of_file">
									<a href="book/broshyra_full19.doc" target="_blank"><img src="img/word.png" class="word_image" alt="Документ Word"></a>
								</div>
						</div>
						<div class="conferention_years">
							<h1>Сборники конференций прошлых лет</h1>
							<div class="flex_pdf">
								<div class="bord_of_file_png_one">
									<a href="book/Book2017.pdf" target="_blank"><img src="img/png.png" class="pdf_image" alt="Документ PDF">
									<p class="p_pdf_img">2017</p></a>
								</div>
									<div class="bord_of_file_png_two">
									<a href="book/Book2018.pdf" target="_blank"><img src="img/png.png" class="pdf_image" alt="Документ PDF">
										<p class="p_pdf_img">2018</p></a>
								</div>
									<div class="bord_of_file_png_tree">
									<a href="book/Book2019.pdf" target="_blank"><img src="img/png.png" class="pdf_image" alt="Документ PDF">
										<p class="p_pdf_img">2019</p></a>
								</div>
									<div class="bord_of_file_png_four">
									<a href="book/Book2020.pdf" target="_blank"><img src="img/png.png" class="pdf_image" alt="Документ PDF">
										<p class="p_pdf_img">2020</p></a>
								</div>
							</div>
						</div>
					</div>
				</div>

		</section>
		<section class="moment">
			<div class="header_moment">
					<h1 class="moment__h1">В настоящий момент</h1>
				</div>
				<div class="wrapper">
					<div class="wrapper_moment">
						<!--Сделать динамичным-->
<?php

$year=date("Y");
$yeartwo=$year-1;
$usercount=mysql_query("SELECT * FROM `user`");
$countuser=mysql_num_rows($usercount);
$publicationscount=mysql_query("SELECT * FROM `publications` where `year`='$year' or `year`='$yeartwo'");
$countpublications=mysql_num_rows($publicationscount);

print<<<count
<div class="left_count">
							<h1 class="h1_count">$countuser</h1>
							<p class="p_count_right">участников</p>
</div>
<div class="right_count">
							<h1 class="h1_count">$countpublications</h1>
							<p class="p_count_left">публикаций</p>
</div>
count;
?>
						
					</div>
				</div>

		</section>

	</main>
<a name="footer"></a>	
	<footer class="footer">
		<div class="wrapper">
			<div class="footer_wrapper">
				<div class="left_footer">
					<div class="left_up_footer">
						<div class="logo_footer">
							<img src="img/logo_head.png" alt="Юго-западный государственный университет">
						</div>
						<div class="about_logo_footer">Юго-западный государственный университет</div>
					</div>
					<div class="left_up_footer">
						<div class="logo_footer">
							<img src="img/logo_po.png" alt="Кафедра программной инженерии">
						</div>
						<div class="about_logo_footer">Кафедра программной инженерии</div>
					</div>
				</div>

				<div class="right_footer">
					<div class="right_up_footer">
						<h2 class="about_us">Контакты</h2>
						<div>
										<p>kafedra-ipm@mail.ru</p>
										<br>
										 <p> + 7 (4712) 22-26-73</p>
						</div>
			
					</div>
					<div class="right_up_footer">
						<h2 class="about_us" style="margin-right: 132px;">Адрес</h2>
						<p style="margin-top: 35px;">305040, <br>г. Курск, ул. 50 лет Октября, д.94,<br>ЮЗГУ, кафедра программной <br>инженерии</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
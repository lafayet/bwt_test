<?php extract($data); ?>

<head>
	<title>Погода в Запорожье</title>
</head>
<div class = "container border-container">
	<div class = "row login-page-header" align = "center">
		<div class="col-md-12">
			<h1>ПОГОДА В ЗАПОРОЖЬЕ</h1>
		</div>
	</div>
	<div class = "row login-page-greeting" align = "center">
		<div class="col-md-12">
			<?php if($login_status=="access_granted") { ?>
			<p style="color:green">Авторизация прошла успешно.</p>
			<?php } elseif($login_status=="access_denied") { ?>
			<p style="color:red">Логин и/или пароль введены неверно.</p>
			<?php } ?>
			Здравствуйте, Гость! <br>
			<?php if($login_status!="access_granted") { ?> 
			<a href="http:\\localhost\bwt_test\login">Войдите</a>, или <a href="http:\\localhost\bwt_test\login\register">зарегистрируйтесь</a>.
			<?php } ?>
		</div>	
	</div>	
<?php if($login_status=="access_granted") { ?>
	<div class = "row login-page-navigation">
		<div class="col-md-12">
			<br>
			<ul>
				<li><a href="weather">Просмотреть погоду</a></li>
				<li><a href="feedbacks">Просмотреть отзывы</a></li>
				<li><a href="feedback">Оставить отзыв</a></li>
			</ul>
		</div>	
	</div>	
<?php } ?>
<?php if($login_status=="logging_in") { ?>
<br>
	<div class = "row login-page-login">
		<div class="col-md-12">
			<form action="" method="post">
				Введите ваши логин и пароль: <br>
				<br>
				Логин: <br>
				<input type="text" name="login"><br>
				<br>
				Пароль: <br>
				<input type="password" name="password"><br>
				<br>
				<input type="submit" value="Войти" name="btn"
				style="width: 150px; height: 30px;">
			</form>
		</div>
	</div>
<?php } ?>
<?php if($login_status=="registering") { ?>
<br>
	<div class = "row login-page-register">
		<div class="col-md-12">
			<form action="" method="post">
				Для регистрации заполните следующие поля:<br>
				<br>
				Логин: <br>
				<input type="text" name="login"> <br>
				<br>
				Пароль: <br>
				<input type="password" name="password"> <br>
				<br>
				<input type="submit" value="Зарегистрироваться" name="btn"
				style="width: 150px; height: 30px;">
			</form>
		</div>
	</div>
<?php } ?>
<br>
</div>

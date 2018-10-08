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
			Здравствуйте, <?php echo ($name); ?>! <br>
		</div>	
	</div>	
	<div class = "row login-page-navigation">
		<div class="col-md-12">
			<br>
			<ul>
				<li><a href="\bwt_test\weather">Просмотреть погоду</a></li>
				<li><a href="\bwt_test\feedbacks">Просмотреть отзывы</a></li>
				<li><a href="\bwt_test\feedback">Оставить отзыв</a></li>
			</ul>
		</div>	
	</div>	
	<div class = "row logout">
		<div class="col-md-12">
			<br>
			<a href="\bwt_test\main\logout">ВЫХОД</a>
		</div>	
	</div>	
<br>
</div>

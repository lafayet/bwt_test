<div class = "container border-container">
	<div class = "row login-page-header" align = "center">
		<div class="col-md-12">
			<h1>ПОГОДА В ЗАПОРОЖЬЕ</h1>
		</div>
	</div>
	<div class = "row feedback-row">
		<div class="col-md-12">
			<form action="" method="post">
				<br>
				Ваше имя:* <br>
				<input type="text" name="name" minlength="2" maxlength="20" required pattern="[А-ЯЁЄ-ЯҐ][А-яЁёЄ-ЯҐа-їґ]{3,20}" title = "Только кириллица, с заглавной буквы."/><br>
				<br>
				E-Mail:* <br>
				<input type="email" name="email" minlength="2" maxlength="20" required pattern="[^';\x22]{3,20}" title = "Допустимые символы: все кроме ; и кавычек."/> <br>
				<br>
				Отзыв:* <br>
				<textarea name="feedback" minlength="2" maxlength="500" required title = "Минимум 2 символа."></textarea><br>
				<br>
				<input type="submit" value="Отправить отзыв" name="btn"
				style="width: 150px; height: 30px;">
			</form>
		</div>
	</div>
	<div class = "row back">
		<div class="col-md-12">
			<br>
			<a href="\bwt_test\main">Назад</a><br>
			<br>
		</div>	
	</div>	
</div>
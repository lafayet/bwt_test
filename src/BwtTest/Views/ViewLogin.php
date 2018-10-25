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
            <?php
            if (isset($register_status)) {
                if ($register_status=="wrong_credentials") {
                    echo '<p style="color:red">Данные введены неправильно! Попробуйте еще.</p>';
                }
            }
            if ($login_status=="access_denied") {
                echo '<p style="color:red">Логин и/или пароль введены неверно.</p>';
            }
            ?>
            Здравствуйте, Гость! <br>
            <a href="\bwt_test\login">Войдите</a>, или <a href="\bwt_test\login\register">зарегистрируйтесь</a>.
        </div>
    </div>
<?php if ($login_status=="logging_in") { ?>
<br>
    <div class = "row login-page-login">
        <div class="col-md-12">
            <form action="" method="post">
                Введите ваши логин и пароль: <br>
                <br>
                Логин: <br>
                <input type="text" name="login" minlength="3" maxlength="20" required pattern="[A-Za-z0-9_]{3,20}" /><br>
                <br>
                Пароль: <br>
                <input type="password" name="password" minlength="3" maxlength="20" required pattern="[^';\x22]{3,20}"/><br>
                <br>
                <input type="submit" value="Войти" name="btn"
                style="width: 150px; height: 30px;">
            </form>
            <br/><a href="\bwt_test\feedback">Оставить отзыв</a>
        </div>
    </div>
<?php } ?>
<?php if ($login_status=="registering") { ?>
<br>
    <div class = "row login-page-register">
        <div class="col-md-12">
            <form action="" method="post">
                Для регистрации заполните следующие поля:<br>
                <br>
                Логин:* <br>
                <input type="text" name="login" minlength="3" maxlength="20" required pattern="[0-9A-Za-z_]{3,20}"
                       title = "Допустимые символы: A-Z, a-z, 0-9, подчеркивание."/> <br>
                <br>
                Пароль:* <br>
                <input type="password" name="password" minlength="3" maxlength="20" required pattern="[^';\x22]{3,20}"
                       title = "Допустимые символы: все кроме ; и кавычек."/> <br>
                <br>
                Имя:* <br>
                <input type="text" name="name" minlength="3" maxlength="20" required pattern="[А-ЯЁЄ-ЯҐ][А-яЁёЄ-ЯҐа-їґ]{3,20}"
                       title = "Только кириллица, с заглавной буквы."/> <br>
                <br>
                Фамилия:* <br>
                <input type="text" name="soname" minlength="3" maxlength="20" required pattern="[А-ЯЁЄ-ЯҐ][А-яЁёЄ-ЯҐа-їґ]{3,20}"
                       title = "Только кириллица, с заглавной буквы." /> <br>
                <br>
                E-Mail:* <br>
                <input type="email" name="email" minlength="8" maxlength="30" required pattern="[^';\x22]{3,20}"
                       title = "Допустимые символы: все кроме ; и кавычек." /> <br>
                <br>
                Пол: <br>
                <input type="radio" name="sex" value="m"> Мужской<br>
                <input type="radio" name="sex" value="f"> Женский<br>
                <br>
                День рождения: <br>
                <input type="date" name="birthday"> <br>
                <br>
                <input type="submit" value="Зарегистрироваться" name="btn"
                style="width: 150px; height: 30px;">
            </form>
            <br/><a href="\bwt_test\feedback">Оставить отзыв</a>
        </div>
    </div>
<?php } ?>
<br>
</div>

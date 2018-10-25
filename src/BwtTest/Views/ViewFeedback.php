<script>
function checkCaptcha() {
    var captcha = grecaptcha.getResponse();
    if (!captcha.length) {
        // Выводим сообщение об ошибке
        $('#recaptchaError').text('* Вы не прошли проверку "Я не робот"');
        return false;
    } else {
        // все хорошо, отправляем отзыв
        $('#recaptchaError').text('');
        alert('Отзыв оставлен!');
        return true;
    }
    return false;
}
</script>

<div class = "container border-container">
    <div class = "row login-page-header" align = "center">
        <div class="col-md-12">
            <h1>ПОГОДА В ЗАПОРОЖЬЕ</h1>
        </div>
    </div>
    <div class = "row feedback-row">
        <div class="col-md-12">
            <form onsubmit="return checkCaptcha();" action="" method="post">
                <br>
                <?php if ($data['hide'] == false) { ?>
                Ваше имя:* <br/>
                <input type="text" name="name" minlength="2" maxlength="20" required pattern="[А-ЯЁЄ-ЯҐ][А-яЁёЄ-ЯҐа-їґ]{3,20}"
                       title = "Только кириллица, с заглавной буквы."/><br/>
                <br/>
                E-Mail:* <br/>
                <input type="email" name="email" minlength="2" maxlength="20" required pattern="[^';\x22]{3,20}"
                       title = "Допустимые символы: все кроме ; и кавычек."/> <br/>
                <br/>
                <?php }?>
                Отзыв:* <br/>
                <textarea name="feedback" minlength="2" maxlength="500" required title = "Минимум 2 символа."></textarea><br/>
                <br/>
                <div class="g-recaptcha" data-sitekey="6LepuHMUAAAAAEdH-CIdIfq1z230KrTN5dqoPCaa" align="center"></div><br/>
                <div class="text-danger" id="recaptchaError" align="center"></div>
                <input type="submit" value="Отправить отзыв" name="btn"
                style="width: 150px; height: 30px;">
            </form>
        </div>
    </div>
    <div class = "row back">
        <div class="col-md-12">
            <br/>
            <?php if ($data['hide'] == false) { ?>
            <a href="\bwt_test\login">Назад</a><br>
            <?php } else { ?>
            <a href="\bwt_test\main">Назад</a><br>
            <?php }?>
            <br/>
        </div>    
    </div>    
</div>
<div class = "container border-container">
    <div class = "row weather-row">
        <div class="col-md-12">
        <h1>ПОГОДА В ЗАПОРОЖЬЕ</h1><br>
        <?php
            echo $data['cloudness'];
            echo $data['cloudness_w'];
            echo '<br>';
            echo $data['temperature'];
            echo '<br>';
            echo $data['weather'];
            echo '<br>';
            echo '<a href="/bwt_test/main">Вернуться</a><br><br>';
        ?>
        </div>
    </div>
</div>
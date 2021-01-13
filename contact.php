<?php


?>

<!DOCTYPE html>
<html>
<head>
    <title>テスト</title>
    <link href="js/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="js/slick.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php require_once "header.php" ?>

    <div class="about-header">
        <video src="img/190828_07_MarinaBayatNightDrone_UHD_02.mp4" poster="sample.png" controls autoplay loop muted class="bg-video"></video>
        <div class="about-title">
            RECRUIT
        </div>
    </div>

    
    <div class="about">
        <h3 class="fade-in fade-in-left">お問い合わせ</h3>
        <form action="contact_confirm.php" method="post" class="contact-form">
            <div class="form">
                <p>氏名</p>
                <input type="text" name="name" class="form-text form-name">
                <span></span>
            </div>
            <div class="form">
                <p>氏名(フリガナ)</p>
                <input type="text" name="name" class="form-text form-name"> 
                <span></span>
            </div>
            <div class="form">
                <p>メールアドレス</p>
                <input type="text" name="mail" class="form-text form-mail">
                <span></span>
            </div>
            <div class="form">
                <p>お問い合わせ内容</p>
                <textarea name="contact" class="form-text form-contact"></textarea>
                <span></span>
            </div>
            <div class="submit">
                <div class="submit-button">内容確認</div>
            </div>
            <div class="confirm-popup">
                <div class="popup-bg"></div>
                <div class="confirm-area">
                    <h2>内容確認</h2>
                    <p class="confirm-title">氏名</p>
                    <p class="confirm-content confirm-name"></p>
                    <p class="confirm-title">メールアドレス</p>
                    <p class="confirm-content confirm-mail"></p>
                    <p class="confirm-title">お問い合わせ内容</p>
                    <p class="confirm-content confirm-contact"></p>
                    <input type="submit" class="confirm-submit">
                </div>
            </div>
        </form>
    </div>
    
    <?php require_once "footer.php" ?>
    <script type="text/javascript" src="js/about.js"></script>
    <script type="text/javascript" src="js/contact.js"></script>
    
</body>
</html>
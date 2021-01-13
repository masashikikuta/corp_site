<?php

    if(empty($_POST["name"])){
        header("Location:contact.php");
    }else{
        mb_language("japanese"); //日本語に設定。
        mb_internal_encoding("UTF-8"); //UTF-8に設定。
    
        $from = "sample202012@gmail.com"; //送信元
        $to = "sample202012@gmail.com"; //宛先
        $subject = "【コーポレートサイト】お問い合わせ"; //件名
    
        $today = date("Y/m/d"); //今日の日付を取得
    
        $html_body = <<<EOM
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html" >
        <meta lang="ja">
        <meta charset="ISO-2022-JP">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style type="text/css">
          .container {
            width:50%;
            background:white;
            margin:0 auto;
            margin-top:20px;
            box-sizing:border-box;
            padding:30px;
            border-radius:8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.3);
            border:1px solid gray;
          }
        </style>
        </head>
        <body>
            <div class="container">
                <h1>お問い合わせ</h1>
                <h2>氏名</h2>
                <p>{$_POST["name"]}</p>
                <h2>メールアドレス</h2>
                <p>{$_POST["mail"]}</p>
                <h2>お問い合わせ</h2>
                <p>{$_POST["contact"]}</p>
                <h2>お問い合わせ日時</h2>
                <p>{$today}</p>
            </div>
        </body> 
        </html>
        EOM; //ヒアドキュメントの終了
    
        $headers = '';
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=iso-2022-jp' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n";
        $headers .= "From: " . $from . "\r\n";
    
        $subject = mb_convert_encoding($subject, "iso-2022-jp"); //件名をJISに変換
    
        $message = '';
        $message .= quoted_printable_encode(mb_convert_encoding($html_body, 'iso-2022-jp', 'UTF-8')) . "\r\n"; //HTMLメールの本文をJISに変換したのちにquoted-printableに変換
    
        @mb_send_mail($to, $subject, $message, $headers);
    }

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
    <link rel="stylesheet" href="css/contact_confirm.css">
</head>
<body>
    <?php require_once "header.php" ?>

    <div class="about-header">
        <video src="img/190828_07_MarinaBayatNightDrone_UHD_02.mp4" poster="sample.png" controls autoplay loop muted class="bg-video"></video>
        <div class="about-title">
            お問い合わせ
        </div>
    </div>

    
    <div class="contact-confirm-area">
        <div class="result">
            <h1>お問い合わせありがとうございます</h1>
            <p>下記内容でお問い合わせ承りました</p>
            <h4>氏名</h4>
            <p><?php echo $_POST["name"] ?></p>
            <h4>メールアドレス</h4>
            <p><?php echo $_POST["mail"] ?></p>
            <h4>お問い合わせ内容</h4>
            <p><?php echo $_POST["contact"] ?></p>
        </div>
        <a href="index.php" class="back_button">
            トップへ戻る
        </a>
    </div>
    
    <?php require_once "footer.php" ?>
    <script type="text/javascript" src="js/about.js"></script>
</body>
</html>
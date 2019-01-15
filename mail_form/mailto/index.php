<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせフォーム</title>
        <meta name="description" content="お問い合わせフォーム">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main-sub">
                <?php
                mb_language("Japanese");
                mb_internal_encoding("UTF-8");
                $to = "メールアドレス@mailaddress";
                $subject = "問い合わせフォーム";
                $message = "名前:{$_POST['name']}、メールアドレス:{$_POST['mail']}、{$_POST['inquiry']}";
                $headers = "From: from@メールアドレス";
                if(mb_send_mail($to, $subject, $message, $headers)){
                    echo '<h2>送信完了</h2>';
                    echo '<div class="description">お問い合わせありがとうございます。';    
                }
                else{
                    echo '<h2>ERROR</h2>';
                    echo '<div class="description">エラー: もう一度やり直してください。';
                }
                ?>
                <br><br>
                <img src="thanks.png" width="150px" height="auto"><br><br>
                <a href="http://localhost/teishutsu/">TOPページへ戻る</a></div>
        </div>
        <script src="../../motion.js"></script>
    </body>
</html>
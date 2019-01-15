<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせフォーム</title>
        <meta name="description" content="お問い合わせフォーム">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
        <style>
            #mailsubmit {
                float: left;
                position: relative;
                left: 60px;
            }
            #back_button {
                position: relative;
                left: 125px;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main-sub">
                <h2>&emsp;お問い合わせ内容確認</h2>
                <div class="description">
                    <form action="../mailto/" method="post">
                        <table border="1">
                            <tr>
                                <td>名前</td>
                                <td><?php echo htmlspecialchars($_POST["name"]); ?></td>
                            </tr>
                            <tr>
                                <td>メールアドレス</td>
                                <td><?php echo htmlspecialchars($_POST["mail"]); ?></td>
                            </tr>
                            <tr>
                                <td>お問い合わせ内容</td>
                                <td><?php echo htmlspecialchars($_POST["inquiry"]); ?></td>
                            </tr>
                        </table>
                        <br>
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars( $_POST['name']); ?>">
                        <input type="hidden" name="mail" value="<?php echo htmlspecialchars($_POST['mail']); ?>">
                        <input type="hidden" name="inquiry" value="<?php echo htmlspecialchars($_POST['inquiry']); ?>">
                        <input id="mailsubmit" type="submit" value="送信" />
                    </form>
                    <input id="back_button" value="修正" onclick="history.back();" type="button">
                    <br><br>
                    <a href="http://localhost/teishutsu/">TOPページへ戻る</a>
                </div>
            </div>
        </div>
        <script src="../../motion.js"></script>
    </body>
</html>
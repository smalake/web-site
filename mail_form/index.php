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
                <h2>&emsp;お問い合わせ</h2>
                <div class="description">
                    <form name="mail_form" action="confirmation/" method="post" onsubmit="return check()">
                    名前:<br>
                    <input type="text" name="name" size="49" value=""><br>
                    メールアドレス:<br>
                    <input type="text" name="mail" size="49" value=""><br>
                    お問い合わせ内容:<br>
                    <textarea name="inquiry" cols="50" rows="5"></textarea><br>
                    <br>
                    <input type="submit" value="送信">
                </form>
                <br>
                    <a href="http://localhost/teishutsu/">TOPページへ戻る</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function check(){
                var check_name = document.mail_form.name.value;
                var check_mail = document.mail_form.mail.value;
                var check_text = document.mail_form.inquiry.value;
                if(check_name == ""){
                    alert("名前を入力してください。");
                    return false;
                }
                else if(!check_name.match(/\S/g)){
                    alert("名前を入力してください。");
                    return false;
                }
                else if(check_mail == ""){
                    alert("メールアドレスを入力してください。");
                    return false;
                }
                else if(!check_mail.match(/.+@.+\..+/)){
                    alert("メールアドレスが正しくありません。");
                    return false;
                }
                else if(check_text == ""){
                    alert("お問い合わせ内容を入力してください。");
                    return false;
                }
                else if(!check_text.match(/\S/g)){
                    alert("お問い合わせ内容を入力してください。");
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
        <script src="../motion.js"></script>
    </body>
</html>
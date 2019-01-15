<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>新規登録ページ</title>
        <meta name="description" content="スケジューラを使うためのアカウント情報を登録するページです">
        <!-- CSS読み込み -->
        <link rel="stylesheet" href="../login_style.css">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
    </head>
    <body>
        <?php

        $recaptcha = htmlspecialchars($_POST["g-recaptcha-response"],ENT_QUOTES,'UTF-8');

        if(isset($recaptcha)){
            $captcha = $recaptcha;
        }else{
            $captcha = "";
            echo "captchaエラー";
            exit;
        }
        $secretKey = "秘密鍵";

        $resp = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
        $resp_result = json_decode($resp,true);

        if(intval($resp_result["success"]) !== 1) {
            //認証失敗時の処理をここに書く
        }else{
            //認証成功時の処理をここに書く
            //ここにmailsend等の記述をする。
        }

        ?>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main">
                <h2>&emsp;新規登録</h2>
                <div class="description">
                    <form name="login_form" action="register.php" method="post" onsubmit="return check()">
                        <div class="FormInput">ユーザID:</div><input type="text" name="username" value=""><br>
                        <div class="FormInput">パスワード:</div><input type="password" name="pass" value="" maxlength="20"><br>
                        <div class="FormInput">再入力:</div><input type="password" name="retype" value="" maxlength="20"><br><br>
                        <div class="g-recaptcha" data-callback="clearcall" data-sitekey="鍵"></div>
                        <input type="submit" name="register" value="登録" disabled>
                    </form>
                    <br><br>
                    <a href="http://localhost/teishutsu/">TOPページへ戻る</a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function clearcall(code) {
                if(code !== ""){
                    $(':submit[name=register]').removeAttr("disabled");
                }
            }
            function check(){
                var check_name = document.login_form.username.value;
                var check_pass = document.login_form.pass.value;
                var check_retype = document.login_form.retype.value;
                if(check_name == ""){
                    alert("ユーザ名を入力してください。");
                    return false;
                }
                else if(check_pass.length < 5){
                    alert("パスワードは6文字以上で入力してください。");
                    return false;
                }
                else if(check_pass != check_retype){
                    alert("パスワードが一致しません。");
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
    </body>
</html>
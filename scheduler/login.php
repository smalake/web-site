<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログインページ</title>
        <meta name="description" content="スケジューラを使うためのログインページです">
        <!-- CSS読み込み -->
        <link rel="stylesheet" href="./login_style.css">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main-sub">
                <h2>&emsp;ログインしてください。</h2>
                <div class="description">
                <form name="login_form" action="session.php" method="post" onsubmit="return check()">
                    <div class="FormInput">ユーザID:</div><input type="text" name="username" value="">
                    <br>
                    <div class="FormInput">パスワード:</div><input type="password" name="pass" value="" maxlength="20">
                    <br><br>
                    <input id="login_button" type="submit" name="login" value="ログイン">
                </form>
                <button id="user_register">新規登録</button>
                <br><br><br>
                    <a href="http://localhost/teishutsu/">TOPページへ戻る</a>
                </div>
            </div>

            <footer>
               
            </footer>
        </div>
        <script type="text/javascript">
            function check(){
                var check_name = document.login_form.username.value;
                var check_pass = document.login_form.pass.value;
                if(check_name == ""){
                    alert("ユーザ名を入力してください。");
                    return false;
                }
                else if(check_pass == ""){
                    alert("パスワードを入力してください。");
                    return false;
                }
                else{
                    return true;
                }
            }
            $(function(){
                $("#user_register").click(function(){
                    location.href = "register_form/"
                });
            });
        </script>
        <script src="../motion.js"></script>
    </body>
</html>
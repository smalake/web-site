<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //クリックジャッキング対策
    header('X-FRAME-OPTIONS: SAMEORIGIN');

    //セッションを開始
    session_start();

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
    }
    catch(PDOException $e){
        echo "Error:{$e->getMessage()}";
        die();
    }
    $sql = "SELECT username, pass, salt FROM user_login_list";
    $stmt = $pdo->query($sql);
    $db_flag = 0;

    if(isset($_POST["login"])){
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($_POST["username"] == $result['username'] && crypt($_POST["pass"],$result['salt']) == $result['pass']){
                $_SESSION["username"] = $_POST["username"];
                $_GET["flag"]="login";
                echo '<script type="text/javascript">alert("ログインしました。");</script>';
                $pdo = null;
                echo '<script type="text/javascript">location.href = "http://localhost/teishutsu/scheduler/calendar/"</script>';
                exit;
            }
        }
        echo '<script type="text/javascript">alert("IDもしくはパスワードが間違っています。");</script>';
        $pdo =null;
        echo '<script type="text/javascript">history.back();</script>';
        exit;
    }
}
else{
    echo '<script type="text/javascript">alert("不正な操作です。最初からやり直してください。"); location.href = "http://localhost/teishutsu/";</script>';
    exit;
}
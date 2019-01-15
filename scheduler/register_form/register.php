<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
    }
    catch(PDOException $e){
        echo "Error:{$e->getMessage()}";
        die();
    }
    $sql = "SELECT `username` FROM `user_login_list`";
    $stmt = $pdo->query($sql);
    $sql_insert = "INSERT INTO `user_login_list` (id, username, pass, salt) VALUES (NULL, :username, :pass, :salt)";
    $stmt_insert = $pdo->prepare($sql_insert);

    if(isset($_POST["register"])){
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($_POST["username"] == $result['username']){
                echo '<script type="text/javascript">alert("すでに使用されているIDです。"); history.back(); </script>';
                exit;
            }
            else{
                $salt = "salt";
                $username = $_POST["username"];
                $rawpass = $_POST["pass"];
                $enc_pass = crypt($rawpass, $salt);
                $stmt_insert->bindParam(":username", $username, PDO::PARAM_STR);
                $stmt_insert->bindParam(":pass", $enc_pass, PDO::PARAM_STR);
                $stmt_insert->bindParam(":salt", $salt, PDO::PARAM_STR);
                $stmt_insert->execute();
                $sql_table = "CREATE TABLE `schedule_db`.".$username."(`year` INT(4) NOT NULL, `month` INT(2) NOT NULL, `day` INT(2) NOT NULL, `alldayFlag` INT(2) NOT NULL, `start` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `end` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `schedule` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `other` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `id` INT(10) NOT NULL) ENGINE = InnoDB";
                $pdo->query($sql_table);
                $pdo =null;

                echo '<script type="text/javascript">alert("登録完了しました。"); location.href = "http://localhost/teishutsu/scheduler/";</script>';
                exit;

            }
        }
    }
}
else{
    echo '<script type="text/javascript">alert("不正な操作です。最初からやり直してください。"); location.href = "http://localhost/teishutsu/";</script>';
    exit;
}
<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
        <title>ダウンロードページ</title>
        <meta name="description" content="アップローダでアップロードしたファイルをダウンロードするページです。">

        <?php

        try{
            $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
        }
        catch(PDOException $e){
            echo "Error:{$e->getMessage()}";
            die();
        }
        $now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $select = "SELECT * FROM `filelist`";
        $stmt = $pdo->query($select);
        ?>
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main-sub">
                <?php
                $flag = 0;
                foreach($stmt as $row){
                    if($now_url == $row["url"]){
                        $date = $row["expiration"];
                        $filename = $row["filename"];
                        $basename = $row["basename"];
                        $flag = 1;
                        break;
                    }
                }
                if($flag == 0){
                    echo "<h2>&emsp;error!</h2><div class='description'>ファイルが見当たりません。<br><br>";
                    echo "<a href = 'http://localhost/teishutsu/'>TOPページへ戻る</a><div>";
                    exit;
                }
                $today = date("Ymd");
                $filepath = "./storage/".$filename;
                if(($date - (int)$today) > 0){
                    $output = <<<EOM
        <h2>&emsp;ダウンロードを開始します。</h2>
        <div class="description">
        <a href="$filepath" download="$basename">ダウンロード</a></div>
EOM;
                }

                else{
                    $output = "<p>&emsp;有効期限が切れています。</p>";
                }
                echo $output;
                ?>
                <br><br>
                <a href="http://localhost/teishutsu/">TOPページへ戻る</a>
            </div>
        </div>
        <script src="../motion.js"></script>
    </body>
</html>
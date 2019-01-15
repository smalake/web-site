<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
        <title>アップローダ</title>
        <meta name="description" content="登録不要で使用可能なアップローダです。">
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main-sub">
                <?php

                function random($length){
                    return array_reduce(range(1, $length), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; });
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if($_FILES['file_upload']['error'] == 2){
                        echo '<h2>error</h2>';
                        echo '<div class="description">ファイルサイズが大きすぎます。<br>アップロード可能ファイルサイズは150MB以下です。<br><br>';
                        echo "<a href = 'http://localhost/teishutsu/'>TOPページへ戻る</a></div>";
                        exit;
                    }

                    try{
                        $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
                    }
                    catch(PDOException $e){
                        echo "Error:{$e->getMessage()}";
                        die();
                    }

                    $sql = "INSERT INTO `filelist` (expiration, filename, basename, url) VALUES (:expiration, :filename, :basename, :url)";
                    $stmt = $pdo->prepare($sql);

                    $newfilename = date("YmdHis")."-".$_FILES['file_upload']['name'];
                    $upload = './storage/'.$newfilename;
                    $url = "http://localhost/teishutsu/uploader/download.php?".random(32);
                    $date = strtotime("+1 week");
                    $expiration = date("Ymd",$date);

                    $stmt->bindParam(":expiration", $expiration, PDO::PARAM_INT);
                    $stmt->bindParam(":filename", $newfilename, PDO::PARAM_STR);
                    $stmt->bindParam(":basename", $_FILES["file_upload"]["name"], PDO::PARAM_STR);
                    $stmt->bindParam(":url", $url, PDO::PARAM_STR);
                    $stmt->execute();

                    if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $upload)){
                        echo '<h2>アップロード完了</h2>';
                        echo '<div class="description">ダウンロード用URL:<br>';
                        echo $url;
                        echo "<br><br><a href = 'http://localhost/teishutsu/'>TOPへ</a></div>";
                    }
                    else{
                        echo '<h2>アップロード失敗</h2>';
                        echo '<div class="description">もう一度やり直してください。<br><br>';
                        echo '<a href="javascript:history.back();">戻る</a></div>';
                    }
                }
                else{
                    echo "<h1>error</h1>最初からやり直してください。<br><br>";
                    echo "<a href = 'http://localhost/teishutsu/'>TOPページへ戻る</a>";

                }
                ?>
            </div>
        </div>
        <script src="../motion.js"></script>
    </body>
</html>
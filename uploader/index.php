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
            <div class="main">
                <h2>&emsp;アップローダ</h2>
                <div class="description">
                    <form action="file_up.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="MAX_FILE_SIZE" value="157286400">
                        <input name="file_upload" type="file">
                        <br><br>
                        <input type="submit" value="アップロード">
                    </form>
                    <br>
                    <a href = "http://localhost/teishutsu/">TOPページへ戻る</a>
                </div>
            </div>
        </div>
        <script src="../motion.js"></script>
    </body>
</html>
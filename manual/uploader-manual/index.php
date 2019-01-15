<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アップローダの使い方</title>
        <meta name="description" content="作成した簡易アップローダの使い方を説明してます。">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
    </head>
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main">
                <h2>&emsp;アップローダの使い方</h2>
                <div class="description">ファイルを指定してアップロードボタンを押してください。<br>
                正常にアップロードが完了すると、ダウンロード用ページのURLが表示されます。<br>
                URLにアクセスするとファイルのダウンロードが行われます。<br>
                <br>
                【注意】<br>
                ・アップロードできるファイルサイズは150MBまでです。<br>
                ・ファイルの有効期限は1週間です。<br>
                ・1週間後の23:59を過ぎるとダウンロードできなくなりますのでご注意ください。<br><br>
                    <a href="http://localhost/teishutsu/">TOPへ</a></div>
            </div>
        </div>
    </body>
</html>
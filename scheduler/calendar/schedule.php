<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>スケジュール登録</title>
        <meta name="description" content="スケジュールを入力するページです。">
        <!-- CSS読み込み -->
        <link rel="stylesheet" href="./stylesheet.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">       
        <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="jquery-ui/datepicker.js"></script>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
        <?php session_start() ?>
    </head>         
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main">
                <h2>&emsp;予定入力</h2>
                <div class="description">
                    <script type="text/javascript" src="function.js"></script>
                    <p>日付: <input type="text" id="datepicker" value=""></p>
                    終日<label><input type="checkbox" name="allday_check" value="on" onclick="connecttext('allday_check',this.checked);"></label><br>
                    <div id="allday">
                        開始時間<br>
                        <label for="start_hour">時</label>:
                        <input id="start_hour" type="text" value="0" size="1" /><br>
                        <label for="start_minute">分</label>:
                        <input id="start_minute" type="text" value="0" size="1" /><br><br>
                        終了時間<br>
                        <label for="end_hour">時</label>:
                        <input id="end_hour" type="text" value="0" size="1" /><br>
                        <label for="end_minute">分</label>:
                        <input id="end_minute" type="text" value="0" size="1" /><br><br>
                    </div>
                    <form name="scheduleForm">
                        予定<br><textarea name="schedule" cols="30" rows="5" ></textarea><br><br>
                        備考<br><textarea name="other" cols="30" rows="5" ></textarea>
                    </form>
                    <br>
                    <input type="button" name="register" value="登録" onclick="db_register(1)">
                    <input type="button" name="cancel" value="キャンセル" onclick="not_register()">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#datepicker").datepicker({ 
                });
                $("#datepicker").val("<?php echo $_SESSION['value']; ?>");
            });
        </script>
        <script src="../../motion.js"></script>
    </body>
</html>
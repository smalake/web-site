<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- CSS読み込み -->
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
        <script type="text/javascript" src="schedule_click.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <?php
        session_start();
        $year = $_GET['year'];
        $month = str_pad((string)$_GET['month'],2,'0',STR_PAD_LEFT);
        $day = str_pad((string)$_GET['day'],2,'0',STR_PAD_LEFT);
        $value = $year . "/" . $month . "/" . $day;
        $_SESSION["year"] = $year;
        $_SESSION["month"] = $month;
        $_SESSION["day"] = $day;
        $_SESSION["value"] = $value;
        ?>
        <title><?php echo $value ?>のスケジュール</title>
    </head>         
    <body>
        <div id="wrap">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            <div class="main">
                <h2>&emsp;<?php echo $value ?></h2>
                <div class="description">
                    <?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
    }
            catch(PDOException $e){
                echo "Error:{$e->getMessage()}";
                die();
            }
            if($select = "select * from {$_SESSION['username']}"){
                $stmt_sel = $pdo->query($select);
                $count = 1;
                foreach($stmt_sel as $row){
                    if($month == $row["month"]){
                        if(($day == $row["day"]) && ($year == $row["year"])){
                            if($count == 1){
                    ?>
                    <table id='schedule_list' border='1'>
                        <?php
                            }
                        ?>
                        <tr>
                           <th id="hide_id">
                               <?php echo $row['id'] ?>
                           </th>
                            <td>
                                <?php
                            if($row["alldayFlag"] == 0){
                                echo "{$row['start']} ～ {$row['end']}<br>";
                            }
                            echo "予定：";
                            echo "{$row['schedule']}<br>";
                            echo "備考：<br>";
                                ?>
                                <div class='bikou'><?php echo $row['other'] ?></div>
                                </td></tr>

                        <br>
                        <?php
                                    $count++;
                        }
                    }
                }
                if($count != 1){
                        ?>
                    </table><br>
                    <?php
                }
                $pdo = null;
                $_SESSION["id"] = $count;
            }
            else{
                    ?>
                    <script type="text/javascript">
                        alert("DB table error");
                    </script>
                    <?php
            }

                    ?>
                    <input type="button" name="register" value="新規入力" onclick="db_register(0)">
                    <input type="button" name="cancel" value="キャンセル" onclick="not_register()">
                </div>
            </div>
            <div id="dialog" title="メニュー" style="display:none">
                <div>操作を選んでください。</div>
                <button id="edit_button">編集</button>
                <button id="delete_button">削除</button>
            </div>
        </div>
        <script type="text/javascript">
            var get_id;
            $(function(){
                $("#schedule_list th").click (function(){
                    $("#dialog").dialog({
                        modal: true,
                    });
                    get_id = $(this).text();
                });
            });
            $(function(){
                $("#delete_button").click(function(){
                    var year = <?php echo $year; ?>;
                    var month = <?php echo $month; ?>;
                    var day = <?php echo $day; ?>;

                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data: {year: year, month: month, day: day, id: get_id},
                    }).done((data) => {
                        if(data == "OK"){
                            alert("削除しました。");
                            location.href ="http://localhost/teishutsu/scheduler/calendar/";
                        }
                        else{
                            alert(data);
                            location.href ="http://localhost/teishutsu/scheduler/calendar/";
                        }
                    }).fail((data) => {
                        alert("通信に失敗しました。");
                        location.href ="http://localhost/teishutsu/scheduler/calendar/";
                    })
                });
            });
            $(function(){
                $("#edit_button").click(function(){
                    var year = <?php echo $year; ?>;
                    var month = <?php echo $month; ?>;
                    var day = <?php echo $day; ?>;

                    $.ajax({
                        type: "POST",
                        url: "edit.php",
                        data: {year: year, month: month, day: day, id: get_id},
                    }).done((data) => {
                        if(data == "OK"){
                            alert("削除しました。");
                            location.href ="http://localhost/teishutsu/scheduler/calendar/";
                        }
                        else{
                            alert(data);
                            location.href ="http://localhost/teishutsu/scheduler/calendar/";
                        }
                    }).fail((data) => {
                        alert("通信に失敗しました。");
                        location.href ="http://localhost/teishutsu/scheduler/calendar/";
                    })
                });
            });
        </script>
        <script src="../../motion.js"></script>
    </body>
</html>
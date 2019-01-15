<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<?php
session_start();
try{
    $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
}
catch(PDOException $e){
    echo "Error:{$e->getMessage()}";
    die();
}
$year = $_POST["year"];
$month = $_POST["month"];
if($select = "SELECT `year`,`month`,`day` FROM {$_SESSION['username']} WHERE year={$year} AND month={$month}"){
    $stmt_sel = $pdo->query($select);
    foreach(stmt_sel as $row){
        echo $row['day'];
?>
<script type="text/javascript">
    var dayCheck = "<?php echo $row['day'] ?>";
    schedule_on(dayCheck);
</script>
<?php
    }
}
else{
    echo "error";
}
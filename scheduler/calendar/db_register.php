<?php
session_start();
$start = $_POST['start'];
$end = $_POST['end'];
$schedule = $_POST['schedule'];
$other = $_POST['other'];
$alldayFlag = $_POST['check'];
$id = $_SESSION['id'];
$value = explode("/", $_POST['dvalue']);
$year = $value[0];
$month = $value[1];
$day = $value[2];


try{
    $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
}
catch(PDOException $e){
    echo "Error:{$e->getMessage()}";
    die();
}

$insert = "INSERT INTO `{$_SESSION['username']}` (year, month, day, alldayFlag, start, end, schedule, other, id) VALUES (:year, :month, :day, :alldayFlag, :start, :end, :schedule, :other, :id)";

$stmt = $pdo->prepare($insert);
$stmt->execute(array(":year"=>$year,":month"=>$month,":day"=>$day,":alldayFlag"=>$alldayFlag,":start"=>$start,":end"=>$end,":schedule"=>$schedule,":other"=>$other,":id"=>$id));
$pdo = null;
<?php
session_start();
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];
$id = $_POST["id"];

try{
    $pdo = new PDO("mysql:host=localhost;dbname=DB名;charset=utf8","ユーザ名","パスワード");
}
catch(PDOException $e){
    echo "Error:{$e->getMessage()}";
    die();
}

$delete = "delete from {$_SESSION['username']} where year = :year and month = :month and day = :day and id = :id";
$stmt = $pdo->prepare($delete);
$stmt->execute(array(":year"=>$year,":month"=>$month,":day"=>$day,":id"=>$id));
$pdo = null;

echo "OK";

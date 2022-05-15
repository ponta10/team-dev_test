<?php
const DB_HOST = 'mysql:dbname=team;host=localhost:8889;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

try{
  $pdo = new PDO(DB_HOST ,DB_USER,DB_PASSWORD,[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//連想配列
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外
    PDO::ATTR_EMULATE_PREPARES => false,//SQLインジェクション対策
  ]);
  // echo '接続成功';
}catch(PDOException $e){
  echo '接続失敗' ,$e->getMessage() . "\n";
  exit();
}

if (!isset($_GET['search'])) :
$cnt_stmt = $pdo->prepare("select * from agent");
$cnt_stmt->execute();
$cnts = $cnt_stmt->fetchAll();

else:
$search = $_GET['search']; 
$cnt_stmt = $pdo->prepare("select * from agent where agent_name = '$search'");
$cnt_stmt->execute();
$cnts = $cnt_stmt->fetchAll();
endif;

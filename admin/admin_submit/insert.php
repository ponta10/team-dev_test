<?php
ini_set('display_errors', 1);
require(dirname(__FILE__) . "/dbconnect.php");
$name = $_POST['names'];
$image = $_POST['image'];
$link = $_POST['link'];
$publisher = $_POST['publisher'];
$speed = $_POST['speed'];
$decision= $_POST['decision'];
$registstrant = $_POST['registstrant'];
$place = $_POST['place'];
$main = $_POST['main'];
$sub = $_POST['sub'];

if($decision < 10000){
  $decision_five = 1;
}elseif($decision < 25000){
  $decision_five = 2;
}elseif($decision < 40000){
  $decision_five = 3;
}elseif($decision < 60000){
  $decision_five = 4;
}else{
  $decision_five = 5;
}

if($publisher < 10000){
  $publisher_five = 1;
}elseif($publisher< 25000){
  $publisher_five = 2;
}elseif($publisher< 40000){
  $publisher_five = 3;
}elseif($publisher < 60000){
  $publisher_five = 4;
}else{
  $publisher_five = 5;
}

if($registstrant < 10000){
  $registstrant_five = 1;
}elseif($registstrant < 25000){
  $registstrant_five = 2;
}elseif($registstrant < 40000){
  $registstrant_five = 3;
}elseif($registstrant < 60000){
  $registstrant_five = 4;
}else{
  $registstrant_five = 5;
}

if($place < 5){
  $place_five = 1;
}elseif($place < 10){
  $place_five = 2;
}elseif($place < 15){
  $place_five = 3;
}elseif($place < 20){
  $place_five = 4;
}else{
  $place_five = 5;
}

if($speed < 5){
  $speed_five = 1;
}elseif($speed < 4){
  $speed_five = 2;
}elseif($speed < 3){
  $speed_five = 3;
}elseif($speed < 2){
  $speed_five = 4;
}else{
  $speed_five = 5;
}

$stmt = $pdo->prepare("insert into agent(agent_name,image,link,publisher_five,decision_five,speed_five,registstrant_five,place_five,publisher,decision,speed,registstrant,place,main,sub) value('$name','$image','$link','$publisher_five','$decision_five','$speed_five','$registstrant_five','$place_five','$publisher','$decision','$speed','$registstrant','$place','$main','$sub')");
$stmt->execute();

$stmt_agentid = $pdo->prepare("select id from agent where agent_name ='$name'");
$stmt_agentid->execute();
$agentid = $stmt_agentid->fetch();
$aid = $agentid['id']; 

$tags = $_POST['tag'];
foreach ($tags as $tag) : 
$stmt_tag = $pdo->prepare("select id from tag where tag_name = '$tag'");
$stmt_tag->execute();
$tagid = $stmt_tag->fetch();
$tid = $tagid['id'];

$stmt_insert = $pdo->prepare("insert into agent_tag (agent_id,tag_id) value('$aid','$tid')");
$stmt_insert->execute();
endforeach;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<header>
        <div class="header_top">
            <h1>???????????????</h1>
            <a href="../admin_login/index.html"><img src="../img/iconmonstr-log-out-16-240 (1).png" alt="">???????????????</a>
        </div>
    <div class="header_bottom">
        <ul>
            <li><a href="../admin_top/index.php">?????????</a></li>
            <li><a href="../admin_student/index.html">??????????????????</a></li>
            <li><a href="../admin_company/index.php" class="page_focus">????????????</a></li>
            <li><a href="../admin_submit/index.php">???????????????????????????</a></li>
        </ul>
    </div>
</header>
  <form action="index.php" method="get">
    <input type="submit" value="??????">
  </form>
</body>
</html>
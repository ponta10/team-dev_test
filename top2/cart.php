<?php
$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data; // やりたい処理

// echoすると返せる
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="reset.css">
  <scrip defer src="cart.js"></script>
</head>
<body>
<section class="carts">
  <h4 class="carts-title">カート確認</h4>
  <ul id="carts_list">

  </ul>
  <p class="carts-count">企業数:<span class="count"></span></p>
  <!-- <p class="cart-inquiry">※申し込み後3日後になってもエージェ
    ンシーから連絡がなかった場合、こち
    らにお問い合わせください</p> -->
    <form action="apply.php" method="get" class="form">
      <!-- <button type="submit">申し込む</button> -->
    </form>
  <p class="none">カートに何も入っていません</p>
</section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="cart.js"></script>
</body>
</html>
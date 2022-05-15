<?php
require(dirname(__FILE__) . "/dbconnect.php");
$delete = $_GET['delete'];
echo $delete;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
        <div class="header_top">
            <h1>管理者画面</h1>
            <a href="../admin_login/index.html"><img src="../img/iconmonstr-log-out-16-240 (1).png" alt="">ログアウト</a>
        </div>
    <div class="header_bottom">
        <ul>
            <li><a href="../admin_top/index.php">トップ</a></li>
            <li><a href="../admin_student/index.html">ユーザー管理</a></li>
            <li><a href="../admin_company/index.php" class="page_focus">企業管理</a></li>
            <li><a href="../admin_submit/index.php">新規エージェンシー</a></li>
        </ul>
    </div>
</header>
  <section class="delete">
    <p>本当に削除しますか？</p>
    <form action="delete.php" method="get">
      <input type="hidden" value="<?= $delete; ?>" name="delete">
      <input type="submit" value="はい" class="yes">
    </form>
      <input type="submit" value="いいえ" class="no" onclick="history.back()">
  </section>
</body>

</html>
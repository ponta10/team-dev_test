<?php
require(dirname(__FILE__) . "/dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../reset.css">
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
            <li><a href="../admin_student/index.php">ユーザー管理</a></li>
            <li><a href="../admin_company/index.php">企業管理</a></li>
            <li><a href="../admin_submit/index.php">新規エージェンシー</a></li>
        </ul>
    </div>
</header>

<div class="page to-cart">
        <p>
            <a href="../admin_top/index.php">トップ</a>
            <span>></span>
            <a href="../admin_company/index.php">企業情報</a>            
            <span>></span>
            <span class="page_current">企業担当者</span>
        </p>
    </div>

<h2><?= $_GET['agent'];?>社 担当者情報</h2>

<div class="section_header">
    <form class="search_container">
        <p><input class="search_space" type="text" placeholder="氏名を入力してください"></p>
        <!-- <p><input class="search_space" type="text" placeholder="企業名を入力してください"></p> -->
        <p><input class="search_button" type="submit" value="検索"></p>
    </form>

    <!-- <div>
        <h3>件数 :<span>10</span></h3>
    </div> -->
</div>

<div class="section_main">
    <div class="wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col" class="middle">お名前</th>
                    <th scope="col">部署名</th>
                    <th scope="col" class="wide">メールアドレス</th>
                    <th scope="col">電話番号</th>
                    <th scope="col" class="narrow">削除</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cnts as $cnt):?>
                <tr>
                    <td><?= $cnt['manager_name'];?></td>
                    <td class="price"><?= $cnt['department'];?></td>
                    <td class="price"><?= $cnt['mail'];?></td>
                    <td class="price"><?= $cnt['tel'];?></td>
                    <td>
                    <form action="select.php" method="get">
                        <input type="image" src="../img/iconmonstr-trash-can-9-240.png" class="trash-can">
                        <input type="hidden" value="<?= $cnt['manager_name'];?> " name="delete">
                    </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<!-- <footer>
    <button id="prev" class="day_back" onclick="prev()"></button>
    <h1 id="page_number">1</h1>
    <button id="next" class="day_front" onclick="next()"></button>
</footer> -->
    
</body>
</html>
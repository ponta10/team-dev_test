<?php
ini_set('display_errors', 1);
require(dirname(__FILE__) . "/dbconnect.php");
$agent = $_GET['agent'];
$cnt_edit = $pdo->prepare("select * from agent where agent_name = '$agent'");
$cnt_edit->execute();
$cnt = $cnt_edit->fetch();

$cnt_tag = $pdo->prepare('select * from tag');
$cnt_tag->execute();
$alltags = $cnt_tag->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<bod>
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
        <span class="page_current">企業情報編集</span>
        </p>
    </div>

    <div class="page_change">
        <button onclick="change_company()">企業情報を編集</button>
        <button onclick="change_agency()">担当者情報を編集</button>
    </div>

    <section>
        <form action="update.php" method="post">
        <div id="company">
            <h2>企業情報編集:<?= $_GET['agent']; ?></h2>
            <form action="">
                <table class="contact-table">
                    <tr>
                        <th class="contact-item">企業名</th>
                        <td class="contact-body">
                            <input type="text" name="names" class="form-text" value="<?= $cnt['agent_name']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">企業画像ファイル</th>
                        <td class="contact-body">
                            <input type="text" name="image" class="form-text" value="<?= $cnt['image']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">公式サイトurl</th>
                        <td class="contact-body">
                            <input type="text" name="link" class="form-text" value="<?= $cnt['link']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">見出し</th>
                        <td class="contact-body">
                            <input type="text" name="main" class="form-text" value="<?= $cnt['main']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">小見出し</th>
                        <td class="contact-body">
                            <input type="text" name="sub" class="form-text" value="<?= $cnt['sub']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">内定実績</th>
                        <td class="contact-body">
                            <input type="text" name="decision" class="form-text" value="<?= $cnt['decision']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">掲載社数</th>
                        <td class="contact-body">
                            <input type="text" name="publisher" class="form-text" value="<?= $cnt['publisher']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">内定最短</th>
                        <td class="contact-body">
                            <input type="text" name="speed" class="form-text" value="<?= $cnt['speed']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">登録者数</th>
                        <td class="contact-body">
                            <input type="text" name="registstrant" class="form-text" value="<?= $cnt['registstrant']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">拠点数</th>
                        <td class="contact-body">
                            <input type="text" name="place" class="form-text" value="<?= $cnt['place']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">サービスの手順1</th>
                        <td class="contact-body">
                            <input type="text" name="step1" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">サービスの手順2</th>
                        <td class="contact-body">
                            <input type="text" name="step2" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">サービスの手順3</th>
                        <td class="contact-body">
                            <input type="text" name="step3" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">掲載期限</th>
                        <td class="contact-body">
                            <input type="text" name="limit" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">タグ</th>
                        <td id="input_pluralBox">
                            <div id="input_plural">
                                <!-- <input type="text" class="form-control" placeholder="サンプルテキストサンプルテキストサンプルテキスト"> -->
                                <div class="cp_ipselect form-control">
                                    <?php
                                    // require(dirname(__FILE__) . "/dbconnect.php");
                                    $stmt = $pdo->prepare('SELECT * FROM agent_tag JOIN agent ON agent.id = agent_tag.agent_id RIGHT JOIN tag ON tag.id = agent_tag.tag_id where agent_name=:name');
                                    $stmt->bindValue('name', $cnt['agent_name'], PDO::PARAM_STR);
                                    $stmt->execute();
                                    $tags = $stmt->fetchAll(); ?>
                                    <?php foreach ($tags as $tag) : ?>
                                    <select name="tag[]" id="tag">
                                    <?php foreach($alltags as $alltag):
                                        $alltag['tag_name'] == $tag['tag_name'] ?
                                        $select = 'selected' : $select ='';
                                        ?>
                                    <option value="<?= $alltag['tag_name'];?>"
                                    <?= $select;?>><?= $alltag['tag_name'];?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <?php endforeach; ?>
                                    <!-- <label class="cp_sl02_selectlabel">閲覧するページを選ぶ</label> -->
                                </div>
                                <span class="cp_sl02_highlight"></span>
                                    <span class="cp_sl02_selectbar"></span>
                                <input type="button" value="＋" class="add pluralBtn">
                                    <input type="button" value="－" class="del pluralBtn">
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="submit_section">
                    <input class="contact-submit" type="submit" value="送信" />
                    <input type="hidden" name="agent" value="<?= $_GET['agent'];?>">
                </div>
            </form>
            <form action="../admin_company/select.php" method="get" class="trash-can">
                <input type="image" src="../img/iconmonstr-trash-can-9-240.png"> 
                <input type="hidden" name="delete" value="<?= $_GET['agent'];?>">
            </form>
        </div>

        <div id="agency">
            <h2>担当者情報編集</h2>
            <form action="">
                <table class="contact-table">
                    <tr>
                        <th class="contact-item">企業名</th>
                        <td class="contact-body">
                            <input type="text" name="企業名" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者氏名</th>
                        <td class="contact-body">
                            <input type="text" name="担当者氏名" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">部署名</th>
                        <td class="contact-body">
                            <input type="text" name="部署名" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者Tel</th>
                        <td class="contact-body">
                            <input type="text" name="Tel" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">担当者mail</th>
                        <td class="contact-body">
                            <input type="text" name="mail" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">パスワード</th>
                        <td class="contact-body">
                            <input type="text" name="password" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">パスワード<br>(確認用)</th>
                        <td class="contact-body">
                            <input type="text" name="password" class="form-text" />
                        </td>
                    </tr>
                </table>
                <div class="submit_section">
                    <input type="hidden" name="agent" value="<?= $_GET['agent'];?>">
                    <input class="contact-submit" type="submit" value="送信" />
                </div>
            </form>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>

</bod>

</html>
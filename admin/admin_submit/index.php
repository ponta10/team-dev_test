<?php
ini_set('display_errors', 1);
require(dirname(__FILE__) . "/dbconnect.php");
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
        <span class="page_current">企業情報登録</span>
        </p>
    </div>

    <div class="page_change">
        <button onclick="change_company()">企業情報を登録</button>
        <button onclick="change_agency()">担当者情報を登録</button>
    </div>

    <section>
        <form action="insert.php" method="post">
        <div id="company">
            <h2>企業情報登録</h2>
            <form action="">
                <table class="contact-table">
                    <tr>
                        <th class="contact-item">企業名</th>
                        <td class="contact-body">
                            <input type="text" name="names" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">企業画像ファイル</th>
                        <td class="contact-body">
                            <input type="text" name="image" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">公式サイトurl</th>
                        <td class="contact-body">
                            <input type="text" name="link" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">内定実績</th>
                        <td class="contact-body">
                            <input type="text" name="decision" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">掲載社数</th>
                        <td class="contact-body">
                            <input type="text" name="publisher" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">内定最短</th>
                        <td class="contact-body">
                            <input type="text" name="speed" class="form-text"/>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">登録者数</th>
                        <td class="contact-body">
                            <input type="text" name="registstrant" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">拠点数</th>
                        <td class="contact-body">
                            <input type="text" name="place" class="form-text"/>
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">見出し</th>
                        <td class="contact-body">
                            <input type="text" name="main" class="form-text" />
                        </td>
                    </tr>
                    <tr>
                        <th class="contact-item">小見出し</th>
                        <td class="contact-body">
                            <input type="text" name="sub" class="form-text"/>
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
                                    <select name="tag[]" id="tag">
                                    <?php foreach($alltags as $alltag):
                                        $alltag['tag_name'] == $tag['tag_name'] ?
                                        $select = 'selected' : $select ='';
                                        ?>
                                    <option value="<?= $alltag['tag_name'];?>"
                                    <?= $select;?>><?= $alltag['tag_name'];?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <!-- <label class="cp_sl02_selectlabel">閲覧するページを選ぶ</label> -->
                                </div>
                                <span class="cp_sl02_highlight"></span>
                                    <span class="cp_sl02_selectbar"></span>
                                <input type="button" value="＋" class="add pluralBtn">
                                    <input type="button" value="－" class="del pluralBtn">
                                <p class="error">※カテゴリは5個までです</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="submit_section">
                    <input class="contact-submit" type="submit" value="送信" />
                </div>
            </form>
        </div>

        <div id="agency">
            <h2>担当者情報登録</h2>
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
                    <input type="hidden" name="agent">
                    <input class="contact-submit" type="submit" value="送信" />
                </div>
            </form>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script.js"></script>

</bod>

</html>
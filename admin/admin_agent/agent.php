<?php
ini_set('display_errors', 1);
require(dirname(__FILE__) . "/dbconnect.php");
$agent = $_GET['agent'];
$cnt_stmt = $pdo->prepare("select * from agent where agent_name = '$agent' ");
$cnt_stmt->execute();
$cnts = $cnt_stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../reset2.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>

<body>

    <header class="header">
        <div class="header_top_agent">
            <h1>管理者画面</h1>
            <a href="../admin_login/index.html"><img src="../img/iconmonstr-log-out-16-240 (1).png" alt="">ログアウト</a>
        </div>
        <div class="header_bottom_agent">
            <ul>
                <li><a href="../admin_top/index.php">トップ</a></li>
                <li><a href="../admin_student/index.html">ユーザー管理</a></li>
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
            <span class="page_current">企業掲載情報</span>
        </p>
    </div>

    <!-- <div id="page_change" class="page_change">
    <button onclick="change_top()">トップページ画面をみる</button>
    <button onclick="change_detail()">詳細ページ画面を見る</button>
    <button onclick="change_info()">契約情報</button>
</div> -->

    <div class="cp_ipselect">
        <select id="choice" class="cp_sl02" onchange="inputChange()" required>
            <!-- <option value="" hidden disabled selected></option> -->
            <option value="1">トップページ画面</option>
            <option value="2">詳細ページ画面</option>
            <option value="3">契約情報</option>
        </select>
        <span class="cp_sl02_highlight"></span>
        <span class="cp_sl02_selectbar"></span>
        <label class="cp_sl02_selectlabel">閲覧するページを選ぶ</label>
    </div>


    <section id="top">
        <div class="main">
            <!-- <button onclick="page_changes()" class="pages_button"><img src="../img/iconmonstr-arrow-25-240.png" alt=""><h1>トップページ画面</h1></button> -->
            <section class="agentlist">
                <div class="agentlist-item">
                    <div class="agentlist-item_box">
                        <h2><?= $cnts['agent_name']; ?></h2>
                        <p>公式サイト:</p><a href="#"><?= $cnts['link']; ?></a>
                    </div>
                    <div class="agentlist-item_lead">
                        <h3><?= $cnts['main']; ?></h3>
                        <h6><?= $cnts['sub']; ?></h6>
                    </div>
                    <div class="agentlist-item_category">
                        <ul>
                            <?php
                            // require(dirname(__FILE__) . "/dbconnect.php");
                            $stmt = $pdo->prepare('SELECT * FROM agent_tag JOIN agent ON agent.id = agent_tag.agent_id RIGHT JOIN tag ON tag.id = agent_tag.tag_id where agent_name=:name');
                            $stmt->bindValue('name', $cnts['agent_name'], PDO::PARAM_STR);
                            $stmt->execute();
                            $tags = $stmt->fetchAll(); ?>
                            <?php foreach ($tags as $tag) : ?>
                                <li><?= $tag["tag_name"]; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="agentlist-item_img">
                        <div class="rader">
                            <canvas class="myRadarChart_<?= $cnts['agent_name']; ?> chart">
                            </canvas>
                        </div>
                        <div class="button">
                            <?php if (!isset($_GET['narrow'])) :
                                $id = $cnts['id'];
                            else :
                                $id = $cnts['agent_id'];
                            endif
                            ?>
                            <button class="js_cart_btn cart btn" data-name="<?= $cnts['agent_name']; ?>" data-id="<?= $id; ?>">カートに入れる</button>
                            <form action="detail.php" method="get">
                                <input type="hidden" value="<?= $cnts['agent_name']; ?>" name="detail">
                                <input class="detail btn" type="submit" value="詳細はこちら">
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    var ctx = document.querySelector(".myRadarChart_<?= $cnts['agent_name']; ?>");
                    var myRadarChart = new Chart(ctx, {
                        //グラフの種類
                        type: "radar",
                        //データの設定
                        data: {
                            //データ項目のラベル
                            labels: ["掲載社数", "内定実績", "スピード", "登録者数", "拠点数"],
                            //データセット
                            datasets: [{
                                label: "エージェント五段階評価",
                                //背景色
                                backgroundColor: "rgba(45, 205, 98,.4)",
                                //枠線の色
                                borderColor: "rgba(45, 205, 98,1)",
                                //結合点の背景色
                                pointBackgroundColor: "rgba(45, 205, 98,1)",
                                //結合点の枠線の色
                                pointBorderColor: "#fff",
                                //結合点の背景色（ホバ時）
                                pointHoverBackgroundColor: "#fff",
                                //結合点の枠線の色（ホバー時）
                                pointHoverBorderColor: "rgba(200,112,126,1)",
                                //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                                hitRadius: 5,
                                //グラフのデータ
                                data: [<?php $stmt_shuffle = $pdo->prepare('select publisher_five from agent where agent_name=:name ');
                                        $stmt_shuffle->bindValue('name', $cnts["agent_name"], PDO::PARAM_STR);
                                        $stmt_shuffle->execute();
                                        $shuffles = $stmt_shuffle->fetchAll();
                                        foreach ($shuffles as $shuffle) :
                                            echo $shuffle['publisher_five'];
                                        endforeach;
                                        ?>, <?php $stmt_decison = $pdo->prepare('select decision_five from agent where agent_name=:name ');
                                $stmt_decison->bindValue('name', $cnts["agent_name"], PDO::PARAM_STR);
                                $stmt_decison->execute();
                                $decisions = $stmt_decison->fetchAll();
                                foreach ($decisions as $decision) :
                                    echo $decision['decision_five'];
                                endforeach;
                                ?>, <?php $stmt_speed = $pdo->prepare('select speed_five from agent where agent_name=:name ');
                                        $stmt_speed->bindValue('name', $cnts["agent_name"], PDO::PARAM_STR);
                                        $stmt_speed->execute();
                                        $speeds = $stmt_speed->fetchAll();
                                        foreach ($speeds as $speed) :
                                            echo $speed['speed_five'];
                                        endforeach;
                                        ?>, <?php $stmt_regist = $pdo->prepare('select registstrant_five from agent where agent_name=:name ');
                                            $stmt_regist->bindValue('name', $cnts["agent_name"], PDO::PARAM_STR);
                                            $stmt_regist->execute();
                                            $regists = $stmt_regist->fetchAll();
                                            foreach ($regists as $regist) :
                                                echo $regist['registstrant_five'];
                                            endforeach;
                                            ?>, <?php $stmt_place = $pdo->prepare('select place_five from agent where agent_name=:name ');
                                            $stmt_place->bindValue('name', $cnts["agent_name"], PDO::PARAM_STR);
                                            $stmt_place->execute();
                                            $places = $stmt_place->fetchAll();
                                            foreach ($places as $place) :
                                                echo $place['place_five'];
                                            endforeach;
                                            ?>],
                            }, ],
                        },
                        options: {
                            legend: {
                                labels: {
                                    // このフォント設定はグローバルプロパティを上書きします。
                                    fontColor: "black",
                                },
                            },
                            // レスポンシブ指定
                            responsive: true,
                            scale: {
                                r: {
                                    pointLabels: {
                                        display: true,
                                        centerPointLabels: true,
                                    },
                                },
                                ticks: {
                                    // 最小値の値を0指定
                                    beginAtZero: true,
                                    min: 0,
                                    // 最大値を指定
                                    max: 5,
                                },
                            },
                        },
                    });
                </script>
            </section>
        </div>
        <!-- <div class="agentlist-item_return">
        <a href="../admin_company/index.html"><button>一覧に戻る</button></a>
    </div> -->
    </section>

    <section id="detail">
        <div class="main">
            <!-- <button onclick="page_changes()" class="pages_button"><img src="../img/iconmonstr-arrow-25-240.png" alt=""><h1>詳細ページ画面</h1></button> -->
            <div class="agentlist-item">
                <div class="agentlist-item_box">
                    <h2><?= $cnts['agent_name'];?></h2>
                    <p>公式サイト:</p><a href="#"><?= $cnts['link'];?></a>
                </div>
                <div class="agentlist-item_category">
                    <ul>
                    <?php foreach ($tags as $tag) : ?>
                                <li><?= $tag["tag_name"]; ?></li>
                            <?php endforeach; ?>
                    </ul>
                </div>
                <div class="agentlist-item_img">
                    <img src="img/レーダーチャート.png" alt="">
                    <img src="img/mynabi.png" alt="" class="site">
                </div>
                <div class="agentlist-item_table">
                    <table border="1">
                        <tr>
                            <th>掲載社数</th>
                            <th>内定実績</th>
                            <th>スピード</th>
                            <th>登録者数</th>
                            <th>拠点数</th>
                        </tr>
                        <tr>
                            <td><?= $cnts['publisher'];?>社</td>
                            <td><?= $cnts['decision'];?>人</td>
                            <td><?= $cnts['speed'];?>週間</td>
                            <td><?= $cnts['registstrant'];?>人</td>
                            <td><?= $cnts['place'];?>箇所</td>
                        </tr>
                    </table>
                </div>
                <div class="agentlist-item_service">
                    <h2>サービスの流れ</h2>
                    <div class="service-step">
                        <p><span>step1</span>マイナビ新卒紹介へのお申込み</p>
                    </div>
                    <div class="service-step">
                        <p><span>step2</span>面接(キャリアカウンセリング)</p>
                    </div>
                    <div class="service-step">
                        <p><span>step3</span>企業求人、インターンシップ紹介・応募</p>
                    </div>
                    <div class="service-step">
                        <p><span>step4</span>選考・面接</p>
                    </div>
                    <div class="service-step">
                        <p><span>step5</span>内定・入社</p>
                    </div>
                    <img src="img/service.png" alt="">
                </div>
                <div class="agentlist-item_apeal">
                    <h2>アピールポイント</h2>
                    <h4>キャリアアドバイザーと二人三脚で就活に勝つ</h4>
                    <p>
                        膨大な情報量の中から、自分に必要な情報だけを
                        ピックアップするのは難しいもの。
                        それぞれ専門知識のあるキャリアアドバイザーが、
                        効率的な就活を皆さまに合わせたサポートをさせて
                        いただきます。
                    </p>
                    <h4>マイナビにしかできない非公開求人量</h4>
                    <p>
                        マイナビ新卒紹介では、マイナビなど就職情報
                        サイトには公開されていない、非公開求人を中心に
                        ご紹介します。
                        マイナビ新卒紹介からしか受けられない求人も
                        多数ありますので、積極的に活用してください。
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="agentlist-item_return">
        <a href="../admin_company/index.html"><button>一覧に戻る</button></a>
    </div> -->
    </section>

    <section id="info">
        <div class="main">
            <!-- <button onclick="page_changes()" class="pages_button"><img src="../img/iconmonstr-arrow-25-240.png" alt=""><h1>契約情報</h1></button> -->
            <table class="contact-table">
                <tr>
                    <th class="contact-item">企業名</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">企業画像ファイル</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">公式サイトurl</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">見出し</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">アピールポイント</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">内定実績</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">掲載者数</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">内定最短</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">実績</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">グラフ</th>
                    <td class="contact-body">
                        <label class="contact-sex">
                            <span class="contact-sex-txt">掲載者数</span>
                            <input class="graph_number" type="text" name="掲載者数" />
                        </label>
                        <label class="contact-sex">
                            <span class="contact-sex-txt">内定実績</span>
                            <input class="graph_number" type="text" name="掲載者数" />
                        </label>
                        <label class="contact-sex">
                            <span class="contact-sex-txt">スピード</span>
                            <input class="graph_number" type="text" name="掲載者数" />
                        </label>
                        <label class="contact-sex">
                            <span class="contact-sex-txt">登録者数</span>
                            <input class="graph_number" type="text" name="掲載者数" />
                        </label>
                        <label class="contact-sex">
                            <span class="contact-sex-txt">拠点数</span>
                            <input class="graph_number" type="text" name="掲載者数" />
                        </label>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">タグ</th>
                    <td id="input_pluralBox">
                        <div class="agentlist-item_category">
                            <ul>
                                <li>首都圏</li>
                                <li>ES添削</li>
                                <li>メーカー</li>
                                <li>オンライン</li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">サービスの手順1</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">サービスの手順2</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">サービスの手順3</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item">掲載期限</th>
                    <td class="contact-body">
                        <h3>マイナビ</h3>
                    </td>
                </tr>
            </table>
        </div>
        <!-- <div class="agentlist-item_return">
        <a href="../admin_company/index.html"><button>一覧に戻る</button></a>
    </div>    -->
        </form>
    </section>

    <form action="../admin_edit/index.php" method="get" class="edit">
        <input type="submit" value="編集" class="submit">
        <input type="hidden" name="agent" value="<?= $agent; ?>">
    </form>
    <form action="../admin_company/select.php" method="get" class="trash-can">
        <input type="image" src="../img/iconmonstr-trash-can-9-240.png">
        <input type="hidden" name="delete" value="<?= $agent; ?>">
    </form>

</body>

<script src="script.js"></script>

</html>
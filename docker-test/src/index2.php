<?php
// session_start();
// require(dirname(__FILE__) . "/dbconnect.php");

// $stmt = $db->query('SELECT id, title FROM events');
// $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="reset.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Sawarabi+Mincho&display=swap" rel="stylesheet">
<link
href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
rel="stylesheet"
/>
</head>
<body>
  <div class="black"></div>
  <header>
    <h1><img src="img/就活の教科書.webp" alt=""></h1>
    <nav>
      <li>就活サイト</li>
      <li>就活支援サービス</li>
      <li>自己分析診断ツール</li>
      <li>ES添削サービス</li>
      <li>就活エージェント</li>
    </nav>
    <div class="head"> 
      <button class="mobile-menu-icon" onclick="slider()">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
      <div class="menu-content">
        <h1>Menu</h1>
          <div class="search"> 
            <h2 class="search-title">エージェント検索</h2>
            <div class="search-box">
              <input type="text" placeholder="検索">
              <button class="search-box_icon" type="submit">
              </button>
            </div>
          </div>
          <div class="category">
            <p class="category-title">絞り込み条件<button>絞り込む</button></p>
            <div class="category-box">
              <p>サービス内容</p>
              <label>
                <input type="checkbox" class="checkbox" value="面接対策"/>
                <span class="checkbox-fontas"></span>
                面接対策
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="ES添削"/>
                <span class="checkbox-fontas"></span>
                ES添削
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="1on1"/>
                <span class="checkbox-fontas"></span>
                1on1
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="スケジュール管理"/>
                <span class="checkbox-fontas"></span>
                スケジュール管理
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="オンライン"/>
                <span class="checkbox-fontas"></span>
                オンライン
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="対面"/>
                <span class="checkbox-fontas"></span>
                対面
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="非公開求人"/>
                <span class="checkbox-fontas"></span>
                非公開求人
              </label>
              <p>得意分野</p>
              <label>
                <input type="checkbox" class="checkbox" value="IT"/>
                <span class="checkbox-fontas"></span>
                IT
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="マスコミ"/>
                <span class="checkbox-fontas"></span>
                マスコミ
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="商社"/>
                <span class="checkbox-fontas"></span>
                商社
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="金融"/>
                <span class="checkbox-fontas"></span>
                金融
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="外資"/>
                <span class="checkbox-fontas"></span>
                外資
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="総合"/>
                <span class="checkbox-fontas"></span>
                総合
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="スタートアップ"/>
                <span class="checkbox-fontas"></span>
                スタートアップ
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="ベンチャー"/>
                <span class="checkbox-fontas"></span>
                ベンチャー
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="大手"/>
                <span class="checkbox-fontas"></span>
                大手
              </label>
              <p>拠点</p>
              <label>
                <input type="checkbox" class="checkbox" value="首都圏"/>
                <span class="checkbox-fontas"></span>
                首都圏
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="関西"/>
                <span class="checkbox-fontas"></span>
                関西
              </label>
              <label>
                <input type="checkbox" class="checkbox" value="地方"/>
                <span class="checkbox-fontas"></span>
                地方
              </label>
            </div>
          </div>
          <div class="shuffle">
            <p>並び変える</p>
            <div class="shuffle-box">
              <select name="shuffle" id="">
                <option value="選択してください" selected>選択してください</option>
                <option value="掲載社数">掲載社数</option>
                <option value="内定実績">内定実績</option>
                <option value="スピード">スピード</option>
                <option value="登録者数">登録者数</option>
                <option value="拠点数">拠点数</option>
              </select>
            </div>
          </div> 
          <div class="navigation">
            <li>就活サイト</li>
            <li>就活支援サービス</li>
            <li>自己分析診断ツール</li>
            <li>ES添削サービス</li>
            <li>就活エージェント</li>
          </div>
      </div>
    </div> 
  </header>
  <!-- <header>
    <div class="head">
    <button class="mobile-menu-icon" onclick="slider()">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>
    <div class="menu-content">
      <h1>Menu</h1>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Production</a></li>
      <li><a href="#">News</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Price</a></li>
    </div>
  </div>
  </header> -->
  <section class="compareBar">
    <select name="agent" id="agent">
      <option value="選択してください">選択してください</option>
      <option value="マイナビ">マイナビ</option>
      <option value="doda">doda</option>
      <option value="リクナビ">リクナビ</option>
      <option value="キャリアパーク">キャリアパーク</option>
      <option value="type">type就活エージェント</option>
    </select>
    <select name="agent" id="agent2">
      <option value="選択してください">選択してください</option>
      <option value="マイナビ">マイナビ</option>
      <option value="doda">doda</option>
      <option value="リクナビ">リクナビ</option>
      <option value="キャリアパーク">キャリアパーク</option>
      <option value="type">type就活エージェント</option>
    </select>
    <button class="btnCompare">比較する</button>
  </section>
  <img src="img/iconmonstr-help-3-240.png" alt="" class="help">
  <div class="modal">
    <div class="closeBtn">
      <img src="img/iconmonstr-x-mark-6-240.png" alt="">
    </div>
    <div class="modal-cart">
      <h2>カート機能について</h2>
      <div class="step">
      <div class="step-1 steps">
        <h4>Step1</h4>
        <p>カートに入れる</p>
        <img src="img/カートクリック.png" alt="">
      </div>
      <div class="step-2 steps">
        <h4>Step2</h4>
        <p>カートボタンを押す</p>
        <img src="img/カートページへ.png" alt="">
      </div>
      <div class="step-3 steps">
        <h4>Step3</h4>
        <p>申し込みページへ</p>
        <img src="img/iconmonstr-note-31-240.png" alt="">
      </div>
    </div>
    </div>
    <div class="modal-compare">
      <h2>比較機能について</h2>
      <div class="step">
      <div class="step-1 steps">
        <h4>Step1</h4>
        <p>企業を選択</p>
        <img src="img/比較クリック.png" alt="">
      </div>
      <div class="step-2 steps">
        <h4>Step2</h4>
        <p>比較ボタンを押す</p>
        <img src="img/比較ボタン.png" alt="">
      </div>
      <div class="step-3 steps">
        <h4>Step3</h4>
        <p>企業を比較</p>
        <img src="img/比較機能.png" alt="">
      </div>
    </div>
    </div>
  </div>
  <div class="main"> 
    <article>
    <section class="first">
      <div class="first-logo">
        <img src="img/logo.png" alt="">
        <h1>CRAFT</h1>
      </div>
      <h4>CRAFTは学生とエージェント企業をつなげ、学生の就活をサポートするサービスです!</h4>
    </section>
  <!-- <div class="white"></div> -->
  <section class="stepBox">
      <h2>簡単申し込み3ステップ</h2>
      <div class="step">
        <div class="step-1">
          <h4>Step1</h4>
          <p>エージェント企業を探す</p>
          <img src="img/iconmonstr-magnifier-10-240.png" alt="">
        </div>
        <div class="step-2">
          <h4>Step2</h4>
          <p>カートに入れて申し込む</p>
          <img src="img/iconmonstr-shopping-cart-3-240.png" alt="">
        </div>
        <div class="step-3">
          <h4>Step3</h4>
          <p>フォームを記入して完了!</p>
          <img src="img/iconmonstr-note-31-240.png" alt="">
        </div>
      </div>
    <button class="btnUse btn"><a href="#">このサイトの使い方</a></button>
  </section>
  <section class="agentlist">
    <!-- <div class="agentlist-shuffle">
      <p>並び替え</p>
      <select name="shuffle">
        <option value="選択してください" selected>選択してください</option>
        <option value="掲載社数">掲載社数</option>
        <option value="内定実績">内定実績</option>
        <option value="スピード">スピード</option>
        <option value="登録者数">登録者数</option>
        <option value="拠点数">拠点数</option>
      </select>
      <p>カテゴリ</p>
      <select name="" id="">
        <option value="選択してください">選択してください</option>
        <option>首都圏</option>
        <option>ES添削</option>
        <option>メーカー</option>
        <option>オンライン</option>
        <option>1on1</option>
        <option>スケジュール管理</option>
        <option>IT</option>
        <option>メーカー</option>
        <option>商社</option>
        <option>金融</option>
        <option>小売り</option>
        <option>マスコミ</option>
        <option>総合</option>
        <option>関西</option>
        <option>地方</option>
        <option>大手</option>
        <option>ベンチャー</option>
        <option>スタートアップ</option>
        <option>外資</option>
        <option>対面</option>
        <option>オンライン</option>
        <option>非公開求人</option>
        <option>求人紹介</option>
      </select>
    </div> -->
    <?php
require(dirname(__FILE__) . "/dbconnect.php");
$stmt = $pdo->query('select * from company');
$cnts = $stmt->fetchAll() ?: 0;
?>
<?php foreach($cnts as $cnt):
?>
    <div class="agentlist-item">
      <div class="agentlist-item_box">
        <h2><?= $cnt['names'];?></h2>
        <p>公式サイト:</p><a href="#"><?= $cnt['link'];?></a>
      </div>
      <div class="agentlist-item_category">
        <ul>
          <li>首都圏</li>
          <li>ES添削</li>
          <li>メーカー</li>
          <li>オンライン</li>
        </ul>
      </div>
      <div class="agentlist-item_lead">
        <h3>就活は一人じゃない、ともに進む就活エージェント</h3>
        <h6>就活情報サイトでは掲載されてない求人の紹介</h6>
      </div>
      <div class="agentlist-item_img">
        <img src="img/レーダーチャート.png" alt="" class="lader">
        <img src="img/mynabi.png" alt="" class="site">
      </div>
      <div class="agentlist-item_button">
        <button class="js_cart_btn cart btn" data-name="キャリアパーク">カートに入れる</button>
        <button class="detail btn"><a href="detail.html" target="_blank" rel="noopener noreferrer">詳細はこちら</a></button>
      </div>
    </div>
    <?php endforeach; ?>
  </section>
    </article>
    <aside>
  <div class="search">
    <p>エージェント検索</p>
    <form class="search-box" action="">
      <input type="text" placeholder="検索">
      <button class="search-box_icon" type="submit">
      <!-- <img src="img/iconmonstr-magnifier-10-240 (1).png" alt=""> -->
      </button>
    </form>
  </div>
  <form class="category" action="">
    <p class="category-title">絞り込み条件<button type="submit">絞り込む</button></p>
    <div class="category-box">
      <p>サービス内容</p>
      <label>
        <input type="checkbox" class="checkbox" value="面接対策"/>
        <span class="checkbox-fontas"></span>
        面接対策
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="ES添削"/>
        <span class="checkbox-fontas"></span>
        ES添削
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="1on1"/>
        <span class="checkbox-fontas"></span>
        1on1
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="非公開求人"/>
        <span class="checkbox-fontas"></span>
        非公開求人
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="スケジュール管理"/>
        <span class="checkbox-fontas"></span>
        スケジュール管理
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="オンライン"/>
        <span class="checkbox-fontas"></span>
        オンライン
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="対面"/>
        <span class="checkbox-fontas"></span>
        対面
      </label>
      <p>得意分野</p>
      <label>
        <input type="checkbox" class="checkbox" value="IT"/>
        <span class="checkbox-fontas"></span>
        IT
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="マスコミ"/>
        <span class="checkbox-fontas"></span>
        マスコミ
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="商社"/>
        <span class="checkbox-fontas"></span>
        商社
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="金融"/>
        <span class="checkbox-fontas"></span>
        金融
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="外資"/>
        <span class="checkbox-fontas"></span>
        外資
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="総合"/>
        <span class="checkbox-fontas"></span>
        総合
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="スタートアップ"/>
        <span class="checkbox-fontas"></span>
        スタートアップ
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="ベンチャー"/>
        <span class="checkbox-fontas"></span>
        ベンチャー
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="大手"/>
        <span class="checkbox-fontas"></span>
        大手
      </label>
      <p>拠点</p>
      <label>
        <input type="checkbox" class="checkbox" value="首都圏"/>
        <span class="checkbox-fontas"></span>
        首都圏
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="関西"/>
        <span class="checkbox-fontas"></span>
        関西
      </label>
      <label>
        <input type="checkbox" class="checkbox" value="地方"/>
        <span class="checkbox-fontas"></span>
        地方
      </label>
    </div>
  </form>
  <form class="shuffle">
    <p>並び変える</p>
    <div class="shuffle-box">
      <select name="shuffle" id="" onchange="submit(this.form)">
        <option value="選択してください" selected>選択してください</option>
        <option value="掲載社数">掲載社数</option>
        <option value="内定実績">内定実績</option>
        <option value="スピード">スピード</option>
        <option value="登録者数">登録者数</option>
        <option value="拠点数">拠点数</option>
      </select>
    </div>
  </form>
    </aside>
</div>
<!-- <section class="cartBox">
  <p class="cart-title">カート</p>
  <ul id="cart_list">
  <li>マイナビ</li>
  <li>doda</li>
  <li>キャリアパーク</li>
  </ul>
  <p class="cart-count">企業数:<span class="count"></span></p>
  <p class="cart-inquiry">※申し込み後3日後になってもエージェ
    ンシーから連絡がなかった場合、こち
    らにお問い合わせください</p>
  <button><a href="#">申し込む</a></button>
</section> -->
<div class="cartImg">
  <div class="cart_cnt hidden">
    <span id="js_cart_cnt"></span>
  </div>
  <a href="cart.html" target="_blank" rel="noopener noreferrer"><img src="img/iconmonstr-shopping-cart-3-240.png" alt=""></a>
</div>
<section class="agent">
  <!-- <button>一覧に戻る</button> -->
<div class="agentBattle uno">
  <div class="agentBattle-img compare-item">
    <img src="img/doda.gif" alt="">
  </div>
  <div class="agentBattle-category compare-item">
    <h4>カテゴリ</h4>
    <ul>
      <li>首都圏</li>
      <li>ES添削</li>
      <li>メーカー</li>
      <li>オンライン</li>
    </ul>
  </div>
  <div class="agentBattle-lader compare-item">
    <h4>レーダーチャート</h4>
    <img src="img/レーダーチャート.png" alt="">
  </div>
  <div class="agentBattle-company compare-item">
    <h4>契約社数</h4>
    <h1>40,000<span>社</span></h1>
  </div>
  <div class="agentBattle-style compare-item">
    <h4>面接形態</h4>
    <img src="img/iconmonstr-video-camera-5-240.png" alt="">
    <h1>オンライン</h1>
  </div>
  <div class="agentBattle-success compare-item">
    <h4>内定実績</h4>
    <h1>20,000<span>件</span></h1>
  </div>
  <div class="agentBattle-speed compare-item">
    <h4>最短内定スピード</h4>
    <h1>2<span>週間</span></h1>
  </div>
  <div class="agentBattle-register compare-item">
    <h4>登録者数</h4>
    <h1>500,000<span>人</span></h1>
  </div>
  <div class="agentBattle-place compare-item">
    <h4>拠点数</h4>
    <img src="img/palce.png" alt="">
    <h1>35<span>箇所</span></h1>
  </div>
  <div class="agentBattle-field compare-item">
    <h4>特異な業界</h4>
    <img src="img/iconmonstr-circle-4-240 (1).png" alt="">
    <h1>総合</h1>
  </div>
  <div class="agentBattle-strong compare-item">
    <h4>一番の強み</h4>
    <h1>豊富な企業数</h1>
  </div>
  <div class="agentBattle-detail">
    <a href="detail.html" target="_blank" rel="noopener noreferrer"><button class="btnDetail">詳細はこちら</button></a>
  </div>
  <div class="agentBattle-cart">
    <button class="cart js_cart_btn" data-name="doda" data-id="1">カートに入れる</button>
  </div>
  <div class="agentBattle-link">
    <a href="#">https://dodadoda.com</a>
  </div>
</div>
<div class="agentBattle dos">
  <div class="agentBattle-img compare-item">
    <img src="img/mynabi.jpg" alt="">
  </div>
  <div class="agentBattle-category compare-item">
    <h4>カテゴリ</h4>
    <ul>
      <li>ベンチャー</li>
      <li>商社</li>
      <li>対面</li>
    </ul>
  </div>
  <div class="agentBattle-lader compare-item">
    <h4>レーダーチャート</h4>
    <img src="img/レーダーチャート2.png" alt="">
  </div>
  <div class="agentBattle-company compare-item">
    <h4>契約社数</h4>
    <h1>2,000<span>社</span></h1>
  </div>
  <div class="agentBattle-style compare-item">
    <h4>面接形態</h4>
    <img src="img/iconmonstr-generation-11-240.png" alt="">
    <h1>対面</h1>
  </div>
  <div class="agentBattle-success compare-item">
    <h4>内定実績</h4>
    <h1>10,000<span>件</span></h1>
  </div>
  <div class="agentBattle-speed compare-item">
    <h4>最短内定スピード</h4>
    <h1>1<span>週間</span></h1>
  </div>
  <div class="agentBattle-register compare-item">
    <h4>登録者数</h4>
    <h1>200,000<span>人</span></h1>
  </div>
  <div class="agentBattle-place compare-item">
    <h4>拠点数</h4>
    <img src="img/palce.png" alt="">
    <h1>10<span>箇所</span></h1>
  </div>
  <div class="agentBattle-field compare-item">
    <h4>特異な業界</h4>
    <img src="img/iconmonstr-laptop-4-240.png" alt="">
    <h1>商社</h1>
  </div>
  <div class="agentBattle-strong compare-item">
    <h4>一番の強み</h4>
    <h1>手厚い面接対策</h1>
  </div>
  <div class="agentBattle-detail">
    <a href="detail.html" target="_blank" rel="noopener noreferrer"><button class="btnDetail">詳細はこちら</button></a>
  </div>
  <div class="agentBattle-cart">
    <button class="cart js_cart_btn" data-name="マイナビ" data-id="0">カートに入れる</button>
  </div>
  <div class="agentBattle-link">
    <a href="detail.html">https://dodadoda.com</a>
  </div>
</div>
</section>
<button class="return">一覧に戻る</button>
<footer>
  <p>Anti-Pattern Inc</p>
</footer>
<!-- <?php
echo 'やっほほい'. '<br>';
foreach ($events as $key => $event) : ?>
  <li>
      <?= $event["id"]; ?>:<?= $event["title"]; ?>
  </li>
<?php endforeach; ?> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="main.js"></script>
</body>
</html>